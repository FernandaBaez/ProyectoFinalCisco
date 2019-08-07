<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class dash extends Controller
{
  public function __invoke(Request $request)
  {
    $academias =DB::table('academia as a')
    ->select(COUNT(a.id))
    ->get();
    $instructores =DB::table('instructores as i')
    ->select(COUNT(i.id))
    ->get();
    $grupos =DB::table('grupos as g')
    ->select(COUNT(g.id))
    ->get();
    $cursos =DB::table('cursos as c')
    ->select(COUNT(a.id))
    ->get();

    return ['academia'=>$academia,'instructores'=>$instructores,'grupos'=>$grupos, 'cursos'=>$cursos];
  }
}
