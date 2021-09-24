<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Seeder;

class AirportTableSeed extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run (): void
  {
    if (Airport::all()->count() === 0) {
      Airport::factory()->count(1)->create();
    }
  }
}
