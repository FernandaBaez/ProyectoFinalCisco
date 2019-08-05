<template>
<div>
    <div class="container">
      <div class="row">
          <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Grupos</h2>
                <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
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
                                <option value="academia" selected>Academia</option>
                            </select>
                            &nbsp;

                            <form id="searchForm" action="#" role="search">
                              <input type="search" placeholder="Search something ..."  v-model="buscar" class="form-control" @keyup.enter="listarGrupo(1,buscar,criterio)">
                            </form>
                              <button type="submit"  @click="listarGrupo(1,buscar,criterio)" class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i>Buscar</button>
                          </div>
                      </div>

                      <div class="col-md-1">
                        <button type="button" @click="abrirModal('grupos', 'registrar')" class="btn btn-gradient-03 mr-1 mb-2" ><i class="la la-pencil"></i>Agregar grupo</button>
                      </div>
                  </div>
              </div>

              <div class="widget-body">
                  <div class="table-responsive">
                      <table id="sorting-table" class="table mb-0">
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Academia</th>
                                  <th>Descripción</th>
                                  <th><span style="width:100px;">Estado</span></th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="grupos in arrayGrupo" :key="grupos.id">
                                <td v-text="grupos.nombre"></td>
                                <td v-text="grupos.nombre_academia"></td>
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
                                  <a type="button" @click="abrirModal('grupos', 'actualizar', grupos)"><i class="la la-edit edit"></i></a>

                                  <template v-if="grupos.condicion">
                                      <a type="button" @click="desactivarCurso(grupos.id)"><i class="la la-close delete"></i></a>
                                  </template>
                                  <template v-else>
                                      <a type="button" @click="activarCurso(grupos.id)"><i class="la la-check delete"></i></a>
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
          grupoId : 0,
          id_academia : 0,
          nombre : '',
          descripcion : '',
          arrayGrupo : [],
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
          criterio : 'grupos',
          arrayAcademia : []

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
        cambiarPagina(page,buscar,criterio){
              let me = this;
              //Actualiza la página actual
              me.pagination.current_page = page;
              //Envia la petición para visualizar la data de esa página
              me.listarGrupo(page,buscar,criterio);
          },

        registrarGrupo(){
          if(this.validarGrupo()){
            return;
          }

          let me = this;
          axios.post('/grupos/registrar',{
            'id_academia' : this.id_academia,
            'nombre': this.nombre,
            'descripcion' : this.descripcion

            }).then(function (response) {
              me.cerrarModal();
              me.listarGrupo(1,'','grupos');
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
          axios.put('/grupos/actualizar', {
            'nombre': this.nombre,
            'descripcion' : this.descripcion,
            'id' : this.grupoId,
            'id_academia' : this.id_academia
            }).then(function (response) {
              me.cerrarModal();
              me.listarGrupo(1,'','grupos');
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

        validarGrupo(){
          this.errorGrupo = 0;
          this.errorMostrarMsjGrupo = [];

          if(this.id_academia == 0) this.errorMostrarMsjGrupo.push("Seleccione una academia");
          if(!this.nombre) this.errorMostrarMsjGrupo.push("El nombre del grupo no puede estar vacío");
          if(this.errorMostrarMsjGrupo.length) this.errorGrupo = 1;

          return this.errorGrupo;
        },


        abrirModal(modelo, accion, data = []){
          switch (modelo) {
            case "grupos":{
                switch (accion) {
                  case 'registrar':{
                    this.modal = 1;
                    this.tituloModal = "Registrar Grupo";
                    this.nombre = '';
                    this.descripcion = '';
                    this.id_academia = 0;
                    this.tipoAccion = 1;
                    break;
                  }
                  case 'actualizar':{
                    this.modal = 1;
                    this.tituloModal = "Actualizar Grupo";
                    this.tipoAccion=2;
                    this.grupoId = data['id'];
                    this.nombre = data['nombre'];
                    this.id_academia = data['id_academia'];
                    this.descripcion = data['descripcion'];
                    break;
                  }
                }
              }
          }
          this.selectAcademia();
        },
        cerrarModal(){
          this.modal = 0;
          this.tituloModal = '';
          this.nombre = '';
          this.descripcion = '';
          this.id_academia = 0;
          this.errorGrupo = 0
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
