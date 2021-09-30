<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

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

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', 10);
    $resorts = $query->paginate($paginate);

    return JsonResponse::success(['resorts' => $resorts]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return Response
   */
  public function store (Request $request)
  {
    //
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
   * @return Response
   */
  public function update (Request $request, int $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return Response
   */
  public function destroy (int $id)
  {
    //
  }
}
