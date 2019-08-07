<template>
<div>
    <div class="container">
      <div class="row">
          <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Grupos</h2>
                <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                    <li class="breadcrumb-item active">Grupos</li>
                </ul>
                </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="widget has-shadow">
              <div class="widget-header bordered no-actions d-flex align-items-center">

                <div class="form-group row">
                      <div class="col-md-11">
                          <div class="input-group">

                            <select class="selectpicker show-menu-arrow" v-model="criterio">
                                <option value="nombre" selected>Academia</option>
                                <option value="nombre" selected>Curso</option>
                            </select>

                            &nbsp;

                            <form id="searchForm" action="#" role="search">
                              <input type="search" placeholder="Search something ..."  v-model="buscar" class="form-control" @keyup.enter="listarGrupo(1,buscar,criterio)">
                            </form>
                              <button type="submit"  @click="listarGrupo(1,buscar,criterio)" class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i>Buscar</button>
                          </div>
                      </div>

                      <div class="col-md-1">
                        <button type="button" @click="abrirModal('grupos', 'registrar', 0)" class="btn btn-gradient-03 mr-1 mb-2" ><i class="la la-pencil"></i>Agregar grupo</button>
                      </div>
                  </div>
              </div>

              <div class="widget-body">
                  <div class="table-responsive">
                      <table id="sorting-table" class="table mb-0">
                          <thead>
                              <tr>
                                  <th>Instructores</th>
                                  <th>Academia</th>
                                  <th>Curso</th>
                                  <th>Descripción</th>
                                  <th><span style="width:100px;">Estado</span></th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="grupos in arrayGrupo" :key="grupos.id">
                                <td class="td-actions">

                                  <a type="button" @click="abrirModal_Inscripcion('inscripcion', 'listar', grupos, grupos.id)"><i class="ion ion-person-stalker delete"></i></a>
                                  <a type="button" @click="abrirModal_Inscripcion('inscripcion', 'agregar', grupos, grupos.id)"><i class="ion ion-person-add edit"></i></a>
                                  <a type="button" @click="abrirModal_Inscripcion('inscripcion', 'calificar', grupos, grupos.id)"><i class="ion ion-clipboard delete"></i></a>
                                </td>
                                <td v-text="grupos.nombre_academia"></td>
                                <td v-text="grupos.nombre_curso"></td>
                                <td v-text="grupos.descripcion"></td>
                                <td>
                                  <div v-if="grupos.condicion">
                                    <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                  </div>
                                  <div v-else>
                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                  </div>
                                </td>

                                <td class="td-actions">
                                  <a type="button" @click="abrirModal('grupos', 'actualizar', grupos, 0)"><i class="la la-edit edit"></i></a>

                                </td>


                              </tr>


                          </tbody>
                      </table>

                  </div>
                  <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1" >
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                        </li>
                    </ul>
                </nav>
              </div>
          </div>
        <!-- End Sorting -->
        </div>
      </div>
    </div>


    <!-- Begin Large Modal -->
    <div class="modal fade" :class="{'mostrar' : modal}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Grupos</h4>
                    <button type="button" class="close" @click="cerrarModal()">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                  <!-- Form -->
                  <div class="widget has-shadow">
                      <div class="widget-header bordered no-actions d-flex align-items-center">
                          <h4 v-text="tituloModal"></h4>
                      </div>
                      <div class="widget-body">
                          <form class="needs-validation" novalidate>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Academia</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select class="custom-select form-control" v-model="id_academia" required>
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="academia in arrayAcademia" :key="academia.id" :value="academia.id" v-text="academia.nombre"></option>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Curso</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select class="custom-select form-control" v-model="id_curso" required>
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="curso in arrayCurso" :key="curso.id" v-bind:value="curso.id" v-text="curso.nombre"></option>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Ingrese la descripcion" v-model="descripcion">
                                </div>
                            </div>

                              <div v-show="errorGrupo" class="form-group row div-error">
                                <div class="text-center text-error">
                                  <div class="alert alert-outline-danger dotted" role="alert" v-for="error in errorMostrarMsjGrupo" :key="error" v-text="error">

                                  </div>

                                </div>
                              </div>

                              <div class="text-right">
                                  <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                                  <button class="btn btn-gradient-01" v-if="tipoAccion==1" @click="registrarGrupo()" type="submit">Guardar</button>
                                  <button class="btn btn-gradient-01" v-if="tipoAccion==2" @click="actualizarGrupo()" type="submit">Actualizar</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- End Form -->


                </div>

            </div>
        </div>
    </div>
    <!-- End Large Modal -->


    <div class="modal fade" :class="{'mostrar' : modal_listar}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Intructores</h4>
                    <button type="button" class="close" @click="cerrarModal_Inscripcion()">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                  <!-- Form -->
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="widget has-shadow">
                          <div class="widget-header bordered no-actions d-flex align-items-center">
                          </div>
                          <div class="widget-body">
                              <div class="table-responsive">
                                  <table id="sorting-table" class="table mb-0">
                                      <thead>
                                          <tr>
                                              <th>Nombre</th>
                                              <th>Apellido</th>
                                              <th>Estado</th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr v-for="inscripcion in arrayInscripcion" :key="inscripcion.id">
                                            <td v-text="inscripcion.nombre_instructor"></td>
                                            <td v-text="inscripcion.apellido_instructor"></td>
                                            <td v-text="inscripcion.estado"></td>


                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                              <nav>
                                <ul class="pagination">
                                    <li class="page-item" v-if="pagination.current_page > 1" >
                                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                    </li>
                                    <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                        <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                    </li>
                                    <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                    </li>
                                </ul>
                            </nav>
                          </div>
                      </div>
                    <!-- End Sorting -->
                    </div>
                  </div>
                  <!-- End Form -->
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" :class="{'mostrar' : modal_agregar}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Instructores</h4>
                    <button type="button" class="close" @click="cerrarModal_AgregarIns()">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                  <!-- Form -->
                  <div class="widget has-shadow">
                      <div class="widget-header bordered no-actions d-flex align-items-center">
                          <h4 v-text="tituloModal"></h4>
                      </div>
                      <div class="widget-body">
                          <form class="needs-validation" novalidate>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Instructor</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select class="custom-select form-control" v-model="id_instructor" required>
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="instructor in arrayInstructor" :key="instructor.id" :value="instructor.id" v-text="instructor.nombre"></option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                              <div v-show="errorInscripcion" class="form-group row div-error">
                                <div class="text-center text-error">
                                  <div class="alert alert-outline-danger dotted" role="alert" v-for="error in errorMostrarMsjInscripcion" :key="error" v-text="error">

                                  </div>

                                </div>
                              </div>

                              <div class="text-right">
                                  <button type="button" class="btn btn-shadow" @click="cerrarModal_AgregarIns()">Cerrar</button>
                                  <button class="btn btn-gradient-01" v-if="tipoAccion==1" @click="registrarInstructor()" type="submit">Guardar</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- End Form -->
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" :class="{'mostrar' : modal_calificar}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Evaluación</h4>
                    <button type="button" class="close" @click="cerrarModal_Calificar()">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                  <!-- Form -->

                  <!-- End Form -->


                </div>

            </div>
        </div>
    </div>


