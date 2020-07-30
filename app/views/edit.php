 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar Usuario</h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form method="POST" id="editform" action="<?= FOLDER_PATH . '/main/editarusuario' ?>">
                <h6 class="heading-small text-muted mb-4">Información de usuario</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Email Address" name="email" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el email.
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Telefono</label>
                        <input type="text" id="input-phone" class="form-control" placeholder="phone"  name="phone" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el Telefono.
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-dni">Dni</label>
                        <input type="text" id="input-dni" class="form-control" placeholder="dni"  name="dni" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el dni.
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password</label>
                        <input type="password" id="input-password" class="form-control" placeholder="password"  name="password" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el password.
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nombre</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="First name"  name="nombre" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el nombre.
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-apellido">Apellido</label>
                        <input type="text" id="input-last-name" class="form-control" placeholder="Last name"  name="apellido" value=''>
                        <div class="invalid-feedback">
                         Por favor complete el apellido.
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Información Sobre Mi</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">About me</label>
                        <input id="input-about" class="form-control" placeholder="About me..." value="" type="text"  name="about" >
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Información de Contacto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Dirección</label>
                        <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text"  name="address" >
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Ciudad</label>
                        <input type="text" id="input-city" class="form-control" placeholder="City" value=''  name="ciudad" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Pais</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" value='' name="pais" >
                      </div>
                    </div>
                  </div> -->
                </div>
                <hr class="my-4" />
                <input type="hidden" id="input-id" class="form-control" placeholder="id" value='' name="id" >
                <!-- Description -->
                <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div> -->
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submit" type="submit" class="btn btn-primary">Save changes</button>
      </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->