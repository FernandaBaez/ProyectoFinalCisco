<template>
<div>
    <div class="container">
      <div class="row">
          <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Inscripciones</h2>
                <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                    <li class="breadcrumb-item active">Inscripciones</li>
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
                                <option value="nombre" selected>Nombre</option>
                                <option value="nombre" selected>Curso</option>
                            </select>

                            &nbsp;

                            <form id="searchForm" action="#" role="search">
                              <input type="search" placeholder="Search something ..."  v-model="buscar" class="form-control" @keyup.enter="listarInscripcion(1,buscar,criterio)">
                            </form>
                              <button type="submit"  @click="listarInscripcion(1,buscar,criterio)" class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i>Buscar</button>
                          </div>
                      </div>

                      <div class="col-md-1">
                        <button type="button" @click="abrirModal('inscripcion', 'registrar')" class="btn btn-gradient-03 mr-1 mb-2" ><i class="la la-pencil"></i>Inscribir Instructor</button>
                      </div>
                  </div>
              </div>

              <div class="widget-body">
                  <div class="table-responsive">
                      <table id="sorting-table" class="table mb-0">
                          <thead>
                            <th>Nombre</th>
                            <th>Requiere orientación</th>
                            <th>Fecha OC</th>
                            <th>Horario</th>
                            <th>Entrenamiento</th>
                            <th>Fecha entrenamiento</th>
                            <th>Estado</th>
                            <th><span style="width:100px;">Condicion</span></th>
                            <th>Acciones</th>
                          </thead>
                          <tbody>
                              <tr v-for="inscripcion in arrayInscripcion" :key="inscripcion.id">
                                <td v-text="inscripcion.nombre_instructor"></td>
                                <td v-text="inscripcion.requiere_orientacion"></td>
                                <td v-text="inscripcion.fecha_s"></td>
                                <td v-text="inscripcion.horario"></td>
                                <td v-text="inscripcion.nombre_curso"></td>
                                <td v-text="inscripcion.fecha_p"></td>
                                <td v-text="inscripcion.estado"></td>
                                <td>
                                  <div v-if="inscripcion.condicion">
                                    <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                  </div>
                                  <div v-else>
                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                  </div>
                                </td>

                                <td class="td-actions">
                                  <a type="button" @click="abrirModal('inscripcion', 'actualizar', inscripcion)"><i class="la la-edit edit"></i></a>

                                  <template v-if="inscripcion.condicion">
                                      <a type="button" @click="desactivarGrupo(inscripcion.id)"><i class="la la-close delete"></i></a>
                                  </template>
                                  <template v-else>
                                      <a type="button" @click="activarGrupo(inscripcion.id)"><i class="la la-check delete"></i></a>
                                   </template>

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
                    <h4 class="modal-title">Inscripciones</h4>
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
                            <!-- Select para instructor -->
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
                            <!-- Select para Curso -->
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

                            <div class="form-group row mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">¿Requiere orientación?</label>
                                <div class="col-lg-1">
                                    <div class="custom-control custom-radio styled-radio mb-3">
                                        <input class="custom-control-input" type="radio" name="options" id="opt-01" required>
                                        <label class="custom-control-descfeedback" for="opt-01">Sí</label>
                                        <div class="invalid-feedback">
                                            Toggle this custom radio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="custom-control custom-radio styled-radio mb-3">
                                        <input class="custom-control-input" type="radio" name="options" id="opt-02" required>
                                        <label class="custom-control-descfeedback" for="opt-02">No</label>
                                        <div class="invalid-feedback">
                                            Or toggle this other custom radio
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha sugerida</label>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="la la-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" v-model="fecha_s" placeholder="Select value">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                             <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Horario</label>
                                 <div class="col-lg-5">
                                     <select  class="custom-select form-control" v-model="horario" required>
                                         <option value="0" disabled>Seleccione</option>
                                         <option value="11:00 - 13:00">11:00 - 13:00</option>
                                         <option value="16:00 - 18:00">16:00 - 18:00</option>
                                    </select>
                                     <div class="invalid-feedback">
                                         Porfavor ingresa una opcion valida
                                     </div>

                                 </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha preferida</label>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="la la-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" v-model="fecha_p" placeholder="Select value">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                             <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Estado</label>
                                 <div class="col-lg-5">
                                     <select  class="custom-select form-control" v-model="horario" required>
                                         <option value="0" disabled>Seleccione</option>
                                         <option value="1">En espera</option>
                                         <option value="2">Aprobado</option>
                                         <option value="3">Reprobado</option>
                                    </select>
                                     <div class="invalid-feedback">
                                         Porfavor ingresa una opcion valida
                                     </div>
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

