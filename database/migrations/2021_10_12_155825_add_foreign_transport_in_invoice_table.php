<?php

use App\Models\Transport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * add transport in invoice
 */
class AddForeignTransportInInvoiceTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    if (Transport::count() === 0) {
      $transport = new Transport(['name' => 'Минивен']);
      $transport->save();
    } else {
      $transport = Transport::first();
    }

    Schema::table('invoices', function (Blueprint $table) use ($transport) {
      $table->foreignId('transport_id')
        ->after('user_nationality')
        ->default($transport->id)
        ->constrained('transports')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
    Schema::table('invoices', function (Blueprint $table) {
      $table->foreignId('transport_id')
        ->nullable(false)
        ->default(null)
        ->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('invoices', function (Blueprint $table) {
      $table->removeColumn('transport_id');
    });
  }
}
