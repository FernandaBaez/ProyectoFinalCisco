<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academia;

class AcademiaController extends Controller
{   /**
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
            $academias = Academia::join('contacto', 'academia.id_contacto','=','contacto.id')
              ->select('academia.id','academia.nombre', 'academia.direccion', 'academia.direccion2','academia.pais', 'academia.estado', 'academia.ciudad', 'academia.cp', 'academia.sitio', 'academia.tipo', 'contacto.nombre as nombre_contacto', 'academia.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5);
        }
        else{
          $academias = Academia::join('contacto', 'academia.id_contacto','=','contacto.id')
              ->select('academia.id','academia.nombre', 'academia.direccion', 'academia.direccion2','academia.pais', 'academia.estado', 'academia.ciudad', 'academia.cp', 'academia.sitio', 'academia.tipo', 'academia.id_contacto', 'contacto.nombre as nombre_contacto', 'academia.condicion')
            ->where('academia.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('academia.id', 'desc')->paginate(5);
        }*/

       if ($buscar==''){
            $academias = Academia::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $academias = Academia::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }


        return [
            'pagination' => [
                'total'        => $academias->total(),
                'current_page' => $academias->currentPage(),
                'per_page'     => $academias->perPage(),
                'last_page'    => $academias->lastPage(),
                'from'         => $academias->firstItem(),
                'to'           => $academias->lastItem(),
            ],
            'academias' => $academias
        ];
    }

    public function selectAcademia(Request $request){
        if (!$request->ajax()) return redirect('/');
        $academias = Academia::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['academias' => $academias];
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
        $academia = new Academia();
        $academia->nombre = $request->nombre;
        $academia->direccion = $request->direccion;
        $academia->direccion2 = $request->direccion2;
        $academia->pais = $request->pais;
        $academia->estado = $request->estado;
        $academia->ciudad = $request->ciudad;
        $academia->cp = $request->cp;
        $academia->sitio = $request->sitio;
        $academia->tipo = $request->tipo;
        $academia->condicion = '1';
        $academia->save();
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
        $academia = Academia::findOrFail($request->id);
        $academia->nombre = $request->nombre;
        $academia->direccion = $request->direccion;
        $academia->direccion2 = $request->direccion2;
        $academia->pais = $request->pais;
        $academia->estado = $request->estado;
        $academia->ciudad = $request->ciudad;
        $academia->cp = $request->cp;
        $academia->sitio = $request->sitio;
        $academia->tipo = $request->tipo;
        $academia->condicion = '1';
        $academia->save();
    }

   public function desactivar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $academia = Academia::findOrFail($request->id);
        $academia->condicion = '0';
        $academia->save();
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $academia = Academia::findOrFail($request->id);
        $academia->condicion = '1';
        $academia->save();
    }

}
