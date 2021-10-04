<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Day
 *
 * @property int $id
 * @property int $order
 * @property bool $free
 * @property int|null $resort_id
 * @property string $model_type
 * @property int $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $model
 * @property-read \App\Models\Resort|null $resort
 * @method static \Illuminate\Database\Eloquent\Builder|Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day query()
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereResortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereUpdatedAt($value)
 * @mixin \Eloquent
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
  ];

  /**
   * Type columns
   *
   * @var string[]
   */
  protected $casts = [
    'free' => 'boolean',
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
