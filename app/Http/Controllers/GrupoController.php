<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Grupo;
use Carbon\Carbon;


class GrupoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
          $grupos = Grupo::join('academia','Grupos.id_academia','=','academia.id')
          ->join('Cursos', 'Grupos.id_curso', '=', 'Cursos.id')
          ->select('Grupos.id', 'Cursos.id as id_curso', 'Grupos.id_academia', 'Grupos.descripcion', 'Grupos.fecha_creado','academia.nombre as nombre_academia', 'Cursos.nombre as nombre_curso',  'Grupos.condicion')
          ->orderBy('Grupos.id', 'desc')->paginate(5);
        }
        else{
          $grupos = Grupo::join('academia','Grupos.id_academia','=','academia.id')
          ->join('Cursos', 'Grupos.id_curso', '=', 'Cursos.id')
          ->select('Grupos.id', 'Cursos.id as id_curso', 'Grupos.id_academia', 'Grupos.descripcion', 'Grupos.fecha_creado','academia.nombre as nombre_academia', 'Cursos.nombre as nombre_curso',  'Grupos.condicion')
          ->where('Grupos.'.$criterio, 'like', '%'. $buscar . '%')
          ->orWhere('academia.'.$criterio, 'like', '%'. $buscar . '%')
          ->orWhere('Cursos.'.$criterio, 'like', '%'. $buscar . '%')
          ->orderBy('Grupos.id', 'desc')->paginate(5);
        }


        return [
            'pagination' => [
                'total'        => $grupos->total(),
                'current_page' => $grupos->currentPage(),
                'per_page'     => $grupos->perPage(),
                'last_page'    => $grupos->lastPage(),
                'from'         => $grupos->firstItem(),
                'to'           => $grupos->lastItem(),
            ],
            'grupos' => $grupos
        ];
    }

    public function store(Request $request)
    {
      if(!$request->ajax()) return redirect('/');
      $grupo = new Grupo();
      $grupo->id_academia = $request->id_academia;
      $grupo->id_curso = $request->id_curso;
      $grupo->fecha_creado = Carbon::now()->format('Y-m-d');
      $grupo->descripcion = $request->descripcion;
      $grupo->condicion = '1';
      $grupo->save();
    }

    public function update(Request $request)
    {
      if(!$request->ajax()) return redirect('/');
      $grupo = Grupo::findOrFail($request->id);
      $grupo->id_academia = $request->id_academia;
      $grupo->id_curso = $request->id_curso;
      $grupo->descripcion = $request->descripcion;
      $grupo->condicion = '1';
      $grupo->save();
    }

    //Función activar: cambia el estado a activado de un registro determinado
    public function activar(Request $request)
    {
      if(!$request->ajax()) return redirect('/');
      $grupo = Grupo::findOrFail($request->id);
      $grupo->condicion = '1';
      $grupo->save();
    }

    //Función desactivar: cambia el estado a desactivado de un registro determinado
    public function desactivar(Request $request)
    {
      if(!$request->ajax()) return redirect('/');
      $grupo = Grupo::findOrFail($request->id);
      $grupo->condicion = '0';
      $grupo->save();
    }




}
