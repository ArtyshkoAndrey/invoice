<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Database\Factories\HotelFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Hotel
 *
 * @property int         $id
 * @property string      $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Hotel newModelQuery()
 * @method static Builder|Hotel newQuery()
 * @method static Builder|Hotel query()
 * @method static Builder|Hotel whereCreatedAt($value)
 * @method static Builder|Hotel whereId($value)
 * @method static Builder|Hotel whereName($value)
 * @method static Builder|Hotel whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static HotelFactory factory(...$parameters)
 */
class Hotel extends Model
{

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name'];
}
