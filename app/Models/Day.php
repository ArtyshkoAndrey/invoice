<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
