<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripcion;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(!$request->ajax()){
          return redirect('/');
        }
      
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        /*if ($buscar==''){
            $inscripciones = Inscripcion::orderBy('id', 'desc')->paginate(2);
        }
        else{
            $inscripciones = Inscripcion::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(2);
        }*/
      
       if ($buscar==''){
              $inscripciones = Inscripcion::join('instructor', 'instructor_curso.id_instructor','=','instructor.id')
              ->join('Cursos', 'instructor_curso.id_curso','=','Cursos.id')
              ->select('instructor_curso.id','instructor_curso.id_instructor', 'instructor_curso.id_curso', 'instructor_curso.requiere_orientacion','instructor_curso.fecha_s', 'instructor_curso.horario', 'instructor_curso.fecha_p', 'Cursos.nombre as nombre_curso', 'instructor.nombre as nombre_instructor',  'instructor_curso.condicion')
              ->orderBy('instructor_curso.id', 'desc')->paginate(5);
        }
        else{
              $inscripciones = Inscripcion::join('instructor', 'instructor_curso.id_instructor','=','instructor.id')
              ->join('Cursos', 'instructor_curso.id_curso','=','Cursos.id')
              ->select('instructor_curso.id','instructor_curso.id_instructor', 'instructor_curso.id_curso', 'instructor_curso.requiere_orientacion','instructor_curso.fecha_s', 'instructor_curso.horario', 'instructor_curso.fecha_p', 'Cursos.nombre as nombre_curso', 'instructor.nombre as nombre_instructor',  'instructor_curso.condicion')
              ->where('instructor_curso.'.$criterio, 'like', '%'. $buscar . '%')
              ->orderBy('instructor_curso.id', 'desc')->paginate(5);
        }
        
 
        return [
            'pagination' => [
                'total'        => $inscripciones->total(),
                'current_page' => $inscripciones->currentPage(),
                'per_page'     => $inscripciones->perPage(),
                'last_page'    => $inscripciones->lastPage(),
                'from'         => $inscripciones->firstItem(),
                'to'           => $inscripciones->lastItem(),
            ],
            'inscripciones' => $inscripciones
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = new Inscripcion();
        $inscripcion->id_instructor = $request->id_instructor;
        $inscripcion->id_curso = $request->id_curso;
        $inscripcion->requiere_orientacion = $request->requiere_orientacion;
        $inscripcion->fecha_s = $request->fecha_s;
        $inscripcion->fecha_p = $request->fecha_p;
        $inscripcion->horario = $request->horario;
        $inscripcion->condicion = '1';
        $inscripcion->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = Inscripcion::findOrFail($request->id);
        $inscripcion->id_instructor = $request->id_instructor;
        $inscripcion->id_curso = $request->id_curso;
        $inscripcion->requiere_orientacion = $request->requiere_orientacion;
        $inscripcion->fecha_s = $request->fecha_s;
        $inscripcion->fecha_p = $request->fecha_p;
        $inscripcion->horario = $request->horario;
        $inscripcion->condicion = '1';
        $inscripcion->save();
    }

   public function desactivar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = Inscripcion::findOrFail($request->id);
        $inscripcion->condicion = '0';
        $inscripcion->save();
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = Inscripcion::findOrFail($request->id);
        $inscripcion->condicion = '1';
        $inscripcion->save();
    }

}
