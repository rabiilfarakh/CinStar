<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\Film;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\films>
 */
class filmsFactory extends Factory
{
    protected $model = Film::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'genre' => $this->faker->randomElement(['action', 'comédie', 'horreur', 'romance']),
            'acteur' =>$this->faker->name,
            'date' => $this->faker->date,
            'rating' => $this->faker->numberBetween(1,5),
            'salle_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
