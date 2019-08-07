<template>
<div>
    <div class="container">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Usuarios</h2>
              <div>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                  <li class="breadcrumb-item active">Usuarios</li>
              </ul>
              </div>
          </div>
        </div>
    </div>



    <!-- Sorting -->

    <div class="row">
    <div class="col-xl-12">
    <div class="widget has-shadow">
     <div class="widget-header bordered no-actions d-flex align-items-center">

             <!-- Begin Search Box
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                End Search Box-->

        <div class="form-group row">
              <div class="col-md-11">
                  <div class="input-group">
                     <!--
                    <select class="form-control col-md-3" v-model="criterio">
                        <option value="nombre">Nombre</option>
                        <option value="direccion">Direccion</option>
                      </select>
                    -->
                        <select class="selectpicker show-menu-arrow"  v-model="criterio">
                            <option value="usuario" selected>Usuario</option>
                        </select>
                    &nbsp;

                    <form id="searchForm" action="#" role="search">
                      <input type="search" placeholder="Search something ..."  v-model="buscar"  @keyup.enter="listarUsuario(1,buscar,criterio)" class="form-control" >
                      </form>
                      <button type="submit" @click="listarUsuario(1,buscar,criterio)"  class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>

              <div class="col-md-1">
          <button type="button" class="btn btn-gradient-03 mr-1 mb-2" @click="abrirModal('usuario', 'registrar')">Agregar usuarios</button>
              </div>
          </div>


        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th><span style="width:100px;">Condicion</span></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr v-for="usuario in arrayUsuario" :key="usuario.id">
                                    <td v-text="usuario.usuario"></td>
                                    <td v-text="usuario.password"></td>
                                    <td>
                                      <div v-if="usuario.condicion">
                                        <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                      </div>
                                      <div v-else>
                                        <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                      </div>
                                    </td>
                            <td class="td-actions">
                                <a type="button" @click="abrirModal('usuario', 'actualizar', usuario)"><i class="la la-edit edit"></i></a>
                              <template v-if="usuario.condicion">
                                <a type="button"  @click="desactivarUsuario(usuario.id)"><i class="la la-close delete"></i></a>
                                 &nbsp;
                             </template>

                             <template v-else>
                                <a type="button" @click="activarUsuario(usuario.id)"><i class="la la-check delete"></i></a>
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
    </div>



    <!-- Begin Large Modal -->
    <div id="modal-large" class="modal fade" :class="{'mostrar' : modal}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                     </button>
                </div>
                <div class="modal-body">




                  <div class="widget-body">
                   <!--- class="needs-validation" novalidate--->
                  <form >
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Usuario</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa tu nombre de usuario" v-model="usuario" required>
                          </div>
                      </div>
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña *</label>
                          <div class="col-lg-5">
                              <input type="password" class="form-control" placeholder="Password"  v-model="password" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa una contraseña
                              </div>
                          </div>

                      </div>

                  </form>
                  </div>
              </div>



                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==1" @click="registrarUsuario()">Guardar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==2" @click="actualizarUsuario()">Modificar</button>

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
            usuario_id: 0,
            usuario :'',
            password : '',
            arrayUsuario: [],
            modal: 0,
            tituloModal: '',
            tipoAccion :0,
            errorUsuario : 0,
            errorMsjUsuario : [],
            pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
           offset : 3,
           criterio : 'usuario',
           buscar : ''
          }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
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
        methods: {
          listarUsuario(page,buscar,criterio){
            let me=this;
            var url= '/usuario?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response) {
              var respuesta= response.data;
              me.arrayUsuario = respuesta.usuarios.data;
              me.pagination= respuesta.pagination;
            })
            .catch(function (error) {
              // handle error
              console.log(error);
            });
          },
          cambiarPagina(page,buscar,criterio){
              let me = this;
              //Actualiza la página actual
              me.pagination.current_page = page;
              //Envia la petición para visualizar la data de esa página
              me.listarUsuario(page,buscar,criterio);
          },
          registrarUsuario(){

            if(this.validarUsuario()){
              return;
            }

            let me=this;
            axios.post('/usuario/registrar',{
              'usuario': this.usuario,
              'password': this.password

            }).then(function (response) {
              me.cerrarModal();
              me.listarUsuario(1,'','usuario');
            }).catch(function (error) {
              // handle error
              console.log(error.response);
            });
          },
          actualizarUsuario(){

              let me = this;
              axios.put('/usuario/actualizar',{
                  'usuario': this.usuario,
                  'password': this.password,
                  'id': this.usuario_id
              }).then(function (response) {
                  me.cerrarModal();
                  me.listarUsuario(1,'','usuario');
              }).catch(function (error) {
                  console.log(error.response);
              });
          },
          desactivarUsuario(id){
            this.mensaje = confirm("¿Está seguro que desea desactivar el usuario?");
            if (this.mensaje) {
              let me = this;
                  axios.put('/usuario/desactivar',{
                  'id': id
                  }).then(function (response) {
                      me.listarUsuario(1,'','usuario');
                      alert('El registro ha sido desactivado con éxito.');
                  }).catch(function (error) {
                      console.log(error);
                  });
            }
          },
          activarUsuario(id){
             this.mensaje = confirm("¿Está seguro que desea activar el usuario?");

              if (this.mensaje) {
                let me = this;
                    axios.put('/usuario/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarUsuario(1,'','usuario');
                        alert('El registro ha sido activado con éxito.');
                    }).catch(function (error) {
                        console.log(error);
                    });
              }
          },
          validarUsuario(){
            this.errorUsuario = 0;
            this.errorMsjUsuario = [];

            if(!this.usuario){
              this.errorMsjUsuario.push("El nombre de usuario no puede estar vacío");
            }else if(!this.password){
              this.errorMsjUsuario.push("La contraseña no puede estar vacío");
            }

            if(this.errorMsjUsuario.length) this.errorUsuario = 1;
            return this.errorUsuario;


          },
          cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.usuario = '';
            this.password = '';
            this.errorUsuario = 0;
          },
          abrirModal(modelo, accion, data = [] ){
            switch(modelo){
              case "usuario":
                {
                  switch(accion){
                    case "registrar":
                      {
                          this.modal = 1;
                          this.usuario = '';
                          this.password = '';
                          this.tituloModal = 'Registrar Usuario'
                          this.tipoAccion = 1;
                        break;
                      }
                    case "actualizar":
                      {
                          //console.log(data);
                          this.modal = 1;
                          this.tituloModal = 'Actualizar usuario'
                          this.tipoAccion = 2;
                          this.usuario_id = data['id'];
                          this.usuario = data['usuario'];
                          this.password = data['password'];
                        break;
                      }
                  }
                }
            }
          }

        },
        mounted() {
            this.listarUsuario(1,this.buscar,this.criterio);
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
