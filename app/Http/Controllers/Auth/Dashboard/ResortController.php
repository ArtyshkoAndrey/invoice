<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResortController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index (Request $request): \Illuminate\Http\JsonResponse
  {
    $query = Resort::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $resorts = $query->paginate($paginate);
    } else {
      $resorts = $query->get();
    }

    return JsonResponse::success(['resorts' => $resorts]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function store (Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:resorts,name'
    ]);

    $resort = new Resort($request->all());
    $resort->save();

    return JsonResponse::success([
      'resort' => $resort
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return Response
   */
  public function show (int $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int     $id
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update (Request $request, int $id): \Illuminate\Http\JsonResponse
  {
    $resort = Resort::findOrFail($id);

    $request->validate([
      'name' => 'required|string|unique:resorts,name,' . $id
    ]);

    $resort->update($request->all());
    $resort->save();

    return JsonResponse::success(['resort' => $resort]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy (int $id): \Illuminate\Http\JsonResponse
  {
    $resort = Resort::findOrFail($id);
    $resort->delete();

    return JsonResponse::success(['resort' => $resort]);
  }
}
