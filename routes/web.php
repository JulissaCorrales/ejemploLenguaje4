<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hola',function (){
    return "Hola Mundo";
});
/*
Route::get('/nombre/{usuario?}',function ($usuario='Anonimo'){
    return "Saludo ".$usuario;
})->where ('usuario','[A-Za-z]+')->middleware('auth')->name('saludo');*/

Route::get('/nombre/{usuario?}','EstudianteController@saludar')->where ('usuario','[A-Za-z]+');

//Prefijo Estudiante
/*Route::group(['prefix'=>'estudiante'],function (){

    //ruta: estudiante/
        Route::get('/','EstudianteController@index');

    //ruta: estudiante/crear
        Route::get('crear','EstudianteController@crear');
    });

//Rutas para el ejemplo de plantillas blade
Route::get('hija1',function (){
   return view('hija1')->with('nota',35);
});
Route::get('hija2',function (){
    $estudiantes=['Karla Oseguera','Pedro gonzales','Juan Perez',
        'Ana Diaz','Elsa Palao'];
    //$estudiantes=[];
    return view('hija2',['estudiantes'=>$estudiantes,'i'=>1]);
});
*/
////////////////////////3 unidad///////////////////////////////////////////////////
//Grupo de rutas para estudiantes para mostrar datos del modelo en el navegador
Route::get('/estudiantes','EstudianteController@index')->name('estudiante.index')
->middleware('auth');


//ruta para leer estudiante individual
Route::get('/estudiantes/{id}','EstudianteController@show')->name('estudiante.mostrar')
    ->where('id','[0-9]+')->middleware('auth');

// ruta para crear
//ruta q nos mostrara el formulario
Route::get('/estudiantes/crear','EstudianteController@create')
    ->name('estudiante.crear')->middleware('auth');
//ruta para recibir formulario
Route::post('/estudiantes/crear','EstudianteController@store')
    ->name('estudiante.guardar')->middleware('auth');


//ruta para editar
    //para mostrar el formulario del usuario que busca
Route::get('/estudiantes/{id}/editar','EstudianteController@edit')
    ->name('estudiante.edit')->where('id','[0-9]+')->middleware('auth');
    //ruta para guardar la edicion de un estudiante existente
Route::put('/estudiantes/{id}/editar','EstudianteController@update')
    ->name('estudiante.update')->where('id','[0-9]+')->middleware('auth');

// ruta para borrar
Route::delete('/estudiantes/{id}/borrar','EstudianteController@destroy')
    ->name('estudiante.borrar')->where('id','[0-9]+')->middleware('auth');


//rutas que agrego la autenticacion
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
