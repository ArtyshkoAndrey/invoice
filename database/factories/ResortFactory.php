<?php

namespace Database\Factories;

use App\Models\Resort;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResortFactory extends Factory
{

  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Resort::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition (): array
  {
    return [
      'name' => $this->faker->unique()->domainName
    ];
  }
}
