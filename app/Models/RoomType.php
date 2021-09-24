<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RoomType
 *
 * @property int                             $id
 * @property string                          $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|RoomType newModelQuery()
 * @method static Builder|RoomType newQuery()
 * @method static Builder|RoomType query()
 * @method static Builder|RoomType whereCreatedAt($value)
 * @method static Builder|RoomType whereId($value)
 * @method static Builder|RoomType whereName($value)
 * @method static Builder|RoomType whereUpdatedAt($value)
 * @mixin Eloquent
 */
class RoomType extends Model
{

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name'];
}
