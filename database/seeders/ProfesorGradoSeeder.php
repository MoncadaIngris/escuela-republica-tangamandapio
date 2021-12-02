<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfesorGrado;
class ProfesorGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfesorGrado::Factory(57)->create();
    }
}
