<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id();
//    Отель
      $table->foreignId('hotel_id')
        ->constrained('hotels')
        ->onDelete('cascade')
        ->onUpdate('cascade');
//    Комната
      $table->foreignId('room_type_id')
        ->constrained('room_types')
        ->onDelete('cascade')
        ->onUpdate('cascade');
//      Кол-во
      $table->integer('count');

      $table->boolean('extra_bed')->default(false);
//    Взрослые и дети
      $table->integer('adults')->default(0);
      $table->integer('children')->default(0);

      $table->string('bb')->default('bb');

//    Приехал уехал
      $table->date('check_in');
      $table->date('check_out');
//    Номер бронирования
      $table->bigInteger('booking_number');

      $table->foreignId('invoice_id')
        ->constrained('invoices')
        ->onDelete('cascade')
        ->onUpdate('cascade');

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
    Schema::dropIfExists('bookings');
  }
}