</div>
</template>

<script>
    export default {
      data(){
        return{
          inscripcionId : 0,
          id_instructor : 0,
          id_curso : 0,
          requiere_orientacion : '',
          fecha_s : '',
          fecha_p : '',
          horario : '',
          condicion : 0,
          arrayInscripcion : [],
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          errorGrupo : 0,
          errorMostrarMsjGrupo : [],
          buscar : '',
          pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
           offset : 3,
          criterio : 'inscripcion',
          arrayInstructor : [],
          arrayCurso : []

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
        listarInscripcion(page,buscar,criterio){
          let me = this;
          var url= '/inscripcion?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              var respuesta= response.data;
              me.arrayInscripcion = respuesta.inscripcion.data;
              me.pagination= respuesta.pagination;
          })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });


        },
        selectAcademia(){
          let me = this;
          var url= '/instructor/selectAcademia';
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              //console.log(response);
              var respuesta= response.data;
              me.arrayInstructor = respuesta.instructors;
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
              me.listarInscripcion(page,buscar,criterio);
          },

        registrarGrupo(){
          if(this.validarGrupo()){
            return;
          }

          let me = this;
          axios.post('/inscripcion/registrar',{
            'id_instructor' : this.id_instructor,
            'id_curso' : this.id_curso,
            'nombre': this.nombre,
            'descripcion' : this.descripcion

            }).then(function (response) {
              me.cerrarModal();
              me.listarInscripcion(1,'','inscripcion');
            })
            .catch(function (error) {
              console.log(error.response);
            });
        },

        actualizarGrupo(){
          if(this.validarGrupo()){
            return;
          }

          let me = this;
          axios.put('/inscripcion/actualizar', {
            'nombre': this.nombre,
            'descripcion' : this.descripcion,
            'id' : this.grupoId,
            'id_instructor' : this.id_instructor
            }).then(function (response) {
              me.cerrarModal();
              me.listarInscripcion(1,'','inscripcion');
            })
            .catch(function (error) {
              console.log(error.response);
            });
        },

        desactivarGrupo(id){
          this.mensaje = confirm("¿Está seguro que desea desactivar el grupo?");

          if (this.mensaje) {
            let me = this;

              axios.put('/inscripcion/desactivar',{
                  'id': id
              }).then(function (response) {
                  me.listarInscripcion(1,'', 'inscripcion');
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

              axios.put('/inscripcion/activar',{
                  'id': id
              }).then(function (response) {
                  me.listarInscripcion(1,'', 'inscripcion');
                  alert('El registro ha sido activado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },

        validarGrupo(){
          this.errorGrupo = 0;
          this.errorMostrarMsjGrupo = [];

          if(this.id_instructor == 0) this.errorMostrarMsjGrupo.push("Seleccione una instructor");
          if(this.id_curso == 0) this.errorMostrarMsjGrupo.push("Seleccione un curso");
          if(!this.nombre) this.errorMostrarMsjGrupo.push("El nombre del grupo no puede estar vacío");
          if(this.errorMostrarMsjGrupo.length) this.errorGrupo = 1;

          return this.errorGrupo;
        },


        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "inscripcion":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = "Registrar Grupo";
                    this.nombre = '';
                    this.descripcion = '';
                    this.id_instructor = 0;
                    this.id_curso = 0;
                    this.tipoAccion = 1;
                    break;
                  }
                  case 'actualizar':{
                    this.modal = 1;
                    this.tituloModal = "Actualizar Grupo";
                    this.tipoAccion=2;
                    this.grupoId = data['id'];
                    this.nombre = data['nombre'];
                    this.id_instructor = data['id_instructor'];
                    this.id_curso = data['id_curso'];
                    this.descripcion = data['descripcion'];
                    this.condicion = data['condicion'];
                    console.log(this.id_curso);
                    break;
                  }
                }
              }
          }
          this.selectAcademia();
          this.selectCurso();
        },
        cerrarModal(){
          this.modal = 0;
          this.tituloModal = '';
          this.nombre = '';
          this.descripcion = '';
          this.id_instructor = 0;
          this.id_curso = 0;
          this.errorGrupo = 0
        }
      },
      mounted() {
            this.listarInscripcion(1,this.buscar, this.criterio);
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
