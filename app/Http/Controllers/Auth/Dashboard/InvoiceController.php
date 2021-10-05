<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;

class InvoiceController extends Controller
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
    $query = invoice::query()->with(['company']);

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('id', 'like', "%{$search}%")
        ->orWhere('user_name', 'like', "%{$search}%")
        ->orWhere('user_nationality', 'like', "%{$search}%")
        ->orWhere('arrival_flight_code', 'like', "%{$search}%")
        ->orWhere('departure_flight_code', 'like', "%{$search}%")
        ->orWhere('driver_number', 'like', "%{$search}%")
        ->orWhere('driver_name', 'like', "%{$search}%")
        ->orWhereHas('company', function ($q) use($search) {
          $q->where('name', 'like', "%{$search}%")
            ->orWhere('code', 'like', "%{$search}%");
        });
    }

    $paginate = $request->get('per_page', 10);
    $invoices = $query->paginate($paginate);

    return JsonResponse::success(['invoices' => $invoices]);
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
   * @param Invoice $invoice
   *
   * @return Response
   */
  public function show(Invoice $invoice)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Invoice $invoice
   *
   * @return Response
   */
  public function update(Request $request, Invoice $invoice)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Invoice $invoice
   *
   * @return Response
   */
  public function destroy(Invoice $invoice)
  {
    //
  }
}
