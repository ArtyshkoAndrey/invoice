<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotlineInInvoiceTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('invoices', function (Blueprint $table) {
      $table->string('phone')->nullable()->after('gid');
      $table->string('cost')->default(0)->after('gid');
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
      $table->dropColumn(['phone', 'cost']);
    });
  }
}
