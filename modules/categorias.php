<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4 class="h5 mb-0 text-gray-800">Seleccione categorías para Ingresos o Gastos </b></h4>
      <div class="dropdown">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus fa-sm text-white-50"></i> Agregar
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#" v-on:click="modalCategoriaIng">Categoría de Ingresos</a>
          <a class="dropdown-item" href="#" v-on:click="modalCategoriaGas">Categoría de Gastos</a>
        </div>
      </div>
    </div>

    
    <!-- Content Charts -->
    <div class="row">
      <div class="col-12">
        <div class="tabs">
          <input type="radio" id="tab1" name="tab-control" checked>
          <input type="radio" id="tab2" name="tab-control">
          <ul>
            <li title="Features">
              <label for="tab1" role="button">
                <svg viewBox="0 0 24 24">
                  <path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                </svg><br>
                <span>Ingresos</span>
              </label>
            </li>
            <li title="Delivery Contents">
              <label for="tab2" role="button">
                <svg viewBox="0 0 24 24">
                  <path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
                </svg><br>
                <span>Gastos</span>
              </label>
            </li>
          </ul>
          <!-- <div class="slider"><div class="indicator"></div></div> -->
          <div class="content">
            <section class="section-chart">
              <h2>Ingresos</h2>
                <table class="table table-separate table-hover table-head-custom table-checkable" id="datatable-categorias-ingresos" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Icono</th>
                    <th>Color</th>
                    <th>Editar</th>
                    <th>Archivar</th>
                  </tr>
                </thead>
				      </table>
            </section>
            <section class="section-chart">
              <h2>Gastos</h2>
              <table class="table table-separate table-hover table-head-custom table-checkable" id="datatable-categorias-gastos" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Icono</th>
                    <th>Color</th>
                    <th>Editar</th>
                    <th>Archivar</th>
                  </tr>
                </thead>
						  </table>
            </section>
          </div>
        </div>
      </div>
    </div>

        <!-- ----------------------MODAL AGREGAR/EDITAR INGRESOS -->
    <div class="modal fade" id="modalCategoriaIng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content" style="height: 80vh;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{titulo_modal}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-center">
              <form id="formCatIng" style="width: 94%">
                <div class="row">
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="text" class="form-control" name="nombre" v-model="nombre">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label">Descripción</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="text" class="form-control" name="descripcion" v-model="descripcion">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-12 col-12" style>
                        <label for="exampleInputEmail1" class="form-label">Color de la Categoria</label>
                      </div>
                      <div class="col-lg-3 col-3">
                        <div id="parent" style="margin-top:10px;width:150px;height:180px;border-radius:10px;cursor:pointer;" class="d-flex align-items-center justify-content-center">
                        <span class="text-white">Seleccionar </span><i class='bx bxs-hand-up' style="font-size:24px;color:white;" ></i>
                        </div>
                        <input type="hidden" class="form-control" id="colorIngreso" v-model="colorIngreso" name="colorIngreso">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-12 col-12">
                        <label for="exampleInputEmail1" class="form-label">Icono de la Categoria</label>
                      </div>
                      <div class="col-lg-12 col-12">
                        <div class="d-flex align-items-center justify-content-center" style="width:100%; height:40px; color:white; border-radius:5px; cursor:pointer;" id="btn_seleccionar" title="Seleccionar Icono">Seleccionar Ícono</div>
                        <div id="output">
                          <input type="hidden" class="form-control" id="iconoIngreso" v-model="iconoIngreso" name="iconoIngreso">
                          <!-- <pre><code class="demo-output-json" id="output-json"></code></pre> -->
                          <div class="d-flex justify-content-center mt-5" style="font-size:70px;" v-html="icon_seleccionado"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row d-flex flex-row justify-content-end">
                  <button type="button" style="width:15%;" class="btn btn-secondary m-2" data-dismiss="modal"><span aria-hidden="true">X</span> Cerrar</button>
                  <button type="button" v-on:click="agregarCategoriaIng" v-if="!editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar</button>
                  <button type="button" v-on:click="editarCategoriaIng" v-if="editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-pen fa-sm text-white-50"></i> Editar</button>
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
    <div class="modal fade" id="modalCategoriaGas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content" style="height:80vh;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{titulo_modal}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-center">
              <form id="formCatGas" style="width:94%;">
                <div class="row">
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="text" class="form-control" name="nombre_gas" v-model="nombre_gas">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label">Descripción</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="text" class="form-control" name="descripcion_gas" v-model="descripcion_gas">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-12 col-12">
                        <label for="exampleInputEmail1" class="form-label">Color de la Categoria</label>
                      </div>
                      <div class="col-lg-3 col-3">
                        <div id="parent2" style="margin-top:10px;width:150px;height:180px;border-radius:10px;cursor:pointer;" class="d-flex align-items-center justify-content-center">
                        <span class="text-white">Seleccionar </span><i class='bx bxs-hand-up' style="font-size:24px;color:white;" ></i>
                        </div>
                        <input type="hidden" class="form-control" id="colorGasto" v-model="colorGasto" name="colorGasto">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-lg-6 col-12">
                    <div class="row">
                      <div class="col-lg-12 col-12">
                        <label for="exampleInputEmail1" class="form-label">Icono de la Categoria</label>
                      </div>
                      <div class="col-lg-12 col-12">
                        <div class="d-flex align-items-center justify-content-center" style="width:100%; height:40px; color:white; border-radius:5px; cursor:pointer;" id="btn_seleccionar2" title="Seleccionar Icono">Seleccionar ícono</div>
                        <div id="output2">
                          <input type="hidden" class="form-control" id="iconoGasto" v-model="iconoGasto" name="iconoGasto">
                          <!-- <pre><code class="demo-output-json" id="output-json"></code></pre> -->
                          <div class="d-flex justify-content-center mt-5" style="font-size:70px;" v-html="icon_seleccionado"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row d-flex flex-row justify-content-end">
                  <button type="button" style="width:15%;" class="btn btn-secondary m-2" data-dismiss="modal"><span aria-hidden="true">X</span> Cerrar</button>
                  <button type="button" v-on:click="agregarCategoriaGas" v-if="!editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar</button>
                  <button type="button" v-on:click="editarCategoriaGas" v-if="editar" style="width:15%;" class="btn btn-primary m-2"><i class="fas fa-pen fa-sm text-white-50"></i> Editar</button>
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