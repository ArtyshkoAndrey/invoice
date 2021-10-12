<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Day;
use App\Models\Invoice;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoicesRequest;

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

    $query = $query->orderByDesc('created_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('id', 'like', "%{$search}%")
        ->orWhere('user_name', 'like', "%{$search}%")
        ->orWhere('user_nationality', 'like', "%{$search}%")
        ->orWhere('arrival_flight_code', 'like', "%{$search}%")
        ->orWhere('departure_flight_code', 'like', "%{$search}%")
        ->orWhere('driver_number', 'like', "%{$search}%")
        ->orWhere('driver_name', 'like', "%{$search}%")
        ->orWhereHas('company', function ($q) use ($search) {
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
   * @param InvoicesRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(InvoicesRequest $request): \Illuminate\Http\JsonResponse
  {
    $i = new Invoice();
    $i->user_name = $request->input('user.name');
    $i->user_nationality = $request->input('user.nationality');
    $i->arrival_time = $request->input('transfer.arrival_time');
    $i->arrival_flight_code = $request->input('transfer.arrival_flight_code');
    $i->departure_time = $request->input('transfer.departure_time');
    $i->departure_flight_code = $request->input('transfer.departure_flight_code');
    $i->driver_number = $request->input('transfer.driver_number');
    $i->driver_name = $request->input('transfer.driver_name');
    $i->passengers = $request->input('transfer.passengers');
    $i->gid = $request->input('transfer.gid');
    $i->company()->associate($request->input('company'));
    $i->arrival_airport()->associate($request->input('transfer.arrival_airport_id'));
    $i->departure_airport()->associate($request->input('transfer.departure_airport_id'));
    $i->transport()->associate($request->input('transfer.transport_id'));

    $i->save();

//    Save Booking info

    $bookings = $request->input('hotels');
    foreach ($bookings as $booking) {
      $b = new Booking($booking);
      $b->hotel()->associate($booking['hotel_id']);
      $b->invoice()->associate($i);
      $b->room()->associate($booking['room_type_id']);
      $b->save();
    }

//    save sample
    $days = $request->input('sample.days');
    foreach ($days as $index => $day) {
      $d = new Day();
      if (!$day['free']) {
        $d->resort()->associate($day['resort']['id']);
      }
      $d->free = $day['free'];
      $d->order = $index + 1;
      $d->model()->associate($i);
      $d->save();
    }

    return JsonResponse::success(['invoice' => $i]);
  }

  /**
   * Display the specified resource.
   *
   * @param Invoice $invoice
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(Invoice $invoice): \Illuminate\Http\JsonResponse
  {
    $invoice->load([
      'arrival_airport',
      'departure_airport',
      'company',
      'bookings',
      'days',
      'days.resort',
      'bookings.room',
      'bookings.hotel',
      'transport'
    ]);
    return JsonResponse::success(['invoice' => $invoice]);
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
