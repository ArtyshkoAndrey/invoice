<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaneSeedTable extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run (): void
  {
    if (Company::all()->count() === 0) {
      Company::factory()
        ->count(5)
        ->create();
    }
  }
}
