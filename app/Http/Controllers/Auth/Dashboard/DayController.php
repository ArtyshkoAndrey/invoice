<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Day;
use App\Models\Sample;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class DayController extends Controller
{
  public function save(Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'sample' => 'required|array',
      'sample.id' => 'required|exists:samples,id',
      'sample.days' => 'required|array',
      'sample.days.*.free' => 'required|boolean',
      'sample.days.*.resort.id' => 'exclude_if:sample.days.*.free,true|required|exists:resorts,id',
//      'sample.days.*.free1' => 'required|boolean',
    ]);
    $data = $request->all();
    $sample = Sample::findOrFail($data['sample']['id']);

    $sample->days()->delete();
    foreach ($data['sample']['days'] as $index => $d) {
      $day = new Day();
      $day->free = $d['free'];
      if (!$d['free']) {
        $day->resort()->associate($d['resort']['id']);
      }
      $day->order = $index + 1;
      $day->model()->associate($sample);
      $day->save();
    }

    return JsonResponse::success(['sample' => $sample]);
  }
}
