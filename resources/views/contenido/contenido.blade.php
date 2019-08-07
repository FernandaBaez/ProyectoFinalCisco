@extends('principal')
@section('contenido')

  @if(Auth::check())
    @if(Auth::user()->tipo==1)
        <template v-if="menu==0">
          <dash></dash>
        </template>
        <template v-if="menu==2">
          <academias></academias>
        </template>
        <template v-if="menu==3">
          <resultados></resultados>
        </template>
        <template v-if="menu==4">
          <contacto></contacto>
        </template>
        <template v-if="menu==5">
          <usuarios></usuarios>
        </template>
        <template v-if="menu==6">
          <cursos></cursos>
        </template>
        <template v-if="menu==7">
          <instructor></instructor>
        </template>
        <template v-if="menu==8">
          <grupos></grupos>
        </template>
        <template v-if="menu==9">
          <chat></chat>
        </template>
        <template v-if="menu==10">
          <calendario></calendario>
        </template>
        <template v-if="menu==11">
          <inscripcion></inscripcion>
        </template>
    @elseif (Auth::user()->tipo==2)
      <template v-if="menu==7">
        <instructor></instructor>
      </template>
      <template v-if="menu==11">
        <inscribir></inscribir>
      </template>
      <template v-if="menu==9">
        <tickets></tickets>
      </template>
    @else
    @endif
  @endif




@endsection
