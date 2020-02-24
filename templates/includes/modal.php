<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModaslLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModaslLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="login-errors"  class="text-danger text-center"></div>

       <form action="login.php" method="POST" class="form-group" id="login-form">
          <label for="">Email</label>
          <input type="email" name="email" value="" class="form-control">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control">
          <div class="form-group">
          <input type="text" name="website" class="form-control website-thing">
          </div>
          <input type="submit" class="btn btn-success mt-3" value="submit" name="submit">
       </form>
      </div>
    </div>
  </div>
</div>
<!-- Register Modal Part 1-->
<div class="modal fade" id="register-modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <select name="" id="select-register" class="form-control mb-4" onchange="modalR(this.value)">
            <option value="0">Registar Como</option>
            <option value="1">Empregador</option>
            <option value="2">Empregado</option>
          </select>

          <div id="register-errors" class="text-danger text-center"></div>

          <form action="register.php" method="POST" class="form-group" id="register1-form">
            <div id="employer-inputs" style="display: none;">
                <div class="form-group">
                <label for="">Primeiro Nome<span class="text-danger">*</span></label>
                <input type="text" name="first_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Ultimo Nome<span class="text-danger">*</span></label>
                <input type="text" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Username<span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Empresa<span class="text-danger">*</span></label>
                <input type="text" name="company" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Idade</label>
                <input type="text" name="age" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Nome de contacto</label>
                <input type="text" name="contact_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Email de Contacto</label>
                <input type="text" name="contact_email" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Email de Registo<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Confirmar Password<span class="text-danger">*</span></label>
                <input type="password" name="password_confirm" value="" class="form-control">
                </div>
                <div class="form-group">
                <input type="text" name="website" class="form-control website-thing">
                </div>
                <div class="form-group">
                <input type="hidden" name="chosen_register" value="1">
                </div>
                <div class="form-group">
                <input type="hidden" name="employment_status" value="none">
                </div>
                <input type="submit" class="btn btn-success" value="submit" name="submit_employer">
          </div>
        </form>
        <form action="register.php" method="POST" class="form-group" id="register2-form">
          <div id="employee-inputs" style="display: none;">
          <div class="form-group">
            <label for="">Primeiro Nome<span>*</span></label>
            <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Ultimo Nome<span>*</span></label>
            <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Username<span>*</span></label>
            <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Situação Face ao Emprego</label>
              <select name="employment_status" id="employment-select" class="form-control mb-4">
                <option>Procura Full Time</option>
                <option>Procura Part Time</option>
                <option>Procura Part Time e Full Time</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Idade</label>
              <input type="text" name="age" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Nome de contacto</label>
              <input type="text" name="contact_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Email de Contacto</label>
              <input type="text" name="contact_email" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Email de Registo<span>*</span></label>
            <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Password<span>*</span></label>
            <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Confirmar Password<span>*</span></label>
            <input type="password" name="password_confirm" value="" class="form-control">
            </div>
            <div class="form-group">
            <input type="text" name="website" class="form-control website-thing">
            </div>
            <div class="form-group">
            <input type="hidden" name="chosen_register" value="0">
            </div>
            <div class="form-group">
            <input type="hidden" name="company" value="none">
            </div>
            <input type="submit" class="btn btn-success" value="submit" name="submit_employee">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>