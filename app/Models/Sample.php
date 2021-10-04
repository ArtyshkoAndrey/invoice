<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Sample
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Day[] $days
 * @property-read int|null $days_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sample newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sample whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sample extends Model
{
  use HasFactory;

  /**
   * Columns
   *
   * @var string[]
   */
  protected $fillable = [
    'name'
  ];

  /**
   * Get all the days.
   *
   * @return MorphMany
   */
  public function days(): MorphMany
  {
    return $this->morphMany(Day::class, 'model')->orderBy('order');
  }
}
