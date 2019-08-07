<template>
<div>
  <div class="container">
        <div class="row">
          <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Cursos</h2>
                <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                    <li class="breadcrumb-item active">Cursos</li>
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
                                <option value="direccion" selected>Descripción</option>
                            </select>
                            &nbsp;

                            <form id="searchForm" action="#" role="search">
                              <input type="search" placeholder="Search something ..."  v-model="buscar" class="form-control" @keyup.enter="listarCurso(1,buscar,criterio)">
                            </form>
                              <button type="submit"  @click="listarCurso(1,buscar,criterio)" class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i>Buscar</button>
                          </div>
                      </div>

                      <div class="col-md-1">
                        <button type="button" @click="abrirModal('cursos', 'registrar')" class="btn btn-gradient-03 mr-1 mb-2" ><i class="la la-pencil"></i>Agregar curso</button>
                      </div>
                  </div>
              </div>

              <div class="widget-body">
                  <div class="table-responsive">
                      <table id="sorting-table" class="table mb-0">
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Fecha de creación</th>
                                  <th><span style="width:100px;">Estado</span></th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="cursos in arrayCurso" :key="cursos.id">
                                <td v-text="cursos.nombre"></td>
                                <td v-text="cursos.descripcion"></td>
                                <td v-text="cursos.fecha"></td>
                                <td>
                                  <div v-if="cursos.condicion">
                                    <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                  </div>
                                  <div v-else>
                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                  </div>
                                </td>

                                <td class="td-actions">
                                  <a type="button" @click="abrirModal('cursos', 'actualizar', cursos)"><i class="la la-edit edit"></i></a>

                                  <template v-if="cursos.condicion">
                                      <a type="button" @click="desactivarCurso(cursos.id)"><i class="la la-close delete"></i></a>
                                  </template>
                                  <template v-else>
                                      <a type="button" @click="activarCurso(cursos.id)"><i class="la la-check delete"></i></a>
                                   </template>

                                </td>


                              </tr>


                          </tbody>
                      </table>

                  </div>
                  <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
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


    <!-- Begin Large Modal -->
    <div class="modal fade" :class="{'mostrar' : modal}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cursos</h4>
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
                                  <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre</label>
                                  <div class="col-lg-5">
                                      <input type="text" class="form-control" placeholder="Ingrese el nombre del curso" v-model="nombre">
                                  </div>
                              </div>
                              <div class="form-group row d-flex align-items-center mb-5">
                                  <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripción</label>
                                  <div class="col-lg-5">
                                      <input type="text" class="form-control" placeholder="Ingrese la descripcion" v-model="descripcion">
                                  </div>
                              </div>

                              <div class="form-group row d-flex align-items-center mb-5">
                                  <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha</label>
                                  <div class="col-lg-5">
                                      <div class="form-group">
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                  <i class="la la-calendar"></i>
                                              </span>
                                              <input type="date" class="form-control" v-model="fecha" placeholder="Select value">
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              <div v-show="errorCurso" class="form-group row div-error">
                                <div class="text-center text-error">
                                  <div class="alert alert-outline-danger dotted" role="alert" v-for="error in errorMostrarMsjCurso" :key="error" v-text="error">

                                  </div>

                                </div>
                              </div>

                              <div class="text-right">
                                  <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                                  <button class="btn btn-gradient-01" v-if="tipoAccion==1" @click="registrarCurso()" type="submit">Guardar</button>
                                  <button class="btn btn-gradient-01" v-if="tipoAccion==2" @click="actualizarCurso()" type="submit">Actualizar</button>
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
</div>
</template>

<script>
    export default {
      data(){
        return{
          cursoId : 0,
          nombre : '',
          descripcion : '',
          fecha : '',
          arrayCurso : [],
          modal : 0,
          tituloModal : '',
          tipoAccion : 0,
          errorCurso : 0,
          errorMostrarMsjCurso : [],
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
          criterio : 'curso'

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
        listarCurso(page,buscar,criterio){
          let me = this;
          var url= '/cursos?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
          //Obtenemos todo lo que nos devuelve los registros de la tabla cursos
          axios.get(url)
            .then(function (response) {
              var respuesta= response.data;
              me.arrayCurso = respuesta.cursos.data;
              me.pagination= respuesta.pagination;
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
              me.listarCurso(page,buscar,criterio);
          },
        registrarCurso(){
          if(this.validarCurso()){
            return;
          }

          let me = this;
          axios.post('/cursos/registrar', {
            'nombre': this.nombre,
            'descripcion' : this.descripcion,
            'fecha' : this.fecha
             }).then(function (response) {
              me.cerrarModal();
              me.listarCurso(1,'', 'curso');
            })
            .catch(function (error) {

              console.log(error);
            });


        },
        actualizarCurso(){
          if(this.validarCurso()){
            return;
          }

          let me = this;
          axios.put('/cursos/actualizar', {
            'nombre': this.nombre,
            'descripcion' : this.descripcion,
            'id' : this.cursoId,
            'fecha' : this.fecha

            }).then(function (response) {
              me.cerrarModal();
              me.listarCurso(1,'', 'curso');
            })
            .catch(function (error) {

              console.log(error.response);
            });
        },
        desactivarCurso(id){
          this.mensaje = confirm("¿Está seguro que desea desactivar el curso?");

          if (this.mensaje) {
            let me = this;

              axios.put('/cursos/desactivar',{
                  'id': id
              }).then(function (response) {
                  me.listarCurso(1,'', 'curso');
                  alert('El registro ha sido desactivado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        activarCurso(id){
          this.mensaje = confirm("¿Está seguro que desea activar la categoría?");

          if (this.mensaje) {
            let me = this;

              axios.put('/cursos/activar',{
                  'id': id
              }).then(function (response) {
                  me.listarCurso(1,'', 'curso');
                  alert('El registro ha sido activado con éxito.');
              }).catch(function (error) {
                  console.log(error);
              });
          }
        },
        validarCurso(){
          this.errorCurso = 0;
          this.errorMostrarMsjCurso = [];
          if(this.fecha=='') this.errorMostrarMsjCurso.push("La fecha no puede estar vacía");
          if(!this.nombre) this.errorMostrarMsjCurso.push("El nombre del curso no puede estar vacío");
          if(this.errorMostrarMsjCurso.length) this.errorCurso = 1;

          return this.errorCurso;
        },


        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "cursos":
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.nombre = '';
                    this.descripcion = '';
                    this.fecha = '';
                    this.tituloModal = "Registrar Curso";
                    this.tipoAccion = 1;
                    break;
                  }
                  case 'actualizar':{

                    this.modal = 1;
                    this.tituloModal = "Actualizar Curso";
                    this.tipoAccion=2;
                    this.cursoId = data['id'];
                    this.nombre = data['nombre'];
                    this.fecha = data['fecha'];
                    this.descripcion = data['descripcion'];

                  }



                }
              break;

          }
        },
        cerrarModal(){
          this.modal = 0;
          this.tituloModal = '';
          this.nombre = '';
          this.descripcion = '';
          this.fecha = '';

        }
      },
      mounted() {
            this.listarCurso(1,this.buscar, this.criterio);
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
