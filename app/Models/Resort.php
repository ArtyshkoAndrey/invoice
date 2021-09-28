<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Database\Factories\ResortFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Туры, которые добавляют в дни
 *
 * @property int                             $id
 * @property string                          $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ResortFactory factory(...$parameters)
 * @method static Builder|Resort newModelQuery()
 * @method static Builder|Resort newQuery()
 * @method static Builder|Resort query()
 * @method static Builder|Resort whereCreatedAt($value)
 * @method static Builder|Resort whereId($value)
 * @method static Builder|Resort whereName($value)
 * @method static Builder|Resort whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Resort extends Model
{

  use HasFactory;

  protected $fillable = ['name'];
}
