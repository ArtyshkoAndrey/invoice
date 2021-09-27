<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Seeder;

class ResortTableSeed extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run (): void
  {
    if (Resort::all()->count() === 0) {
      Resort::factory()->count(20)->create();
    }
  }
}
