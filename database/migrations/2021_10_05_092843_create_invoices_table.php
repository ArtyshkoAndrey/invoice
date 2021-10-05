<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->string('user_name');
      $table->string('user_nationality');
      $table->foreignId('company_id')
        ->constrained('companies')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->dateTime('arrival_time');
      $table->foreignId('arrival_airport_id')
        ->constrained('airports')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->string('arrival_flight_code');

      $table->dateTime('departure_time');
      $table->foreignId('departure_airport_id')
        ->constrained('airports')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->string('departure_flight_code');

      $table->string('driver_number');
      $table->string('driver_name');

      $table->integer('passengers');
      $table->boolean('gid');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('invoices');
  }
}
