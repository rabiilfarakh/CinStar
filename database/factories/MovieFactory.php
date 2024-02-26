<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'year' => $this->faker->year,
            'runtime' => $this->faker->numberBetween(60, 180),
            'released' => $this->faker->date(),
            'awards' => $this->faker->sentence,
            'genre' => $this->faker->randomElement(['action', 'comédie', 'horreur', 'romance']),
            'acteur' => $this->faker->name,
            'rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R']),
        ];
    }
}
