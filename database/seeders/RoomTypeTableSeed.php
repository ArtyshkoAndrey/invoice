<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeTableSeed extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run (): void
  {
    if (RoomType::all()->count() === 0) {
      RoomType::factory()->count(10)->create();
    }
  }
}
