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

        //if(!$request->ajax return redirect('/'); }

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $id_grupo = $request->id_grupo;


        if($id_grupo==''){
          if ($buscar==''){
            $inscripciones = Inscripcion::join('instructor', 'Inscripcion.id_instructor','=','instructor.id')
            ->join('Grupos', 'Inscripcion.id_grupo','=','Grupos.id')
            ->join('Cursos', 'Grupos.id_curso', '=', 'Cursos.id')
            ->select('Inscripcion.id','Inscripcion.id_instructor', 'Inscripcion.id_grupo', 'Inscripcion.estado', 'Inscripcion.condicion','Grupos.id_curso as id_curso', 'Cursos.nombre as nombre_curso')
            ->orderBy('Inscripcion.id', 'desc')->paginate(5);
          }
          else{
            $inscripciones = Inscripcion::join('instructor', 'Inscripcion.id_instructor','=','instructor.id')
            ->join('Grupos', 'Inscripcion.id_grupo','=','Grupos.id')
            ->join('Cursos', 'Grupos.id_curso', '=', 'Cursos.id')
            ->select('Inscripcion.id','Inscripcion.id_instructor', 'Inscripcion.id_grupo', 'Inscripcion.estado', 'Inscripcion.condicion','Grupos.id_curso as id_curso', 'Cursos.nombre as nombre_curso')
            ->where('Inscripcion.'.$criterio, 'like', '%'. $buscar . '%') //falta or
            ->orderBy('Inscripcion.id', 'desc')->paginate(5);
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
        else{
          if($buscar==''){
            $inscripciones = Inscripcion::join('instructor', 'Inscripcion.id_instructor','=','instructor.id')
            ->join('Grupos', 'Inscripcion.id_grupo','=','Grupos.id')
            ->select('Inscripcion.id','Inscripcion.id_instructor', 'Inscripcion.id_grupo', 'Inscripcion.estado', 'instructor.nombre as nombre_instructor', 'instructor.apellido as apellido_instructor')
            ->where('Inscripcion.id_grupo', $id_grupo)
            ->orderBy('instructor.id', 'desc')->paginate(5);
          }
          else{
            $inscripciones = Inscripcion::join('instructor', 'Inscripcion.id_instructor','=','instructor.id')
            ->join('Grupos', 'Inscripcion.id_grupo','=','Grupos.id')
            ->join('Cursos', 'Grupos.id_curso', '=', 'Cursos.id')
            ->select('Inscripcion.id','Inscripcion.id_instructor', 'Inscripcion.id_grupo', 'Inscripcion.estado', 'Inscripcion.condicion','Grupos.id_curso as id_curso', 'Cursos.nombre as nombre_curso', 'instructor.nombre as nombre_instructor', 'instructor.apellido as apellido_instructor' )
            ->where('Inscripcion.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('Inscripcion.id', 'desc')->paginate(5);
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
        $inscripcion->id_grupo = $request->id_grupo;
        $inscripcion->estado = "En espera";
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
    public function update(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = Inscripcion::findOrFail($request->id);
        $inscripcion->id_instructor = $request->id_instructor;
        $inscripcion->id_grupo = $request->id_grupo;
        $inscripcion->estado = "En espera";
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
        //$inscripcion->encurso = '0';
        $inscripcion->save();
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $inscripcion = Inscripcion::findOrFail($request->id);
        $inscripcion->condicion = '1';
        //$inscripcion->encurso = '0';
        $inscripcion->save();
    }

}
