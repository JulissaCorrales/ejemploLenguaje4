<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //Espera que la tabla se llame estudiantes
    //si el modelo se llama Rol espera una tabla que se llame rols y no roles
    //para evitar esto podriamos hacer esto aqui en el modelo:
    // protected $table ='roles';
}
