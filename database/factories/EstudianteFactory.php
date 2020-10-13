<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

/*
  $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('nota')->nullable();
            $table->date('fecha nacimiento');
            $table->string('identidad')->unique();
            $table->string('numero de cuenta')->unique();
            $table->timestamps();*/
$factory->define(\App\Estudiante::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName,
        'apellido'=>$faker->lastName,
        'nota'=>$faker->numberBetween(0,100),
        'fecha_nacimiento'=>$faker->dateTimeBetween(    '-40 years','-16 years'),
        'identidad'=>$faker->numerify('####-').$faker->numberBetween(1950,2005)
        .$faker->numerify('#####'),
        'numero_de_cuenta'=>$faker->numberBetween(2007,2020).'250'.$faker->numerify('####')
    ];
});
