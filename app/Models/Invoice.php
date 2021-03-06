<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Invoice
 *
 * @property int                       $id
 * @property string                    $user_name
 * @property string                    $user_nationality
 * @property int                       $transport_id
 * @property int                       $company_id
 * @property Carbon                    $arrival_time
 * @property int                       $arrival_airport_id
 * @property string                    $arrival_flight_code
 * @property Carbon                    $departure_time
 * @property int                       $departure_airport_id
 * @property string                    $departure_flight_code
 * @property string                    $driver_number
 * @property string                    $driver_name
 * @property int                       $passengers
 * @property bool                      $gid
 * @property string                    $cost
 * @property string|null               $phone
 * @property Carbon|null               $created_at
 * @property Carbon|null               $updated_at
 * @property-read Airport              $arrival_airport
 * @property-read Collection|Booking[] $bookings
 * @property-read int|null             $bookings_count
 * @property-read Company              $company
 * @property-read Collection|Day[]     $days
 * @property-read int|null             $days_count
 * @property-read Airport              $departure_airport
 * @property-read Transport            $transport
 * @property-read object               $hotline
 * @method static Builder|Invoice newModelQuery()
 * @method static Builder|Invoice newQuery()
 * @method static Builder|Invoice query()
 * @method static Builder|Invoice whereArrivalAirportId($value)
 * @method static Builder|Invoice whereArrivalFlightCode($value)
 * @method static Builder|Invoice whereArrivalTime($value)
 * @method static Builder|Invoice whereCompanyId($value)
 * @method static Builder|Invoice whereCost($value)
 * @method static Builder|Invoice whereCreatedAt($value)
 * @method static Builder|Invoice whereDepartureAirportId($value)
 * @method static Builder|Invoice whereDepartureFlightCode($value)
 * @method static Builder|Invoice whereDepartureTime($value)
 * @method static Builder|Invoice whereDriverName($value)
 * @method static Builder|Invoice whereDriverNumber($value)
 * @method static Builder|Invoice whereGid($value)
 * @method static Builder|Invoice whereId($value)
 * @method static Builder|Invoice wherePassengers($value)
 * @method static Builder|Invoice wherePhone($value)
 * @method static Builder|Invoice whereTransportId($value)
 * @method static Builder|Invoice whereUpdatedAt($value)
 * @method static Builder|Invoice whereUserName($value)
 * @method static Builder|Invoice whereUserNationality($value)
 * @mixin Eloquent
 */
class Invoice extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_name',
    'user_nationality',
    'arrival_time',
    'arrival_flight_code',
    'departure_time',
    'departure_flight_code',
    'driver_number',
    'driver_name',
    'passengers',
    'gid',
    'phone',
    'cost',
  ];

  protected $casts = [
    'gid' => 'boolean',
    'departure_time' => 'datetime',
    'arrival_time' => 'datetime',
  ];

  protected $appends = [
    'hotline',
  ];

  /**
   * ???????????????? ????????????
   *
   * @return BelongsTo
   */
  public function arrival_airport(): BelongsTo
  {
    return $this->belongsTo(Airport::class, 'arrival_airport_id', 'id');
  }

  /**
   * ???????????????? ????????????
   *
   * @return BelongsTo
   */
  public function departure_airport(): BelongsTo
  {
    return $this->belongsTo(Airport::class, 'departure_airport_id', 'id');
  }

  /**
   * ????????????????
   *
   * @return BelongsTo
   */
  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  /**
   * ???????????????? ????????????
   *
   * @return HasMany
   */
  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class);
  }

  public function days(): MorphMany
  {
    return $this->morphMany(Day::class, 'model');
  }

  public function transport(): BelongsTo
  {
    return $this->belongsTo(Transport::class);
  }

  public function getHotlineAttribute(): object
  {
    return (object)[
      'phone' => $this->phone,
      'cost' => $this->cost,
    ];
  }
}
