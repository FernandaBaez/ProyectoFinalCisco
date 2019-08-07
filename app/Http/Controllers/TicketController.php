<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
class TicketController extends Controller
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
            $tickets = Ticket::orderBy('id', 'desc')->paginate(2);;
        }
        else{
            $tickets = Ticket::where($criterio, 'like', '%'. $buscar . '%')
              ->orderBy('id', 'desc')->paginate(2);;
        }
        
        return [
            'pagination' => [
                'total'        => $tickets->total(),
                'current_page' => $tickets->currentPage(),
                'per_page'     => $tickets->perPage(),
                'last_page'    => $tickets->lastPage(),
                'from'         => $tickets->firstItem(),
                'to'           => $tickets->lastItem(),
            ],
            'tickets' => $tickets
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
        $ticket = new Ticket();
        $ticket->id_contacto = $request->id_contacto;
        $ticket->asunto = $request->asunto;
        $ticket->save();
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
