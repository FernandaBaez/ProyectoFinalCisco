<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
class CursoController extends Controller
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

        if ($buscar==''){
            $cursos = Curso::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $cursos = Curso::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }


        return [
            'pagination' => [
                'total'        => $cursos->total(),
                'current_page' => $cursos->currentPage(),
                'per_page'     => $cursos->perPage(),
                'last_page'    => $cursos->lastPage(),
                'from'         => $cursos->firstItem(),
                'to'           => $cursos->lastItem(),
            ],
            'cursos' => $cursos
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
      $curso = new Curso();
      $curso->nombre = $request->nombre;
      $curso->descripcion = $request->descripcion;
      $curso->fecha = $request->fecha;
      $curso->condicion = '1';
      $curso->save();
    }

    public function selectCurso(Request $request){
        if (!$request->ajax()) return redirect('/');
        $curso = Curso::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'desc')->get();
        return ['cursos' => $curso];
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
      $curso = Curso::findOrFail($request->id);
      $curso->nombre = $request->nombre;
      $curso->descripcion = $request->descripcion;
      $curso->fecha = $request->fecha;
      $curso->condicion = '1';
      $curso->save();
    }

    //Función activar: cambia el estado a activado de un registro determinado
    public function activar(Request $request)
    {
      $curso = Curso::findOrFail($request->id);
      $curso->condicion = '1';
      $curso->save();
    }

    //Función desactivar: cambia el estado a desactivado de un registro determinado
    public function desactivar(Request $request)
    {
      $curso = Curso::findOrFail($request->id);
      $curso->condicion = '0';
      $curso->save();
    }


}
