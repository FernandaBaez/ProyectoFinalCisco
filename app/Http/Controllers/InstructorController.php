<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Instructor;
//use App\Contacto;
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

        //Si el usuario es administrador se cargan todos los campos
        //if(Auth::user()->tipo==1){
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
       /* } else if (Auth::user()->tipo==2){ //si no es admin, y es contacto, se cargan solo los instructores que coincidan
          if ($buscar==''){
              $id_contacto = Auth::user()->id_contacto;
              echo 'el id es '.$id_contacto;

*/
            /*$contactos = Contacto::join('usuario', 'contacto.id_usuario','=','usuario.id')
              ->join('academia', 'contacto.id_academia','=','academia.id')
              ->select('contacto.id','contacto.nombre', 'contacto.apellido', 'contacto.correo','contacto.cargo', 'contacto.pais', 'contacto.telefono', 'contacto.extension', 'contacto.idioma', 'contacto.id_usuario', 'usuario.usuario as nombre_usuario', 'academia.nombre as nombre_academia',  'contacto.condicion')
              ->where('contacto.id == '.$id_contacto);
            */

             /* $instructores = Instructor::join('academia', 'instructor.id_academia','=','academia.id')
                  ->select('instructor.id','instructor.nombre', 'instructor.apellido', 'instructor.correo','instructor.id_academia', 'academia.nombre as nombre_academia', 'instructor.condicion')
                  ->orderBy('instructor.id', 'desc')->paginate(2)
                  //->where('instructor.'.$criterio, 'like', '%'. $buscar . '%')
                  ->where('instructor.id_academia == contacto.id_academia');
            }*/
        //}

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
        //if (!$request->ajax()) return redirect('/');

        $instructor = new Instructor();
        $instructor->nombre = $request->nombre;
        $instructor->apellido = $request->apellido;
        $instructor->correo = $request->correo;
        $instructor->id_academia = $request->id_academia;
        $instructor->condicion = '1';
        $instructor->requiere_orientacion = 0;
        $instructor->encurso = 0;
        $instructor->save();
    }

    public function listarPDF(){
      $instructores = Instructor::join('academia', 'instructor.id_academia','=','academia.id')
              ->select('instructor.id','instructor.nombre', 'instructor.apellido', 'instructor.correo','instructor.id_academia', 'academia.nombre as nombre_academia', 'instructor.condicion')
              ->orderBy('instructor.id', 'desc')->get();
      $cont =Instructor::count();
      $pdf = \PDF::loadView('pdf.instructorpdf',['instructores'=>$instructores, 'cont'=>$cont]);

      return $pdf->download('instructor.pdf');
    }

    public function selectInstructor(Request $request){
        if (!$request->ajax()) return redirect('/');
        $instructor = Instructor::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'desc')->get();
        return ['instructores' => $instructor];
    }

    public function selectInstructorCO(Request $request){


        $instructor = Instructor::join('academia', 'academia.id', '=', 'instructor.id_academia')
        ->select('instructor.id', 'instructor.nombre')
        ->where('instructor.requiere_orientacion', '=' , '0')
        ->where('instructor.condicion','=','1')
        ->orderBy('instructor.nombre', 'desc')->get();

        return ['instructor' => $instructor];
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

    public function updateenCurso(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $instructor = Instructor::findOrFail($request->id);
        $instructor->encurso = '1';
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
