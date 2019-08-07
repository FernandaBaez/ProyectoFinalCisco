<template>
<div>
    <div class="container">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Inscribir instructores</h2>
              <div>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                  <li class="breadcrumb-item active">Inscripción</li>
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
                            <option value="nombre_instructor" selected>Nombre</option>
                        </select>
                    &nbsp;
                    
                    <form id="searchForm" action="#" role="search">
                      <input type="search" placeholder="Search something ..."  v-model="buscar"  @keyup.enter="listarInscripcion(1,buscar,criterio)" class="form-control" >
                      </form>
                      <button type="submit" @click="listarInscripcion(1,buscar,criterio)"  class="btn btn-gradient-03 mr-1 mb-2" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
              </div>
          
              <div class="col-md-1">         
          <button type="button" class="btn btn-gradient-03 mr-1 mb-2" @click="abrirModal('inscripcion', 'registrar')">Inscribir instructor</button>
              </div>
          </div>
       

        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>                                    
                          <th>Nombre</th>
                          <th>Requiere orientación</th>
                          <th>Fecha OC</th>
                          <th>Horario</th>
                          <th>Entrenamiento</th>
                          <th>Fecha entrenamiento</th>
                           <th><span style="width:100px;">Condicion</span></th>
                           <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr v-for="inscripcion in arrayInscripcion" :key="inscripcion.id">
                                    <td v-text="inscripcion.nombre_instructor"></td>
                                    <td v-text="inscripcion.requiere_orientacion"></td>
                                    <td v-text="inscripcion.fecha_s"></td>
                                    <td v-text="inscripcion.horario"></td>
                                    <td v-text="inscripcion.nombre_curso"></td>
                                    <td v-text="inscripcion.fecha_p"></td>
                           
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
                                <a type="button"  @click="desactivarInscripcion(inscripcion.id)"><i class="la la-close delete"></i></a>
                                 &nbsp;
                             </template>

                             <template v-else>
                                <a type="button" @click="activarInscripcion(inscripcion.id)"><i class="la la-check delete"></i></a>
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
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Instructor </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_instructor" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="instructor in arrayInstructor" :key="instructor.id" :value="instructor.id" v-text="instructor.nombre"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa una instructor valida 
                              </div>
                          </div>
                      </div>
                    
                        <div class="form-group row d-flex align-items-center mb-5">
                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">¿Requiere orientación? </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="requiere_orientacion" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option value="Si">Si</option>
                                  <option value="No">No</option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa una opcion valida 
                              </div>
                            
                          </div>
                      </div>
                    
                    
                                 
              <div class="form-group row d-flex align-items-center mb-5">
                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha solicitada(OC)</label>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="la la-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" id="date" placeholder="DD-MM-AA" v-model="fecha_s" >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                     <div class="form-group row d-flex align-items-center mb-5">
                      <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Horario </label>
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
                           <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Curso solicitado </label>
                          <div class="col-lg-5">
                              <select  class="custom-select form-control" v-model="id_curso" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="curso in arrayCurso" :key="curso.id" :value="curso.id" v-text="curso.nombre"></option>
                             </select>  
                              <div class="invalid-feedback">
                                  Porfavor ingresa una curso valido
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
                                    <input type="text" class="form-control" id="date" v-model="fecha_p" placeholder="DD-MM-AA">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                                   
                
             
                  </form
                    
                  </div>
              </div>
                  
                  
          
                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==1" @click="registrarInscripcion()">Guardar</button>
                        <button type="button"  class="btn btn-gradient-01"  v-if="tipoAccion==2" @click="actualizarInscripcion()">Modificar</button>
                    
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
        data (){
            return {
                inscripcion_id: 0,
                id_instructor : '',
                id_curso : '',
                requiere_orientacion : '',
                fecha_s : '',
                fecha_p : '',
                horario : '',
                arrayInscripcion : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorInstructor : 0,
                errorMsjInstructor : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre_instructor',
                buscar : '',
                arrayInstructor : [],
                arrayCurso: []
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
            listarInscripcion (page,buscar,criterio){
                let me=this;
                var url= '/inscripcion?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayInscripcion = respuesta.inscripciones.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error.response);
                });
            },
            selectInstructor(){
                let me=this;
                var url= '/instructor/selectInstructor';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayInstructor = respuesta.instructores;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectCurso(){
                let me=this;
                var url= '/cursos/selectCurso';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayCurso = respuesta.cursos;
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
                me.listarInscripcion(page,buscar,criterio);
            },
            registrarInscripcion(){
                /*if (this.validarInstructor()){
                    return;
                }*/
                
                let me = this;
                axios.post('/inscripcion/registrar',{
                    'id_instructor': this.id_instructor,
                    'id_curso': this.id_curso,
                    'requiere_orientacion': this.requiere_orientacion,
                    'fecha_s': this.fecha_s,
                    'fecha_p': this.fecha_p,
                    'horario': this.horario
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarInscripcion(1,'','nombre_instructor');
                }).catch(function (error) {
                    console.log(error.response);
                });
            },
            actualizarInscripcion(){
              
                
                let me = this;
                axios.put('/inscripcion/actualizar',{
                    'id_instructor': this.id_instructor,
                    'id_curso': this.id_curso,
                    'requiere_orientacion': this.requiere_orientacion,
                    'fecha_s': this.fecha_s,
                    'fecha_p': this.fecha_p,
                    'horario': this.horario
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarInscripcion(1,'','nombre_instructor');
                }).catch(function (error) {
                    console.log(error.response);
                }); 
            },
          desactivarInscripcion(id){
            this.mensaje = confirm("¿Está seguro que desea desactivar el registro?");
            if (this.mensaje) {
              let me = this;
                  axios.put('/inscripcion/desactivar',{
                  'id': id
                  }).then(function (response) {
                      me.listarInscripcion(1,'','nombre_instructor');
                      alert('El registro ha sido desactivado con éxito.');
                  }).catch(function (error) {
                      console.log(error);
                  });
            }
          },
          activarInscripcion(id){
             this.mensaje = confirm("¿Está seguro que desea activar el registro?");
              
              if (this.mensaje) {
                let me = this;
                    axios.put('/inscripcion/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarInscripcion(1,'','nombre_instructor');
                        alert('El registro ha sido activado con éxito.');
                    }).catch(function (error) {
                        console.log(error);
                    });
              }
          },
            validarInstructor(){
                this.errorInstructor=0;
                this.errorMsjInstructor =[];
                if (!this.nombre_instructor) this.errorMsjInstructor.push("El nombre del instructor no puede estar vacío.");
                if (this.errorMsjInstructor.length) this.errorInstructor = 1;
                return this.errorInstructor;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre = '';
                this.apellido = '';
                this.correo = '';
                this.id_academia = '';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "inscripcion":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar inscripción';
                                this.id_instructor = '';
                                this.id_curso = '';
                                this.requiere_orientacion = '';
                                this.fecha_s = '';
                                this.fecha_p = '';
                                this.horario = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar inscripción';
                                this.tipoAccion=2;
                                this.inscripcion_id=data['id'];
                                this.id_instructor = data['id_instructor'];
                                this.id_curso= data['id_curso'];
                                this.requiere_orientacion= data['requiere_orientacion'];
                                this.fecha_s= data['fecha_s'];
                                this.fecha_p= data['fecha_p'];
                                this.horario= data['horario'];
                                break;
                            }
                        }
                    }
                    this.selectInstructor();
                    this.selectCurso();
                    
                }
            }
        },
        mounted() {
            this.listarInscripcion(1,this.buscar,this.criterio);
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


