<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;

class MensajeController extends Controller
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
            $mensajes = Mensaje::orderBy('id', 'desc')->paginate(2);;
        }
        else{
            $tickets = Mensaje::where($criterio, 'like', '%'. $buscar . '%')
              ->orderBy('id', 'desc')->paginate(2);;
        }
        
        return [
            'pagination' => [
                'total'        => $mensajes->total(),
                'current_page' => $mensajes->currentPage(),
                'per_page'     => $mensajes->perPage(),
                'last_page'    => $mensajes->lastPage(),
                'from'         => $mensajes->firstItem(),
                'to'           => $mensajes->lastItem(),
            ],
            'mensajes' => $mensajes
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
        $now = new \DateTime();
        $mensaje = new Mensaje();
        $mensaje->id_ticket = $request->id_ticket;
        $mensaje->msj = $request->msj;
        $mensaje->fecha =  $now->format('d-m-Y H:i:s');
        $mensaje->save();
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
        //
    }
}
