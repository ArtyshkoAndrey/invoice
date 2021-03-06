<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up (): void
  {
    Schema::create('companies', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('code')->unique();
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
    Schema::dropIfExists('companies');
  }
}
