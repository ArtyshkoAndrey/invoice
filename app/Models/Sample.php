<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Sample
 *
 * @property int                   $id
 * @property string                $name
 * @property Carbon|null           $created_at
 * @property Carbon|null           $updated_at
 * @property-read Collection|Day[] $days
 * @property-read int|null         $days_count
 * @method static Builder|Sample newModelQuery()
 * @method static Builder|Sample newQuery()
 * @method static Builder|Sample query()
 * @method static Builder|Sample whereCreatedAt($value)
 * @method static Builder|Sample whereId($value)
 * @method static Builder|Sample whereName($value)
 * @method static Builder|Sample whereUpdatedAt($value)
 * @mixin Eloquent
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
    'name',
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
