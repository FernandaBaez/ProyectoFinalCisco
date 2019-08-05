<template>
<div>
    <div class="container">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Contactos</h2>
              <div>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                  <li class="breadcrumb-item active">Contactos</li>
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
                            <option value="apellido" selected>Apellido</option>
                        </select>
                    &nbsp;
                    
                    <form id="searchForm" action="#" role="search">
                      <input type="search" placeholder="Search something ..."  v-model="buscar"  @keyup.enter="listarContacto(1,buscar,criterio)" class="form-control" >
                      </form>
                      <button type="submit" @click="listarContacto(1,buscar,criterio)"  class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          
              <div class="col-md-1">         
          <button type="button" class="btn btn-gradient-03 mr-1 mb-2" @click="abrirModal('contacto', 'registrar')">Agregar contactos</button>
              </div>
          </div>
       

        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Telefono</th>
                            <th>Idioma</th>
                            <th>Usuario</th> 
                            <th>Academia</th> 
                            <th><span style="width:100px;">Condicion</span></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr v-for="contacto in arrayContacto" :key="contacto.id">
                                    <td v-text="contacto.nombre"></td>
                                    <td v-text="contacto.apellido"></td>
                                    <td v-text="contacto.correo"></td>
                                    <td v-text="contacto.cargo"></td>
                                    <td v-text="contacto.telefono"></td>
                                    <td v-text="contacto.idioma"></td>
                                    <td v-text="contacto.nombre_usuario"></td>
                                    <td v-text="contacto.nombre_academia"></td>
                           
                                    <td>
                                      <div v-if="contacto.condicion">
                                        <span style="width:100px;"><span class="badge-text badge-text-small success">Activo</span></span>
                                      </div>
                                      <div v-else>
                                        <span style="width:100px;"><span class="badge-text badge-text-small danger">Desactivado</span></span>
                                      </div>
                                    </td>
                            <td class="td-actions">
                                <a type="button" @click="abrirModal('contacto', 'actualizar', contacto)"><i class="la la-edit edit"></i></a>
                              <template v-if="contacto.condicion">
                                <a type="button"  @click="desactivarContato(contacto.id)"><i class="la la-close delete"></i></a>
                                 &nbsp;
                             </template>

                             <template v-else>
                                <a type="button" @click="activarContacto(contacto.id)"><i class="la la-check delete"></i></a>
                            </template>

                                <a type="button" data-toggle="modal" data-target="#modal-large2" ><i class="la la-user-plus user"></i></a>
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
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el apellido" v-model="apellido" required>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo electronico *</label>
                          <div class="col-lg-5">
                              <div class="input-group">
                                  <input type="email" class="form-control" placeholder="Ingresa un email" v-model="correo" required>
                                  <span class="input-group-addon addon-orange">.com</span>
                                  <div class="invalid-feedback">
                                      Porfavor ingresa un correo valido
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Cargo *</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Cargo"  v-model="cargo" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un cargo 
                              </div>
                          </div>
                      </div>
                    
                    
                                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Pais *</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Pais"  v-model="pais" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un pais valido 
                              </div>
                          </div>
                      </div>
                    
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefono</label>
                          <div class="col-lg-5">
                              <div class="input-group">
                                  <span class="input-group-addon addon-primary">
                                      <i class="la la-phone"></i>
                                  </span>
                                  <input type="text" class="form-control" placeholder="Número de teléfono" v-model="telefono" required>
                              </div>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Extension </label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Extension"  v-model="extension" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un extensión valida 
                              </div>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Idioma </label>
                          <div class="col-lg-5">
                              <div class="select">
                                  <select class="custom-select form-control" v-model="idioma" required>
                                      <option value="">Selecciona una opción</option>
                                      <option value="Español">Español</option>
                                      <option value="Ingles">Ingles</option>
                                      <option value="Japones">Japonés</option>
                                      <option value="Portugues">Portugués</option>
                                      <option value="Italiano">Italiano</option>
                                      <option value="Aleman">Alemán</option>
                                      <option value="Chino">Chino</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Porfavor selecciona una opcion
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                     <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Usuario </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_usuario" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="usuario in arrayUsuario" :key="usuario.id" :value="usuario.id" v-text="usuario.usuario"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa un usuario valida 
                              </div>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Academia </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_academia" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="academia in arrayAcademia" :key="academia.id" :value="academia.id" v-text="academia.nombre"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa una academia valida 
                              </div>
                          </div>
                      </div>
             
                  </form>
                  </div>
              </div>
                  
                  
          
                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==1" @click="registrarContacto()">Guardar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==2" @click="actualizarContacto()">Modificar</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Large Modal -->
  



    <!-- Begin Large Modal -->
    <div id="modal-large2" class="modal fade" >
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
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Ingresa el apellido" v-model="apellido" required>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo electronico *</label>
                          <div class="col-lg-5">
                              <div class="input-group">
                                  <input type="email" class="form-control" placeholder="Ingresa un email" v-model="correo" required>
                                  <span class="input-group-addon addon-orange">.com</span>
                                  <div class="invalid-feedback">
                                      Porfavor ingresa un correo valido
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Cargo *</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Cargo"  v-model="cargo" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un cargo 
                              </div>
                          </div>
                      </div>
                    
                    
                                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Pais *</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Pais"  v-model="pais" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un pais valido 
                              </div>
                          </div>
                      </div>
                    
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefono</label>
                          <div class="col-lg-5">
                              <div class="input-group">
                                  <span class="input-group-addon addon-primary">
                                      <i class="la la-phone"></i>
                                  </span>
                                  <input type="text" class="form-control" placeholder="Número de teléfono" v-model="telefono" required>
                              </div>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Extension </label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="Extension"  v-model="extension" required>
                              <div class="invalid-feedback">
                                  Porfavor ingresa un extensión valida 
                              </div>
                          </div>
                      </div>
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Idioma </label>
                          <div class="col-lg-5">
                              <div class="select">
                                  <select class="custom-select form-control" v-model="idioma" required>
                                      <option value="">Selecciona una opción</option>
                                      <option value="Español">Español</option>
                                      <option value="Ingles">Ingles</option>
                                      <option value="Japones">Japonés</option>
                                      <option value="Portugues">Portugués</option>
                                      <option value="Italiano">Italiano</option>
                                      <option value="Aleman">Alemán</option>
                                      <option value="Chino">Chino</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Porfavor selecciona una opcion
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                     <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Usuario </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_usuario" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="usuario in arrayUsuario" :key="usuario.id" :value="usuario.id" v-text="usuario.usuario"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa un usuario valida 
                              </div>
                          </div>
                      </div>
                    
                    
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Academia </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_academia" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="academia in arrayAcademia" :key="academia.id" :value="academia.id" v-text="academia.nombre"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa una academia valida 
                              </div>
                          </div>
                      </div>
             
                  </form>
                  </div>
              </div>
                  
                  
          
                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==1" @click="registrarContacto()">Guardar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==2" @click="actualizarContacto()">Modificar</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Large Modal -->