</div>
</template>

<script>
    export default {
      data(){
        return{
          grupoId : 0,
          id_academia : 0,
          id_curso : 0,
          id_instructor : 0,
          id_grupo : 0,
          descripcion : '',
          condicion : 0,
          arrayGrupo : [],
          modal : 0,
          modal_listar : 0,
          modal_agregar : 0,
          modal_calificar : 0,
          tituloModal : '',
          tipoAccion : 0,
          errorGrupo : 0,
          errorMostrarMsjGrupo : [],
          buscar : '',
          buscar_instructor : '',
          pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
           offset : 3,
          criterio : 'grupos',
          criterio_inscritos : 'inscripcion',
          arrayAcademia : [],
          arrayInstructor : [],
          arrayCurso : [],
          errorMostrarMsjInscripcion : [],
          arrayInscripcion : [],
          errorInscripcion : 0,
          errorInstructor : 0,
          errorMostrarMsjInstructor : []
        }
      },
      computed:{
      isActived: function(){
          return this.pagination.current_page;
      },
      pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
      methods : {
        listarGrupo(page,buscar,criterio){
          let me = this;
          var url= '/grupos?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              var respuesta= response.data;
              me.arrayGrupo = respuesta.grupos.data;
              me.pagination= respuesta.pagination;
          })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });


        },
        listarInscritos(page,buscar,criterio_inscritos, id_grupo){
          let me = this;
          var url= '/inscripcion?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio_inscritos + '&id_grupo=' + id_grupo;
          //Obtenemos todo lo que nos devuelve los registros de la tabla inscripcion
          axios.get(url)
            .then(function (response) {
              var respuesta= response.data;
              me.arrayInscripcion = respuesta.inscripciones.data;
              me.pagination= respuesta.pagination;
          })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });


        },
        selectAcademia(){
          let me = this;
          var url= '/academia/selectAcademia';
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              //console.log(response);
              var respuesta= response.data;
              me.arrayAcademia = respuesta.academias;
          })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });
        },
        selectInstructor(){
          let me = this;
          var url= '/instructor/selectInstructorCO';
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              //console.log(response);
              var respuesta= response.data;
              me.arrayInstructor = respuesta.instructor;
              console.log(me.arrayInstructor);
          })
            .catch(function (error) {
              // handle error

              console.log(error.response);
            });
        },
        selectCurso(){
          let me = this;
          var url= '/cursos/selectCurso';
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              //console.log(response);
              var respuesta= response.data;
              me.arrayCurso = respuesta.cursos;
          })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });
        },
        cambiarPagina(page,buscar,criterio){
              let me = this;
              //Actualiza la página actual
              me.pagination.current_page = page;
              //Envia la petición para visualizar la data de esa página
              me.listarGrupo(page,buscar,criterio);
          },
        registrarInscripcion(){
            if(this.validarInscripcion()){
              return;
            }
            let me = this;
            axios.post('/inscripcion/registrar',{
              'id_grupo' : this.id_grupo,
              'id_instructor' : this.id_instructor

              }).then(function (response) {
                me.cerrarModal();
                me.listarGrupo(1,'','grupos');
              })
              .catch(function (error) {
                console.log(error.response);
              });
        },
        registrarGrupo(){
          if(this.validarGrupo()){
            return;
          }

          let me = this;
          axios.post('/grupos/registrar',{
            'id_academia' : this.id_academia,
            'id_curso' : this.id_curso,
            'descripcion' : this.descripcion

            }).then(function (response) {
              me.cerrarModal();
              me.listarGrupo(1,'','grupos');
            })
            .catch(function (error) {
              console.log(error.response);
            });
        },
        registrarInstructor(){
          //if(this.validarInstructor()){
            //return;
          //}
          let me = this;
          axios.post('/inscripcion/registrar',{
            'id_instructor' : this.id_instructor,
            'id_grupo' : this.id_grupo

            }).then(function (response) {
              me.cerrarModal();
              me.listarInscritos(1,'','inscripcion');
            })
            .catch(function (error) {
              console.log(error.response);
            });
            axios.put('/instructor/updateenCurso',{
              'id' : this.id_instructor
            }).then(function (response) {
              me.cerrarModal();
              me.listarInscritos(1,'','inscripcion');
            })
            .catch(function (error) {
              console.log(error.response);
            });

            this.modal_agregar = 0;

        },
        actualizarGrupo(){
          if(this.validarGrupo()){
            return;
          }

          let me = this;
          axios.put('/grupos/actualizar', {
            'descripcion' : this.descripcion,
            'id_curso' : this.id_curso,
            'id_academia' : this.id_academia

            }).then(function (response) {
              me.cerrarModal();
              me.listarGrupo(1,'','grupos');
            })
            .catch(function (error) {
              console.log(error.response);
            });
        },
        desactivarGrupo(id){
          this.mensaje = confirm("¿Está seguro que desea desactivar el grupo?");

          if (this.mensaje) {
            let me = this;

              axios.put('/grupos/desactivar',{
                  'id': id
              }).then(function (response) {
                  me.listarGrupo(1,'', 'grupos');
                  alert('El registro ha sido desactivado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        activarGrupo(id){
          this.mensaje = confirm("¿Está seguro que desea activar la el grupo?");

          if (this.mensaje) {
            let me = this;

              axios.put('/grupos/activar',{
                  'id': id
              }).then(function (response) {
                  me.listarGrupo(1,'', 'grupos');
                  alert('El registro ha sido activado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        desactivarInstructor(id){
          this.mensaje = confirm("¿Está seguro que desea sacar al instructor del grupo?");

          if (this.mensaje) {
            let me = this;

              axios.put('/inscripcion/desactivar',{
                  'id': id
              }).then(function (response) {
                  me.listarInscritos(1,'', 'inscripciones');
                  alert('El registro ha sido desactivado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        activarInstructor(id){
          this.mensaje = confirm("¿Está seguro que desea activar la el grupo?");
          console.log(id);
          if (this.mensaje) {
            let me = this;

              axios.put('/inscripcion/activar',{
                  'id': id
              }).then(function (response) {
                  //me.listarInscritos(1,'', 'inscripcion');
                  //this.modal_listar = 0;
                  alert('El registro ha sido activado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },

        validarGrupo(){
          this.errorGrupo = 0;
          this.errorMostrarMsjGrupo = [];

          if(this.id_academia == 0) this.errorMostrarMsjGrupo.push("Seleccione una academia");
          if(this.id_curso == 0) this.errorMostrarMsjGrupo.push("Seleccione un curso");
          if(this.errorMostrarMsjGrupo.length) this.errorGrupo = 1;

          return this.errorGrupo;
        },

        validarInscripcion(){
          this.errorInscripcion = 0;
          this.errorMostrarMsjInscripcion = [];
          if(this.id_instructor == 0) this.errorMostrarMsjInscripcion.push("Seleccione un instructor");
          if(this.errorMostrarMsjInscripcion.length) this.errorInscripcion = 1;

          return this.errorInscripcion;
        },

        validarInstructor(){
          this.errorInstructor = 0;
          this.errorMostrarMsjInstructor = [];
          if(this.id_instructor == 0) this.errorMostrarMsjInstructor.push("Seleccione un instructor");
          if(this.errorMostrarMsjInstructor.length) this.errorInstructor = 1;

          return this.errorInstructor;
        },
        abrirModal(modelo, accion, data = [], id_grupo){
          switch (modelo) {
            case "grupos":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = "Registrar Grupo";
                    this.descripcion = '';
                    this.id_academia = 0;
                    this.id_curso = 0;
                    this.tipoAccion = 1;
                    console.log("Entra grupos");

                    break;
                  }
                  case 'actualizar':{
                    this.modal = 1;
                    this.tituloModal = "Actualizar Grupo";
                    this.tipoAccion=2;
                    this.grupoId = data['id'];
                    this.id_academia = data['id_academia'];
                    this.id_curso = data['id_curso'];
                    this.descripcion = data['descripcion'];
                    this.condicion = data['condicion'];
                    console.log(this.id_curso);
                    break;
                  }
                }
                break;
              }

          }

          this.selectAcademia();
          this.selectCurso();
        },

        abrirModal_Inscripcion(modelo, accion, data = [], id_grupo){
          switch (modelo) {
              case "inscripcion":{
                switch (accion) {
                  case 'listar':{
                    this.modal_listar = 1;
                    this.modal = 0;
                    this.modal_agregar = 0;
                    this.modal_calificar = 0;
                    this.tituloModal = "Instructores";
                    this.id_grupo = id_grupo;
                    this.listarInscritos(1,this.buscar_instructor, this.criterio, id_grupo);

                    break;
                  }
                  case 'agregar':{
                    //this.modal_listar = 1;
                    this.modal = 0;
                    this.tipoAccion = 1;
                    this.modal_agregar = 1;
                    this.modal_calificar = 0;
                    this.tituloModal = "Agregar Instructor";
                    this.id_grupo = id_grupo;
                    console.log(this.id_grupo);
                    break;
                  }
                  case 'calificar':{
                    this.modal_listar = 0;
                    this.modal = 0;
                    this.modal_agregar = 0;
                    this.modal_calificar = 1;
                    this.tituloModal = "Calificar Instructor";

                    break;
                  }
                }
                break;
              }
          }
          this.selectInstructor();
        },

        cerrarModal(){
          this.modal = 0;
          this.tituloModal = '';
          this.descripcion = '';
          this.id_academia = 0;
          this.id_curso = 0;
          this.errorGrupo = 0;
          this.errorInscripcion = 0;

        },
        cerrarModal_Inscripcion(){
          this.modal_listar = 0;
          this.tituloModal = '';
          this.descripcion = '';
          this.id_academia = 0;
          this.id_curso = 0;
          this.errorGrupo = 0;
          this.errorInscripcion = 0;

        },
        cerrarModal_AgregarIns(){
          this.modal_agregar = 0;
          this.tituloModal = '';
          this.descripcion = '';
          this.id_academia = 0;
          this.id_curso = 0;
          this.errorGrupo = 0;
          this.errorInscripcion = 0;

        },
        cerrarModal_Calificar(){
          this.modal_calificar = 0;
          this.tituloModal = '';
          this.descripcion = '';
          this.id_academia = 0;
          this.id_curso = 0;
          this.errorGrupo = 0;
          this.errorInscripcion = 0;

        }
      },
      mounted() {
            this.listarGrupo(1,this.buscar, this.criterio);
        }
    }
</script>
<style>
  .modal-content{
    width: 100% !important;
    position: absolute !important;
  }
  .mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #3c29297a !important;
    overflow-y: scroll;
  }
  .div-error{
    display: flex;
    justify-content: center;
  }
  .text-error{
    color: red !important;
    font-weight: bold;
  }
</style>
