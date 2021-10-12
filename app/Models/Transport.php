<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Transport
 *
 * @property int         $id
 * @property string      $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Transport newModelQuery()
 * @method static Builder|Transport newQuery()
 * @method static Builder|Transport query()
 * @method static Builder|Transport whereCreatedAt($value)
 * @method static Builder|Transport whereId($value)
 * @method static Builder|Transport whereName($value)
 * @method static Builder|Transport whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Transport extends Model
{
  use HasFactory;

  /**
   * @var string[]
   */
  protected $fillable = [
    'name',
  ];
}
