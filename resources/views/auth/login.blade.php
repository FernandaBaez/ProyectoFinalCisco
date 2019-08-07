@extends('auth.contenido')

@section('login')
  <!-- End Preloader -->
  <!-- Begin Container -->
  <div class="container-fluid no-padding h-100">
      <div class="row flex-row h-100 bg-white">
          <!-- Begin Left Content -->
          <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
              <div class="elisyam-bg background-03"  style="background-image: url('assets/img/login_cisco.png')">
                  <div class="elisyam-overlay"></div>
                  <div class="authentication-col-content-2 mx-auto text-center">
                      <div class="logo-centered">
                          <a href="db-default.html">
                              <img src="assets/img/logo-grandote.png" alt="logo">
                          </a>
                      </div>
                      <h1>Centro de Soporte</h1>
                      <span class="description">
                      </span>

                  </div>
              </div>
          </div>
          <!-- End Left Content -->
          <!-- Begin Right Content -->
          <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
              <!-- Begin Form -->
              <div class="authentication-form-2 mx-auto">
                  <div class="tab-content" id="animate-tab-content">
                      <!-- Begin Sign In -->
                      <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                          <h3>Iniciar sesión</h3>
                          <form method="POST" class="form-horizontal was-validated" action="{{ route('loginTwo') }}">
                            {{ csrf_field() }}
                              <div class="group material-input{{$errors->has('usuario' ? 'is-invalid' : '') }}">
                                {{--!!$errors->first('usuario', '<span class="invalid-feedback">:message</span>')!!--}}
                                <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Usuario</label>
                                <span></span>

                              </div>
                              <div class="group material-input{{$errors->has('password' ? 'is-invalid' : '')}}">
                                <input type="password" name="password" id="password" class="form-control" required>
                                {{--!!$errors->first('password', '<span class="invalid-feedback">:message</span>')!!--}}
                                <span></span>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Contraseña</label>
                              </div>
                              @if ($errors->has('usuario'))
                                <span class="alert alert-warning">Estas credenciales no coinciden con nuestros registro</span>
                              @endif
                              @if ($errors->has('password'))
                                <span class="alert alert-warning">Estas credenciales no coinciden con nuestros registro</span>
                              @endif
                              <span>Usuario: admin    Contraseña: admin</span>
                              <div class="sign-btn text-center">
                                  <button type="submit" name="button" class="btn btn-lg btn-gradient-01">Iniciar sesión</button>
                              </div>
                          </form>
                        </div>
                      <!-- End Sign In -->
                      <!-- Begin Sign Up -->

                      <!-- End Sign Up -->
                  </div>
              </div>
              <!-- End Form -->
          </div>
          <!-- End Right Content -->
      </div>
      <!-- End Row -->
  </div>

@endsection
