<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    //Responde a las peticiones de estudante/crear

    public function crear(){
        return view('crearEstudiante');
    }

    public function saludar($usuario ='Anonim@'){
        return view('saludo')->with('nombre',$usuario);
    }
////////////////////////////////////////////III unidad /////////////////////////////////////////
    //Responde a la raiz de estudiante
    //Estas ya es para q lo del modelo salga en el navegador
    public function index(){
        //$estudiantes = Estudiante::All();
        $estudiantes = Estudiante::paginate(10);
        return view('raizestudiante')->with('estudiantes',$estudiantes);
    }
    //para ver solo un estudiante del modelo,
    public function show($id){
        $estudiante =Estudiante::findOrFail($id);
        return view('estudianteIndividual')->with('estudiante',$estudiante);
    }

    ////crear
    public function create(){
        return view('FormularioEstudiante');
    }
        //funcion para gurdar el formulario
    public  function store(Request $request){

        // validar
            $request->validate([
                'nombre'=>'required|alpha',
                'apellido'=>'required|alpha',
                'nota'=>'required|numeric|min:0|max:100',
                'identidad'=>'required|unique:estudiantes,identidad',
                'cuenta'=>'required|numeric|unique:estudiantes,numero_de_cuenta'
            ]);

            // formulario
            $nuevoEstudiante = new Estudiante();
            $nuevoEstudiante->nombre= $request->input('nombre');
            $nuevoEstudiante->apellido=$request->input('apellido');
            $nuevoEstudiante->nota=$request->input('nota');
            $nuevoEstudiante->identidad=$request->input('identidad');
            $nuevoEstudiante->numero_de_cuenta=$request->input('cuenta');

            //fingir que viene de fuente externa ejem registro de las personas
            $nuevoEstudiante->fecha_nacimiento='20000512';

            $creado = $nuevoEstudiante->save();
            //Asegurarse que fue creado
            if ($creado){
                return redirect()->route('estudiante.index')
                    ->with('mensaje','El Estudiante fue creado exitosamente');

            }else{
                //Retornar con un mensaje de error
            }
    }
    //editar un estudiante
    public function edit($id){
        $estudiante=Estudiante::findOrFail($id);
        return view('FormularioEditarEstudiante')
            ->with('estudiante',$estudiante);
    }
    //funcion update
    //se le inyecta el request ya que obtenemos datos de nuestro servidor
    public function update(Request $request,$id){
        // validar
        $request->validate([
            'nombre'=>'required|alpha',
            'apellido'=>'required|alpha',
            'nota'=>'required|numeric|min:0|max:100',
            'identidad'=>'required',
            'cuenta'=>'required|numeric'
        ]);
        $estudiante= Estudiante::findOrFail($id);

        //formulario
        $estudiante->nombre= $request->input('nombre');
        $estudiante->apellido=$request->input('apellido');
        $estudiante->nota=$request->input('nota');
        $estudiante->identidad=$request->input('identidad');
        $estudiante->numero_de_cuenta=$request->input('cuenta');

        //Esta no se modifica ya q siempre sigue siendo extena
        $estudiante->fecha_nacimiento='20000512';

        $creado = $estudiante->save();
        //Asegurarse que fue creado
        if ($creado){
            //lo de autenticacion
            $user =Auth::user();
            //

            return redirect()->route('estudiante.index')
                ->with('mensaje','El Estudiante fue modificado exitosamente por '. $user->name);

        }else{
            //Retornar con un mensaje de error
        }

    }

    //funcion para eliminar
    // recibe el id del que se va eliminar
    public function destroy($id){
        Estudiante::destroy($id);
        //rediccionar a la pagina index
        return redirect('/estudiantes/')->with('mensaje','Estudiante borrado completamente');


    }







}
