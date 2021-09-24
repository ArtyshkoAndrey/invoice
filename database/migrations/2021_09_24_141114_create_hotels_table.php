<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up (): void
  {
    Schema::create('hotels', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down (): void
  {
    Schema::dropIfExists('hotels');
  }
}
