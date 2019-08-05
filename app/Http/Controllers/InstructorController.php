<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Instructor;
class InstructorController extends Controller
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
  
        /*     
        if ($buscar==''){
            $instructores = Instructor::orderBy('id', 'desc')->paginate(2);
        }
        else{
            $instructores = Instructor::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(2);
        }*/
      
        if ($buscar==''){
          $instructores = Instructor::join('academia', 'instructor.id_academia','=','academia.id')
              ->select('instructor.id','instructor.nombre', 'instructor.apellido', 'instructor.correo','instructor.id_academia', 'academia.nombre as nombre_academia', 'instructor.condicion')
              ->orderBy('instructor.id', 'desc')->paginate(2);
        }
        else{
          $instructores = Instructor::join('academia', 'instructor.id_academia','=','academia.id')
              ->select('instructor.id','instructor.nombre', 'instructor.apellido', 'instructor.correo','instructor.id_academia', 'academia.nombre as nombre_academia', 'instructor.condicion')
            ->where('instructor.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('instructor.id', 'desc')->paginate(2);
        }
         
 
        return [
            'pagination' => [
                'total'        => $instructores->total(),
                'current_page' => $instructores->currentPage(),
                'per_page'     => $instructores->perPage(),
                'last_page'    => $instructores->lastPage(),
                'from'         => $instructores->firstItem(),
                'to'           => $instructores->lastItem(),
            ],
            'instructores' => $instructores
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
        if (!$request->ajax()) return redirect('/');
      
        $instructor = new Instructor();
        $instructor->nombre = $request->nombre;
        $instructor->apellido = $request->apellido;
        $instructor->correo = $request->correo;
        $instructor->id_academia = $request->id_academia;
        $instructor->condicion = '1';
        $instructor->save();
    }
  
    public function selectInstructor(Request $request){
        if (!$request->ajax()) return redirect('/');
        $instructor = Instructor::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['instructores' => $instructor];
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
        $instructor = Instructor::findOrFail($request->id);
        $instructor->nombre = $request->nombre;
        $instructor->apellido = $request->apellido;
        $instructor->correo = $request->correo;
        $instructor->id_academia = $request->id_academia;
        $instructor->condicion = '1';
        $instructor->save();
    }
    
   public function desactivar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $instructor = Instructor::findOrFail($request->id);
        $instructor->condicion = '0';
        $instructor->save();
    }  
    public function activar(Request $request)
    {
        if(!$request->ajax()){
          return redirect('/');
        }
        $instructor = Instructor::findOrFail($request->id);
        $instructor->condicion = '1';
        $instructor->save();
    }
}

