<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Day
 *
 * @property int                 $id
 * @property int                 $order
 * @property bool                $free
 * @property int|null            $resort_id
 * @property string              $model_type
 * @property int                 $model_id
 * @property Carbon|null         $created_at
 * @property Carbon|null         $updated_at
 * @property-read Model|Eloquent $model
 * @property-read Resort|null    $resort
 * @property bool                $half_day
 * @method static Builder|Day newModelQuery()
 * @method static Builder|Day newQuery()
 * @method static Builder|Day query()
 * @method static Builder|Day whereCreatedAt($value)
 * @method static Builder|Day whereFree($value)
 * @method static Builder|Day whereId($value)
 * @method static Builder|Day whereModelId($value)
 * @method static Builder|Day whereModelType($value)
 * @method static Builder|Day whereOrder($value)
 * @method static Builder|Day whereResortId($value)
 * @method static Builder|Day whereUpdatedAt($value)
 * @method static Builder|Day whereHalfDay($value)
 * @mixin Eloquent
 */
class Day extends Model
{
  use HasFactory;

  /**
   * Columns
   *
   * @var string[]
   */
  protected $fillable = [
    'order',
    'free',
    'half_day',
  ];

  /**
   * Type columns
   *
   * @var string[]
   */
  protected $casts = [
    'free' => 'boolean',
    'half_day' => 'boolean',
  ];

  /**
   * Get the parent model (Sample or Invoice).
   *
   * @return MorphTo
   */
  public function model(): MorphTo
  {
    return $this->morphTo();
  }

  /**
   * @return BelongsTo
   */
  public function resort(): BelongsTo
  {
    return $this->belongsTo(Resort::class);
  }
}
