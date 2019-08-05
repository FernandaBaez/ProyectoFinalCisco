<template>
<div>
    <div class="container">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Academias</h2>
              <div>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                  <li class="breadcrumb-item active">Academias</li>
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
                            <option value="nombre" selected>Nombre</option>
                            <option value="direccion">Direccion</option>
                        </select>
                    &nbsp;
                    
                    <form id="searchForm" action="#" role="search">
                      <input type="search" placeholder="Search something ..."  v-model="buscar"  @keyup.enter="listarAcademia(1,buscar,criterio)" class="form-control" >
                      </form>
                      <button type="submit" @click="listarAcademia(1,buscar,criterio)"  class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          
              <div class="col-md-1">         
          <button type="button" class="btn btn-gradient-03 mr-1 mb-2" @click="abrirModal('academia', 'registrar')">Agregar academia</button>
              </div>
          </div>
       

        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Codigo postal</th>
                            <th>Sitio</th>
                            <th>Tipo</th>
                            <th><span style="width:100px;">Condicion</span></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="academia in arrayAcademia" :key="academia.id">
                                    <td v-text="academia.nombre"></td>
                                    <td v-text="academia.direccion"></td>
                                    <td v-text="academia.estado"></td>
                                    <td v-text="academia.ciudad"></td>
                                    <td v-text="academia.cp"></td>
                                    <td v-text="academia.sitio"></td>
                                    <td v-text="academia.tipo"></td>
                                    <td>
                                      <div v-if="academia.condicion">
                                        <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                      </div>
                                      <div v-else>
                                        <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                      </div>
                                    </td>
                            <td class="td-actions">
                                <a type="button" @click="abrirModal('academia', 'actualizar', academia)"><i class="la la-edit edit"></i></a>
                              <template v-if="academia.condicion">
                                <a type="button"  @click="desactivarAcademia(academia.id)"><i class="la la-close delete"></i></a>
                                 &nbsp;
                             </template>

                             <template v-else>
                                <a type="button" @click="activarAcademia(academia.id)"><i class="la la-check delete"></i></a>
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
                  <form>
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el nombre" v-model="nombre" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Direccion</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa la direccion" v-model="direccion" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Direccion 2</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa la direccion" v-model="direccion2" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Pais</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el pais" v-model="pais" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Estado</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el estado" v-model="estado" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Ciudad</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa la ciudad" v-model="ciudad" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Codigo postal</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el codigo postal" v-model="cp" required>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sitio</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el sitio web" v-model="sitio" required>
                          </div>
                      </div>
            
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Tipo </label>
                          <div class="col-lg-5">
                              <div class="select">
                                  <select class="custom-select form-control" v-model="tipo" required>
                                      <option value="">Selecciona una opción</option>
                                      <option value="Publica">Publica</option>
                                      <option value="Privada">Privada</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Porfavor selecciona una opcion
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div v-show="errorAcademia" class="form-group row div-error">
                        <div class="text-center text-error">
                          <div class="alert alert-outline-danger dotted" role="alert" v-for="error in errorMsjAcademia" :key="error" v-text="error">

                          </div>

                        </div>
                      </div>
                  </form>
                  </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarAcademia()">Guardar</button>
                        <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarAcademia()">Modificar</button>
                    
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
            academia_id: 0,
            nombre :'', 
            direccion : '',
            direccion2 : '',
            pais : '',
            estado : '',
            ciudad : '',
            cp : '',
            sitio : '',
            tipo : '',
            arrayAcademia: [],
            modal: 0,
            tituloModal: '',
            tipoAccion :0,
            errorAcademia : 0,
            errorMsjAcademia : [],
            pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
           offset : 3,
           criterio : 'nombre',
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
          listarAcademia(page,buscar,criterio){
            let me=this;
            var url= '/academia?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            
            axios.get(url).then(function (response) {
              var respuesta= response.data;
              me.arrayAcademia = respuesta.academias.data;
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
              me.listarAcademia(page,buscar,criterio);
          },
          registrarAcademia(){
            /*
          if(this.validarAcademia()){
            return;
          }*/
            
            let me=this;
            axios.post('/academia/registrar',{
              'nombre': this.nombre,
              'direccion': this.direccion,
              'direccion2': this.direccion2,
              'pais': this.pais,
              'estado': this.estado, 
              'ciudad': this.ciudad,
              'cp': this.cp,
              'sitio': this.sitio,
              'tipo': this.tipo
              
            }).then(function (response) {
              me.cerrarModal();
              me.listarAcademia(1,'','nombre');
            }).catch(function (error) {
              // handle error
              console.log(error.response);
            });
          },
          actualizarAcademia(){
            /*
          if(this.validarAcademia()){
            return;
          }*/
              let me = this;
              axios.put('/academia/actualizar',{
                  'nombre': this.nombre,
                  'direccion': this.direccion,
                  'direccion2': this.direccion2,
                  'pais': this.pais,
                  'estado': this.estado, 
                  'ciudad': this.ciudad,
                  'cp': this.cp,
                  'sitio': this.sitio,
                  'tipo': this.tipo,
                  'id': this.academia_id
              }).then(function (response) {
                  me.cerrarModal();
                  me.listarAcademia(1,'','nombre');
              }).catch(function (error) {
                  console.log(error.response);
              }); 
          },
          desactivarAcademia(id){
            this.mensaje = confirm("¿Está seguro que desea desactivar la academia?");
            if (this.mensaje) {
              let me = this;
                  axios.put('/academia/desactivar',{
                  'id': id
                  }).then(function (response) {
                      me.listarAcademia(1,'','nombre');
                      alert('El registro ha sido desactivado con éxito.');
                  }).catch(function (error) {
                      console.log(error);
                  });
            }
          },
          activarAcademia(id){
             this.mensaje = confirm("¿Está seguro que desea activar la academia?");
              
              if (this.mensaje) {
                let me = this;
                    axios.put('/academia/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarAcademia(1,'','nombre');
                        alert('El registro ha sido activado con éxito.');
                    }).catch(function (error) {
                        console.log(error);
                    });
              }
          },
          validarAcademia(){
            this.errorAcademia = 0;
            this.errorMsjAcademia = [];
            
            if(!this.nombre){ 
              this.errorMsjAcademia.push("El nombre de la academia no puede estar vacío");
            }else if(!this.direccion){ 
              this.errorMsjAcademia.push("La dirección de la academia no puede estar vacío");
            }else if(!this.pais){ 
              this.errorMsjAcademia.push("El pais de la academia no puede estar vacío");
            }else if(!this.estado){ 
              this.errorMsjAcademia.push("El estado de la academia no puede estar vacío");
            }else if(!this.ciudad){ 
              this.errorMsjAcademia.push("La ciudad de la academia no puede estar vacío");
            }else if(!this.tipo){ 
              this.errorMsjAcademia.push("El tipo de la academia no puede estar vacío");
            }
            
            if(this.errorMsjAcademia.length) this.errorAcademia = 1;
            return this.errorAcademia;
            
            
          },
          cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.nombre = '';
            this.direccion = '';
            this.direccion2 = '';
            this.pais = '';
            this.estado = '';
            this.ciudad = '';
            this.cp = '';
            this.sitio = '';
            this.tipo = '';
            this.errorAcademia = 0;
          },
          abrirModal(modelo, accion, data = [] ){
            switch(modelo){
              case "academia":
                {
                  switch(accion){
                    case "registrar":
                      {
                          this.modal = 1;
                          this.nombre = '';
                          this.direccion = '';
                          this.direccion2 = '';
                          this.pais = '';
                          this.estado = '';
                          this.ciudad = '';
                          this.cp = '';
                          this.sitio = '';
                          this.tipo = '';
                          this.tituloModal = 'Registrar Academia'
                          this.tipoAccion = 1;
                        break;
                      }
                    case "actualizar":
                      {
                          //console.log(data);
                          this.modal = 1;
                          this.tituloModal = 'Actualizar Academia'
                          this.tipoAccion = 2;
                          this.academia_id = data['id'];
                          this.nombre = data['nombre'];
                          this.direccion = data['direccion'];
                          this.direccion2 = data['direccion2'];
                          this.pais = data['pais'];
                          this.estado = data['estado'];
                          this.ciudad = data['ciudad'];
                          this.cp = data['cp'];
                          this.sitio = data['sitio'];
                          this.tipo = data['tipo'];
                        break;
                      }
                  }
                }
            }
          }
          
        },
        mounted() {
            this.listarAcademia(1,this.buscar,this.criterio);
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