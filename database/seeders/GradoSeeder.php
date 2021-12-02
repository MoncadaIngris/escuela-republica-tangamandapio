<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;
class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::Factory(10)->create();
    }
}
