<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHalfDayInDays extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('days', function (Blueprint $table) {
      $table->boolean('half_day')->default(false)->after('free');
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
      $table->dropColumn(['half_day']);
    });
  }
}
