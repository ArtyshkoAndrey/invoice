<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignResort extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('days', function (Blueprint $table) {
      $table->foreignId('resort_id')
        ->nullable()
        ->after('free')
        ->constrained('resorts')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('days', function (Blueprint $table) {
      $table->dropForeign(['resort_id']);
      $table->dropColumn('resort_id');
    });
  }
}
