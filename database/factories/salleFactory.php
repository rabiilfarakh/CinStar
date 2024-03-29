<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\Salle;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\salle>
 */
class salleFactory extends Factory
{
    protected $model = Salle::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(["salle A","salle B","salle C","salle D"]),
            'taille' => $this->faker->numberBetween('20','40'),
            'shema' =>$this->faker->text
        ];
    }
}
