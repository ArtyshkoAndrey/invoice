<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(Request $request): \Illuminate\Http\JsonResponse
  {
    $query = Hotel::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $hotels = $query->paginate($paginate);
    } else {
      $hotels = $query->get();
    }

    return JsonResponse::success(['hotels' => $hotels]);
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
      'name' => 'required|string|unique:hotels,name',
    ]);

    $hotel = new Hotel($request->all());
    $hotel->save();

    return JsonResponse::success([
      'hotel' => $hotel,
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param Hotel $hotel
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(Hotel $hotel): \Illuminate\Http\JsonResponse
  {
    return JsonResponse::success(['hotel' => $hotel]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Hotel   $hotel
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, Hotel $hotel): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:hotels,name,' . $hotel->id,
    ]);

    $hotel->name = $request->input('name');
    $hotel->save();

    return JsonResponse::success(['hotel' => $hotel]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Hotel $hotel
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(Hotel $hotel): \Illuminate\Http\JsonResponse
  {
    $hotel->delete();

    return JsonResponse::success(['hotel' => $hotel]);
  }
}