</div>
</template>




<script>
    export default {
        data (){
            return {
                contacto_id: 0,
                nombre : '',
                apellido : '',
                correo : '',
                cargo : '',
                pais : '',
                telefono : '',
                extension : '',
                idioma : '',
                id_usuario : '',
                id_academia : '',
                arrayContacto : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorContacto : 0,
                errorMsjContacto : [],
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
                buscar : '',
                arrayUsuario : [],
                arrayAcademia : []
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
        methods : {
            listarContacto (page,buscar,criterio){
                let me=this;
                var url= '/contacto?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayContacto = respuesta.contactos.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error.response);
                });
            },
            selectUsuario(){
                let me=this;
                var url= '/usuario/selectUsuario';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayUsuario = respuesta.usuarios;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectAcademia(){
                let me=this;
                var url= '/academia/selectAcademia';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayAcademia = respuesta.academias;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarContacto(page,buscar,criterio);
            },
            registrarContacto(){
                if (this.validarContacto()){
                    return;
                }
                
                let me = this;
                axios.post('/contacto/registrar',{
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'correo': this.correo,
                    'cargo': this.cargo,
                    'pais': this.pais,
                    'telefono': this.telefono,
                    'extension': this.extension,
                    'idioma': this.idioma,
                    'id_usuario': this.id_usuario,
                    'id_academia': this.id_academia
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarContacto(1,'','nombre');
                }).catch(function (error) {
                    console.log(error.response);
                });
            },
            actualizarContacto(){
                
                let me = this;
                axios.put('/contacto/actualizar',{
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'correo': this.correo,
                    'cargo': this.cargo,
                    'pais': this.pais,
                    'telefono': this.telefono,
                    'extension': this.extension,
                    'idioma': this.idioma,
                    'id_usuario': this.id_usuario,
                    'id_academia': this.id_academia,
                    'id': this.contacto_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarContacto(1,'','nombre');
                }).catch(function (error) {
                    console.log(error.response);
                }); 
            },
          desactivarContato(id){
            this.mensaje = confirm("¿Está seguro que desea desactivar el contacto?");
            if (this.mensaje) {
              let me = this;
                  axios.put('/contacto/desactivar',{
                  'id': id
                  }).then(function (response) {
                      me.listarContacto(1,'','nombre');
                      alert('El registro ha sido desactivado con éxito.');
                  }).catch(function (error) {
                      console.log(error);
                  });
            }
          },
          activarContacto(id){
             this.mensaje = confirm("¿Está seguro que desea activar el contacto?");
              
              if (this.mensaje) {
                let me = this;
                    axios.put('/contacto/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarContacto(1,'','nombre');
                        alert('El registro ha sido activado con éxito.');
                    }).catch(function (error) {
                        console.log(error);
                    });
              }
          },
            validarContacto(){
                this.errorContacto=0;
                this.errorMsjContacto =[];
                if (!this.nombre) this.errorMsjContacto.push("El nombre del contacto no puede estar vacío.");
                if (this.errorMsjContacto.length) this.errorContacto = 1;
                return this.errorContacto;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre = '';
                this.apellido = '';
                this.correo = '';
                this.cargo = '';
                this.pais = '';
                this.telefono = '';
                this.extension = '';
                this.idioma = '';
                this.id_usuario = '';
                this.id_academia = '';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "contacto":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar contacto';
                                this.nombre = '';
                                this.apellido = '';
                                this.correo = '';
                                this.cargo = '';
                                this.pais = '';
                                this.telefono = '';
                                this.extension = '';
                                this.idioma = '';
                                this.id_usuario = '';
                                this.id_academia = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar contacto';
                                this.tipoAccion=2;
                                this.contacto_id=data['id'];
                                this.nombre = data['nombre'];
                                this.apellido= data['apellido'];
                                this.correo= data['correo'];
                                this.cargo= data['cargo'];
                                this.pais= data['pais'];
                                this.telefono= data['telefono'];
                                this.extension= data['extension'];
                                this.idioma= data['idioma'];
                                this.id_usuario= data['id_usuario'];
                                this.id_academia= data['id_academia'];
                                break;
                            }
                          case 'usuario':
                            {
                                this.modal=1;
                            }
                        }
                    }
                    this.selectUsuario();
                    this.selectAcademia();
                }
            }
        },
        mounted() {
            this.listarContacto(1,this.buscar,this.criterio);
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