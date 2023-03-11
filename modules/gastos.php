<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  GASTOS FIJOS
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  GASTOS ACUMULADOS
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4 class="h5 mb-0 text-gray-800">Administre Gastos del espacio <b><?php echo ucfirst($espacio);?></b></h4>
      <a href="#" v-on:click="modalGastos" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Agregar
      </a>
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
                <span>Ingresos Feb 2023</span>
              </label>
            </li>
            <li title="Delivery Contents">
              <label for="tab2" role="button">
                <svg viewBox="0 0 24 24">
                  <path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
                </svg><br>
                <span>Ver en Gráfica</span>
              </label>
            </li>
          </ul>
          <!-- <div class="slider"><div class="indicator"></div></div> -->
          <div class="content">
            <section class="section-chart">
              <h2>Ingresos Feb 2023</h2>
              <table class="table table-separate table-hover table-head-custom table-checkable" id="datatable-gastos">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Cantidad</th>
									<th>Espacio</th>
									<th>Categoria</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
						</table>
            </section>
            <section class="section-chart">
              <h2>Ver en Gráfica</h2>
              <canvas id="myChart2"></canvas>
            </section>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Direct
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Social
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Referral
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- ----------------------MODAL AGREGAR/EDITAR INGRESOS -->
    <div class="modal fade" id="modalGastos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
              <form id="formGasto" style="width:94%;">
                <div class="row">
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                      </div>
                      <div class="col-5">
                        <input type="number" class="form-control" name="cantidad" v-model="cantidad">
                      </div>
                      <div class="col-3">
                        <select name="moneda" id="moneda" class="form-select" disabled style="font-size: 10px !important;">
                          <option value="MXN">MXN</option>
                          <option value="USD" >USD</option>
                          <option value="HTS" >HTS</option>
                          <option value="VED" >VED</option>
                          <option value="YGG" >YGG</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Categoria</label>
                      </div>
                      <div class="col-8">
                        <select name="categoria" id="categoria" class="form-control" v-model="categoria">
                          <option value="" disabled>Seleccionar</option>
                          <!-- <option v-for="esp in allEspacios" :value="esp.id_tipoEspacio">{{esp.nombre}}</option> -->
                          <option v-for="cat in allCategorias" :value="cat.id_cGasto">{{cat.nombre}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Fecha</label>
                      </div>
                      <div class="col-8">
                        <input type="datetime-local" name="fecha" class="form-control" v-model="fecha">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 col-6">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label">Espacio</label>
                      </div>
                      <div class="col-8">
                        <select name="espacio" id="espacio" class="form-control" v-model="espacio">
                          <option value="" disabled>Seleccionar</option>
                          <option v-for="esp in allEspacios" :value="esp.id_tipoEspacio">{{esp.nombre}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row d-flex flex-row justify-content-end">
                  <button type="button" style="width:15%;" class="btn btn-secondary m-2" data-dismiss="modal"><span aria-hidden="true">X</span> Cerrar</button>
                  <button type="button" v-on:click="agregarGasto" v-if="!editar" style="width:15%;" class="btn btn-warning m-2"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar</button>
                  <button type="button" v-on:click="editarGasto" v-if="editar" style="width:15%;" class="btn btn-warning m-2"><i class="fas fa-pen fa-sm text-white-50"></i> Editar</button>
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