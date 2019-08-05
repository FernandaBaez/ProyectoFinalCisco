<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
class UsuarioController extends Controller
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
            $usuarios = Usuario::orderBy('id', 'desc')->paginate(2);
        }
        else{
            $usuarios = Usuario::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(2);
        }


        return [
            'pagination' => [
                'total'        => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page'     => $usuarios->perPage(),
                'last_page'    => $usuarios->lastPage(),
                'from'         => $usuarios->firstItem(),
                'to'           => $usuarios->lastItem(),
            ],
            'usuarios' => $usuarios
        ];

    }

   public function selectUsuario(Request $request){
        //if (!$request->ajax()) return redirect('/');
        $usuarios = Usuario::where('condicion','=','1')
        ->select('id','usuario')->orderBy('usuario', 'asc')->get();
        return ['usuarios' => $usuarios];
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
        $usuario = new Usuario();
        $usuario->usuario = $request->usuario;
        $usuario->password = bcrypt( $request->password);
        $usuario->tipo = '2';
        $usuario->condicion = '1';
        $usuario->save();
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
        $usuario = Usuario::findOrFail($request->id);
        $usuario->usuario = $request->usuario;
        $usuario->password = bcrypt( $request->password);
        $usuario->tipo = '2';
        $usuario->condicion = '1';
        $usuario->save();
    }

   public function desactivar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $usuario = Usuario::findOrFail($request->id);
        $usuario->condicion = '0';
        $usuario->save();
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $usuario = Usuario::findOrFail($request->id);
        $usuario->condicion = '1';
        $usuario->save();
    }
}
