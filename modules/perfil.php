<!-- Begin Page Content -->
  <div class="container-fluid">
        <!-- Content Charts -->
    <div class="row">
      <div class="col-12">
        <div class="tabs tabs-perfil" style="background: transparent;">
          <input type="radio" id="general" name="tab-control" checked>
          <input type="radio" id="invitacion" name="tab-control">
          <input type="radio" id="personalizar" name="tab-control">
          <input type="radio" id="privacidad" name="tab-control">
          <div style = "width: 100%;" class="personalizar-tabs">
            <div class="title-section" style="width: 15%;"><span>Mi perfil</span></div>
            <div class="tabs-ul-perfil">
              <label for="general" role="button" class="tabs-li-perfil" title="General">
                <span>General</span>
              </label>
              <label for="invitacion" role="button" class="tabs-li-perfil" title="Invitación">
                <span>Invitación</span>
              </label>
              <label for="personalizar" role="button" class="tabs-li-perfil" title="Personalizar">
                <span>Personalizar</span>
              </label>
              <label for="privacidad" role="button" class="tabs-li-perfil" title="Privacidad">
                <span>Política de Privacidad</span>
              </label>
            </div>
          </div>
          <div class="content">
            <section class="section-chart p-2">
              <h5>Datos de la cuenta</h5>
              <form>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                  <label for="exampleFormControlInput1">Nombre</label>
                  <input type="email" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                  <label for="exampleFormControlInput1">Apellidos</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Correo electrónico</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="imagen-usuario"><img style="width: 100px;" src="./assets/img/profile.png" alt=""></div>
                    <input type="file">
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-10"></div>
                  <div class="col-2"><button class="btn btn-primary">Actualizar Datos</button></div>
                </div>
              </form>
            </section>
            <section class="section-chart">
              <h3>Invitación</h3>
            </section>
            <section class="section-chart">
              <h3>Personalizar</h3>
            </section>
            <section class="section-chart">
              <h3>Privacidad</h3>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->