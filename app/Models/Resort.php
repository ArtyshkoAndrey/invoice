<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Туры, которые добавляют в дни
 */
class Resort extends Model
{

  use HasFactory;

  protected $fillable = ['name'];
}
