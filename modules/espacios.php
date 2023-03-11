<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4 class="h5 mb-0 text-gray-800">Gestiona tus espacios </h4>
      <div class="opciones-espacio">
        <a href="#" v-on:click="" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
          <i class="fa-solid fa-list-check"></i></i> Configurar
        </a>
        <a href="#" v-on:click="modalEspacios" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50"></i> Agregar
        </a>
      </div>
    </div>

    <div class="row mt-3 mb-3 pt-3 pb-3" style="background: #fff; border-radius: 5px;box-shadow: 0 1em 2em -0.5em rgba(0, 0, 0, 0.1);">
      <div class="col-4" v-for="espacio in espacios">
        <article class="card-espacio">
          <div class="thumb"></div>
          <div class="infos">
            <div class="info-main">
              <div class="d-flex flex-row align-items-center justify-content-between">
                <!-- <h6 class="m-0 font-weight-bold text-primary">{{espacio.nombre}}</h6> -->
                <h6 class="title font-weight-bold" v-bind:title="espacio.descripcion">{{espacio.nombre}}</h6>
                <!-- <p>{{espacio.id_tipoEspacio}}</p> -->
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Espacio {{espacio.nombre}}</div>
                      <a  v-bind:title="'Editar ' + espacio.nombre" class="dropdown-item" href="#" v-on:click="modalEditar(espacio.id_tipoEspacio)">Editar espacio</a>
                        <a class="dropdown-item" href="#">Ver info completa</a>
                      </div>
                  </div>
                </div>
              </div>
              <!-- <h2 class="title">{{espacio.nombre}}<span class="favorite"><input class="star" type="checkbox" title="bookmark page"></span></h2> -->
                <p class="truncate-text">{{espacio.alias}}</p>
                <p>{{espacio.detalles}}</p>
              </div>
            </div>
        </article>
      </div>

       <div class="modal fade" id="modalEspacios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{titulo_modal}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-center">
              <form id="formEspacio" style="width:94%;">
                <div class="row">
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Alias</label>
                      </div>
                      <div class="col-8">
                        <input type="text" class="form-control" name="alias" v-model="alias">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Detalles</label>
                      </div>
                      <div class="col-8">
                        <input type="text" class="form-control" name="detalles" v-model="detalles">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Tipo Espacio</label>
                      </div>
                      <div class="col-8">
                        <select name="espacio" id="espacio" class="form-control" v-model="espacio">
                          <option value="" disabled>Seleccionar</option>
                          <option v-for="esp in allEspacios" :value="esp.id_tipoEspacio">{{esp.nombre}} {{esp.id_tipoEspacio}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row d-flex flex-row justify-content-end">
                  <button type="button" style="width:15%;" class="btn btn-secondary m-2" data-dismiss="modal"><span aria-hidden="true">X</span> Cerrar</button>
                  <button type="button" v-on:click="crearEspacio" v-if="!editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-plus fa-sm text-white-50"></i> Crear</button>
                  <button type="button" v-on:click="editarEspacio" v-if="editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-pen fa-sm text-white-50"></i> Editar</button>
                </div>
              </form>
            </div>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div> -->
        </div>
      </div>
    </div>
    </div>
<!-- /.container-fluid -->