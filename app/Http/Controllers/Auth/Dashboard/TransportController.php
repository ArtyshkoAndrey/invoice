<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class TransportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(Request $request): \Illuminate\Http\JsonResponse
  {
    $query = Transport::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $transports = $query->paginate($paginate);
    } else {
      $transports = $query->get();
    }

    return JsonResponse::success(['transports' => $transports]);
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
   * @param Transport $transport
   *
   * @return Response
   */
  public function show(Transport $transport)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request   $request
   * @param Transport $transport
   *
   * @return Response
   */
  public function update(Request $request, Transport $transport)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Transport $transport
   *
   * @return Response
   */
  public function destroy(Transport $transport)
  {
    //
  }
}
