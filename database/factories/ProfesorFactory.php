<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_nacimiento' => $this -> faker -> dateTime($max = 'now', $timezone = null),
            'nombres' => $this -> faker -> firstName(),
            'apellidos' => $this -> faker -> lastName(),
            'identidad' => $this -> faker->unique()-> bothify('####-####-###'),
            'telefono' => $this -> faker->unique()-> bothify('########'),
            'direccion' => $this -> faker-> text(50),
            'sexo' => $this -> faker -> randomElement(['Femenino', 'Masculino'])
        ];
    }
}
