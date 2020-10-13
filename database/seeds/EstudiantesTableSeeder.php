<?php

use Illuminate\Database\Seeder;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class,50)->create();
        factory(App\Estudiante::class,500)->create();
    }
}
