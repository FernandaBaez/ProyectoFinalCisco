<template>
<div>
  

   <div class="container">

      
 
     <div class="row">
    <div class="col-md-3 ">
      <form id="searchForm" action="#" role="search">
                      <input type="search" placeholder="Buscar contacto ..."  v-model="buscar"  @keyup.enter="listarTicket(1,buscar,criterio)" class="form-control" >
       </form>
       <button type="submit" @click="listarTicket(1,buscar,criterio)"  class="btn btn-gradient-03 mr-1 mb-2 btn-sm" ><i class="fa fa-search"></i> Buscar</button>
       <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Lista de mensajes</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr v-for="ticket in arrayTicket" :key="ticket.id">
                                    <!--<td v-text="ticket.id_contacto"></td>-->
                                    <td v-text="ticket.asunto"> </td>
                                    <td>    
                                        <li class="list-inline-item mr-3">
                                            <a @click="listarMensaje(1,ticket.id,criterio)"> 
                                                <i class="la la-eye la-2x"></i>
                                            </a>
                                        </li>
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
          
    
               
    <div class="col-md-9 ">
      
      
      
                      <!-- Begin Card -->
      <div class="card w-100 no-bg">
                          <!-- Begin Tab -->
            <div class="tab-content">
                              <!-- Begin Tab 1 (Show) -->
                <div class="tab-pane fade show active messages-scroll auto-scroll" style="flex: 1 1" id="msg-1">
              <div class="card-header">
                  <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                      <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                        <div class="discussion-name">Brandon Smith</div>
                      </div>
                      <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                              <ul class="list-inline">
                                                  
                                                  <li class="list-inline-item mr-3">
                                                      <a @click="abrirModal('ticket', 'registrar')"> 
                                                          <i class="la la-envelope la-2x"></i>
                                                      </a>
                                                  </li>
                                              </ul>
                      </div>
                  </div>
              </div>
              <div class="card-body d-flex flex-column no-padding">
                  <div class="container-fluid">
                      <!--
                      <div class="row m-0">
                          <div class="message-card">
                              <div class="card-body sender-background">
                                  <span>Hi, Brandon</span>
                              </div>
                                              <span class="sender-time"><small>14:00</small></span>
                          </div>
                      </div>
                    
                      <div class="row m-0 justify-content-end">
                          <div class="message-card">
                              <div class="card-body receiver-background">
                                  <span>Hello, David</span>
                              </div>
                                              <span class="receiver-time"><small>14:02</small></span>
                          </div>
                                   
                      </div>
                      <div class="row m-0 justify-content-end">
                          <div class="message-card">
                              <div class="card-body receiver-background">
                                  <span>What's up?</span>
                              </div>
                                              <span class="receiver-time"><small>14:03</small></span>
                          </div>
                                  
                      </div>
                      <div class="row m-0">
                          <div class="message-card">
                              <div class="card-body sender-background">
                                  <span>I need to talk to you to simulate content</span>
                              </div>
                                              <span class="sender-time"><small>14:10</small></span>
                          </div>
                      </div>
                      <div class="row m-0">
                          <div class="message-card">
                              <div class="card-body sender-background">
                                  <span>Because we do not really exist, did you know?</span>
                              </div>
                                              <span class="sender-time"><small>14:12</small></span>
                          </div>
                      
                  </div>
                    -->
                    
                          <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <tbody>
                          <tr v-for="mensaje in arrayMensaje" :key="mensaje.id">
                                    <!--<td v-text="ticket.id_contacto"></td>-->
                            <div class="row m-0">
                               <div class="message-card">
                                 <div class="card-body sender-background">
                                    <td v-text="mensaje.msj"> </td>
                                    
                                 </div>
                                 <span class="sender-time"><small><td v-text="mensaje.fecha"> </td></small></span>
                                </div>
                               </div>
                            
                            
                        </tr>
                    </tbody>
                </table>
            </div>
      
                    
                    
                    
                   </div>
              </div>
                  </div><!-- End Tab 1 -->
                         
                          </div>
                          <!-- End Tab -->
                          <!-- Begin Input Group -->
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <button class="btn" type="button">
                                      <i class="la la-paperclip la-2x text-primary"></i>
                                  </button>
                              </span>
                              <input type="text" class="form-control no-ppading-right no-padding-left" placeholder="Type your message ..." v-model="msj">
                              <span class="input-group-btn">
                                  <button class="btn" type="button"  @click="agregarMensaje()">
                                      <i class="la la-paper-plane la-2x text-primary"></i>
                                  </button>
                              </span>
                          </div>
                          <!-- End Input Group -->
                      </div>
                      <!-- End Card -->
								   
          
          
      <!--divs de row--->    
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
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Asunto</label>
                          <div class="col-lg-5">
                              <input type="text" class="form-control" placeholder="asunto" v-model="asunto" required>
                          </div>
                      </div>
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Para *</label>
                          <div class="col-lg-5">
                              <div class="select">
                                  <select class="custom-select form-control" v-model="id_contacto" required>
                                  <option value="0" disabled>Seleccione</option>
                                  <option v-for="contacto in arrayContacto" :key="contacto.id" :value="contacto.id" v-text="contacto.nombre"></option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Porfavor selecciona una opcion
                                  </div>
                              </div>
                          </div>
                        
                      </div>
                      
                  </form>
                  </div>
              </div>
                  
                  
          
                <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" @click="cerrarModal()">Cerrar</button>
                        <button type="button"  class="btn btn-gradient-01" @click="registrarTicket()">Enviar mensaje</button>
                    
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
            asunto :'', 
            id_contacto : '',
            msj : '',
            fecha : '',
            id_ticket : '',
            arrayTicket: [],
            modal: 0,
            tituloModal: '',
            arrayContacto: [],
            arrayMensaje: [],
            pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
           offset : 3,
           criterio : 'id_contacto',
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
          listarTicket(page,buscar,criterio){
            let me=this;
            var url= '/ticket?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            
            axios.get(url).then(function (response) {
              var respuesta= response.data;
              me.arrayTicket = respuesta.tickets.data;
              me.pagination= respuesta.pagination;
            })
            .catch(function (error) {
              // handle error
              console.log(error.response);
            });
          },
          listarMensaje(page,buscar,criterio){
            let me=this;
            var url= '/mensaje?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            
            axios.get(url).then(function (response) {
              var respuesta= response.data;
              me.arrayMensaje = respuesta.mensajes.data;
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
              me.listarTicket(page,buscar,criterio);
          },
          registrarTicket(){
            
            /*if(this.validarUsuario()){
              return;
            }*/
            
            let me=this;
            axios.post('/ticket/registrar',{
              'asunto': this.asunto,
              'id_contacto': this.id_contacto
              
            }).then(function (response) {
              me.cerrarModal();
              me.listarTicket(1,'','id_contacto');
            }).catch(function (error) {
              // handle error
              console.log(error.response);
            });
          },
          agregarMensaje(){
            
            /*if(this.validarUsuario()){
              return;
            }*/
            
            let me=this;
            axios.post('/mensaje/registrar',{
             // 'id_ticket': this.arrayTicket['id'],
               'id_ticket': this.id_ticket,
              'msj': this.msj,
              'fecha': this.fecha
              
            }).then(function (response) {
              me.cerrarModal();
              me.listarTicket(1,'','id_contacto');
            }).catch(function (error) {
              // handle error
              console.log(error.response);
            });
          },
          cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.asunto = '';
            this.id_usuario = '';
            this.errorUsuario = 0;
          },
          selectContacto(){
                let me=this;
                var url= '/contacto/selectContacto';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayContacto = respuesta.contactos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
          abrirModal(modelo, accion, data = [] ){
            switch(modelo){
              case "ticket":
                {
                  
                  switch(accion){
                    case "registrar":
                      {
                          this.modal = 1;
                          this.asunto = '';
                          this.id_contacto = '';
                          this.tituloModal = 'Enviar mensaje'
                          this.tipoAccion = 1;
                        break;
                      }
                  }
                }
                this.selectContacto();
            }
          }
          
        },
        mounted() {
           this.listarTicket(1,this.buscar,this.criterio);
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

