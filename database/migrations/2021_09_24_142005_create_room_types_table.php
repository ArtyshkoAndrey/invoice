<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up (): void
  {
    Schema::create('room_types', function (Blueprint $table) {
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
    Schema::dropIfExists('room_types');
  }
}
