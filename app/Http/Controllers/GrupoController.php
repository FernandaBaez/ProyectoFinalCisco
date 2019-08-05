<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
          $grupos = Grupo::join('academia','Grupos.id_academia','=','academia.id')
          ->select('Grupos.id', 'Grupos.id_academia', 'Grupos.nombre', 'Grupos.descripcion', 'academia.nombre as nombre_academia')
          ->orderBy('Grupos.id', 'desc')->paginate(5);
        }
        else{
          $grupos = Grupo::join('academia','Grupos.id_academia','=','academia.id')
          ->select('Grupos.id', 'Grupos.id_academia', 'Grupos.nombre', 'Grupos.descripcion', 'academia.nombre as nombre_academia')
          ->where('Grupos.'.$criterio, 'like', '%'. $buscar . '%')
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
      $grupo->nombre = $request->nombre;
      $grupo->descripcion = $request->descripcion;
      $grupo->condicion = '1';
      $grupo->save();
    }

    public function update(Request $request)
    {
      if(!$request->ajax()) return redirect('/');
      $grupo = Grupo::findOrFail($request->id);
      $grupo->id_academia = $request->id_academia;
      $grupo->nombre = $request->nombre;
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
