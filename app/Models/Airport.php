<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Database\Factories\AirportFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Airport
 *
 * @property int         $id
 * @property string      $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static AirportFactory factory(...$parameters)
 * @method static Builder|Airport newModelQuery()
 * @method static Builder|Airport newQuery()
 * @method static Builder|Airport query()
 * @method static Builder|Airport whereCreatedAt($value)
 * @method static Builder|Airport whereId($value)
 * @method static Builder|Airport whereName($value)
 * @method static Builder|Airport whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Airport extends Model
{

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name'];
}
