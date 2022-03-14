<!-- Modal -->
<div class="modal fade" id="registerUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmNewUsuario">
                    <div class="form-group">
                        <input class="form-control" id="username" name="username" placeholder="Nombre de usuario" type="text" required minlength="3" maxlength="11">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Ingrese su apellido" required>
                    </div>

                    <div class="form-group col-md-12 row my-0">
                        <div class="form-group col-md-6 my-0">
                            <b><label for="phone">Celular:</label></b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+34</span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ingrese el número de teléfono" required maxlength="9">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b><label for="phone">Típo</label></b>
                            <select name="userType" id="userType" class="form-select" aria-label="Default select example" required>
                                <option value="1">user</option>
                            </select>
                        </div>
                        <div>
                            <b><label for="phone">Correo:</label></b>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese un correo" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="password">Contraseña:</label></b>
                        <input class="form-control" id="password" name="password" placeholder="Ingrese una contraseña" type="password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>
                    <div class="form-group">
                        <b><label for="password1">Repetír Contraseña:</label></b>
                        <input class="form-control" id="cpassword" name="cpassword" placeholder="Repita la conseña" type="password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" onclick="userRegister(event);"> Crear cuenta </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>