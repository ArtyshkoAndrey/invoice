<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array
  {
    return [
      'company' => ['required', 'exists:companies,id'],

      'user.name' => ['required', 'string'],
      'user.nationality' => ['required', 'string'],

      'sample' => ['required'],
      'sample.days' => ['required', 'array'],
      'sample.days.*.free' => ['required', 'boolean'],
      'sample.days.*.resort.id' => ['exclude_if:sample.days.*.free,true', 'required', 'exists:resorts,id'],
      'sample.days.*.half_day' => ['required', 'boolean'],

      'hotels' => ['required', 'array'],
      'hotels.*.adults' => ['required', 'integer'],
      'hotels.*.bb' => ['required', 'string'],
      'hotels.*.booking_number' => ['required', 'string'],
      'hotels.*.check_in' => ['required', 'date'],
      'hotels.*.check_out' => ['required', 'date'],
      'hotels.*.children' => ['required', 'integer'],
      'hotels.*.count' => ['required', 'integer'],
      'hotels.*.extra_bed' => ['required', 'boolean'],
      'hotels.*.hotel_id' => ['required', 'exists:hotels,id'],
      'hotels.*.room_type_id' => ['required', 'exists:room_types,id'],

      'transfer.arrival_airport_id' => ['required', 'exists:airports,id'],
      'transfer.arrival_flight_code' => ['required', 'string'],
      'transfer.arrival_time' => ['required', 'date'],
      'transfer.departure_airport_id' => ['required', 'exists:airports,id'],
      'transfer.departure_flight_code' => ['required', 'string'],
      'transfer.departure_time' => ['required', 'date'],
      'transfer.driver_name' => ['required', 'string'],
      'transfer.driver_number' => ['required', 'string'],
      'transfer.gid' => ['required', 'boolean'],
      'transfer.passengers' => ['required', 'integer'],
      'transfer.transport_id' => ['required', 'exists:transports,id'],
    ];
  }
}
