<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Отели в заказах с данными
 *
 * @property int               $id
 * @property int               $hotel_id
 * @property int               $room_type_id
 * @property int               $count
 * @property bool              $extra_bed
 * @property int               $adults
 * @property int               $children
 * @property string            $bb
 * @property Carbon            $check_in
 * @property Carbon            $check_out
 * @property int               $booking_number
 * @property int               $invoice_id
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property-read Hotel        $hotel
 * @property-read Invoice|null $invoice
 * @property-read RoomType     $room
 * @method static Builder|Booking newModelQuery()
 * @method static Builder|Booking newQuery()
 * @method static Builder|Booking query()
 * @method static Builder|Booking whereAdults($value)
 * @method static Builder|Booking whereBb($value)
 * @method static Builder|Booking whereBookingNumber($value)
 * @method static Builder|Booking whereCheckIn($value)
 * @method static Builder|Booking whereCheckOut($value)
 * @method static Builder|Booking whereChildren($value)
 * @method static Builder|Booking whereCount($value)
 * @method static Builder|Booking whereCreatedAt($value)
 * @method static Builder|Booking whereExtraBed($value)
 * @method static Builder|Booking whereHotelId($value)
 * @method static Builder|Booking whereId($value)
 * @method static Builder|Booking whereInvoiceId($value)
 * @method static Builder|Booking whereRoomTypeId($value)
 * @method static Builder|Booking whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Booking extends Model
{
  use HasFactory;

  /**
   * @var string[]
   */
  protected $fillable = [
    'count',
    'extra_bed',
    'adults',
    'children',
    'bb',
    'check_in',
    'check_out',
    'booking_number',
  ];

  /**
   * @var string[]
   */
  protected $casts = [
    'extra_bed' => 'boolean',
    'check_in' => 'date',
    'check_out' => 'date',
  ];

  /**
   * Отель
   *
   * @return BelongsTo
   */
  public function hotel(): BelongsTo
  {
    return $this->belongsTo(Hotel::class);
  }

  /**
   * Отель
   *
   * @return BelongsTo
   */
  public function room(): BelongsTo
  {
    return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
  }

  /**
   * Заказ
   *
   * @return BelongsTo
   */
  public function invoice(): BelongsTo
  {
    return $this->belongsTo(Invoice::class);
  }
}
