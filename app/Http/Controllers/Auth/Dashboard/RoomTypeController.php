<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomTypeController extends Controller
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
    $query = RoomType::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', 10);
    $room_types = $query->paginate($paginate);

    return JsonResponse::success(['room_types' => $room_types]);
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
      'name' => 'required|string|unique:room_types,name'
    ]);

    $room_type = new RoomType($request->all());
    $room_type->save();

    return JsonResponse::success([
      'room_type' => $room_type
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
      $room_type = RoomType::findOrFail($id);

      $request->validate([
        'name' => 'required|string|unique:room_types,name,' . $id
      ]);

      $room_type->update($request->all());
      $room_type->save();

      return JsonResponse::success(['room_type' => $room_type]);
    } catch (ModelNotFoundException $exception) {
      return response()->json(['message' => $exception->getMessage()], 400);
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
      $room_type = RoomType::findOrFail($id);
      $room_type->delete();

      return JsonResponse::success(['room_type' => $room_type]);
    } catch (ModelNotFoundException $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }
}
