<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorGradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'id_grado'  => $this -> faker -> numberBetween($min = 1, $max = 10),
            'id_profesor'=> $this -> faker -> numberBetween($min = 1, $max = 20),
        ];
    }
}
