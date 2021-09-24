<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Company
 *
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @mixin Eloquent
 * @property int                             $id
 * @property string                          $name
 * @property string                          $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Company whereCode($value)
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereName($value)
 * @method static Builder|Company whereUpdatedAt($value)
 */
class Company extends Model
{

  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name', 'code'];
}
