<?php

namespace App\Http\Controllers\Auth\Dashboard;

use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(): \Illuminate\Http\JsonResponse
  {
    $hotels = Hotel::all();

    return JsonResponse::success(['hotels' => $hotels]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param Hotel $hotel
   *
   * @return Response
   */
  public function show(Hotel $hotel)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Hotel   $hotel
   *
   * @return Response
   */
  public function update(Request $request, Hotel $hotel)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Hotel $hotel
   *
   * @return Response
   */
  public function destroy(Hotel $hotel)
  {
    //
  }
}
