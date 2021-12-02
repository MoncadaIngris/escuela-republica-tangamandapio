<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this -> faker->unique() -> numberBetween($min = 1, $max = 10).$this -> faker -> bothify('grado'),
'aula' => $this -> faker->unique() -> numerify('#'),
'piso' => $this -> faker -> randomElement(['Abajo', 'Arriba']),
        ];
    }
}
