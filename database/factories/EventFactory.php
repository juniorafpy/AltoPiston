<?php

namespace Database\Factories;

use Faker\Provider\ar_EG\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => fake()->text( 30),
          'descripcion' => fake()->text( 200),
          'status'=> fake()->randomElement(['Borrador','Publicado']),
          'Type'=> fake()->randomElement(['Pera','Manzana','Zanahoria','Zapallo']),
          'date'=>fake()->date()
        ];
    }
}
