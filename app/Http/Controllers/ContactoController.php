<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Contacto;
class ContactoController extends Controller
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
              $contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5);
        }
        else{
            $contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->where('contacto.'.$criterio, 'like', '%'. $buscar . '%')
              ->orderBy('contacto.id', 'desc')->paginate(5);
        }
         
      /*
       $contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
                                ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'contacto.condicion')
            ->where('contacto.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('contacto.id', 'desc')->paginate(5);
            
            
            
            
            //usando db
            if ($buscar==''){
            $contactos = DB::table('contacto')
              ->join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5)
              ->get();
        }
        else{
            $contactos = DB::table('contacto')
              ->join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5)
              ->get();
              
        }
        
        //elocuent
        
                    $contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5);
        }
        else{
            $contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->orderBy('contacto.id', 'desc')->paginate(5);
            */
        return [
            'pagination' => [
                'total'        => $contactos->total(),
                'current_page' => $contactos->currentPage(),
                'per_page'     => $contactos->perPage(),
                'last_page'    => $contactos->lastPage(),
                'from'         => $contactos->firstItem(),
                'to'           => $contactos->lastItem(),
            ],
            'contactos' => $contactos
        ];
    }
  
    
   public function selectContacto(Request $request){
        //if (!$request->ajax()) return redirect('/');
        $contactos = Contacto::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['contactos' => $contactos];
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
      
        $contacto = new Contacto();
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->correo = $request->correo;
        $contacto->cargo = $request->cargo;
        $contacto->pais = $request->pais;
        $contacto->telefono = $request->telefono;
        $contacto->extension = $request->extension;
        $contacto->idioma = $request->idioma;
        $contacto->id_usuario = $request->id_usuario;
        $contacto->id_academia = $request->id_academia;
        $contacto->condicion = '1';
        $contacto->save();
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
        if (!$request->ajax()) return redirect('/');
        $contacto = Contacto::findOrFail($request->id);
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->correo = $request->correo;
        $contacto->cargo = $request->cargo;
        $contacto->pais = $request->pais;
        $contacto->telefono = $request->telefono;
        $contacto->extension = $request->extension;
        $contacto->idioma = $request->idioma;
        $contacto->id_usuario = $request->id_usuario;
        $contacto->id_academia = $request->id_academia;
        $contacto->condicion = '1';
        $contacto->save();
    }
  
   public function desactivar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $contacto = Contacto::findOrFail($request->id);
        $contacto->condicion = '0';
        $contacto->save();
    }  
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $contacto = Contacto::findOrFail($request->id);
        $contacto->condicion = '1';
        $contacto->save();
    }
}
