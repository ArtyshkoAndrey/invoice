<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
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
    return $this->morphMany(Day::class, 'model');
  }
}
