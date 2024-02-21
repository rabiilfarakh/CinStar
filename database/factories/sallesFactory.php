<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\salles;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\salles>
 */
class sallesFactory extends Factory
{
    protected $model = salles::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(["salle A","salle B","salle C","salle D"]),
            'taille' => $this->faker->numberBetween('50','150'),
            'shema' =>$this->faker->text
        ];
    }
}
