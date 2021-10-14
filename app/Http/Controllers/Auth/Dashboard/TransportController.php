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
   * @param Request $request
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
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:transports,name',
    ]);
    $t = new Transport();
    $t->name = $request->name;
    $t->save();

    return JsonResponse::success(['transport' => $t]);
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
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, Transport $transport): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:transports,name,' . $transport->id,
    ]);
    $transport->update($request->all());
    $transport->save();

    return JsonResponse::success(['transport' => $transport]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Transport $transport
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(Transport $transport): \Illuminate\Http\JsonResponse
  {
    $transport->delete();

    return JsonResponse::success(['transport' => $transport]);
  }
}
