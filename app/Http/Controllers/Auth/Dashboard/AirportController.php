<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AirportController extends Controller
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
    $query = Airport::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', 10);
    $airports = $query->paginate($paginate);

    return JsonResponse::success(['airports' => $airports]);
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
      'name' => 'required|string|unique:airports,name'
    ]);

    $airport = new Airport($request->all());
    $airport->save();

    return JsonResponse::success([
      'airport' => $airport
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
    try {
      $airport = Airport::findOrFail($id);

      $request->validate([
        'name' => 'required|string|unique:airports,name,' . $id
      ]);

      $airport->update($request->all());
      $airport->save();

      return JsonResponse::success(['airport' => $airport]);
    } catch (ModelNotFoundException $exception) {
      return JsonResponse::error(['model' => $exception->getMessage()]);
    }
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
    try {
      $airport = Airport::findOrFail($id);
      $airport->delete();

      return JsonResponse::success(['airport' => $airport]);
    } catch (ModelNotFoundException $e) {
      return JsonResponse::error(['error' => $e->getMessage()]);
    }
  }
}
