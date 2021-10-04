<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run(): void
  {
    if (User::all()->count() === 0) {
      $user = new User();
      $user->name = 'Артышко Андрей';
      $user->email = 'artyshko.andrey@gmail.com';
      $user->password = Hash::make('241298art');
      $user->save();

      $user = new User();
      $user->name = 'Test user';
      $user->email = 'test@admin.com';
      $user->password = Hash::make('123123123');
      $user->save();
    }

    $this->call([
      CompaneSeedTable::class,
      HotelTableSeed::class,
      RoomTypeTableSeed::class,
      AirportTableSeed::class,
      ResortTableSeed::class,
    ]);
  }
}
