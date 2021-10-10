<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(Request $request): \Illuminate\Http\JsonResponse
  {
    $query = Sample::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $samples = $query->paginate($paginate);
    } else {
      $samples = $query->get();
    }

    return JsonResponse::success(['samples' => $samples]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:samples,name'
    ]);

    $sample = new Sample($request->all());
    $sample->save();

    return JsonResponse::success(['sample' => $sample]);
  }

  /**
   * Display the specified resource.
   *
   * @param Sample $sample
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(Sample $sample): \Illuminate\Http\JsonResponse
  {
    $sample->load(['days', 'days.resort:id']);

    return JsonResponse::success(['sample' => $sample]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Sample  $sample
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, Sample $sample): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:samples,name,' . $sample->id
    ]);

    $sample->update($request->all());
    $sample->save();

    return JsonResponse::success(['sample' => $sample]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Sample $sample
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(Sample $sample): \Illuminate\Http\JsonResponse
  {
    $sample->days()->delete();
    $sample->delete();

    return JsonResponse::success(['sample' => $sample]);
  }
}
