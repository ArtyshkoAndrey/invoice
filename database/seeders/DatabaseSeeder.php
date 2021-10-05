<?php

namespace Database\Seeders;

use DB;
use App\Models\Day;
use App\Models\User;
use App\Models\Sample;
use App\Models\Resort;
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

    $path = public_path('invoice.sql');
    $sql = file_get_contents($path);
    DB::unprepared($sql);

//    if (User::all()->count() === 0) {
//      $user = new User();
//      $user->name = 'Артышко Андрей';
//      $user->email = 'artyshko.andrey@gmail.com';
//      $user->password = Hash::make('241298art');
//      $user->save();
//
//      $user = new User();
//      $user->name = 'Test user';
//      $user->email = 'test@admin.com';
//      $user->password = Hash::make('123123123');
//      $user->save();
//    }
//
//    $this->call([
//      CompaneSeedTable::class,
//      HotelTableSeed::class,
//      RoomTypeTableSeed::class,
//      AirportTableSeed::class,
//      ResortTableSeed::class,
//    ]);
//    if (Sample::all()->count() === 0) {
//      for($i = 0; $i < 10; $i++) {
//        $sample = new Sample([
//          'name' => 'Tур на ' . 10 - $i - 1 . ' дней'
//        ]);
//        $sample->save();
//        for ($j = 0; $j < 10 - $i - 1; $j++) {
//          $day = new Day();
//          $day->order = $j + 1;
//          $day->free = rand(0, 1);
//          $day->resort()->associate(Resort::all()->random(1)->first()->id);
//          $day->model()->associate($sample);
//          $day->save();
//        }
//      }
//    }

  }
}
