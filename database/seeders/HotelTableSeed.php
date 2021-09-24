<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelTableSeed extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run (): void
  {
    if (Hotel::all()->count() === 0) {
      Hotel::factory()->count(10)->create();
    }
  }
}
