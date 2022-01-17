<?php include "Views/Templates/header.php" ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
</div>

<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
<table class="table" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Típo</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody id="dataUsers">
        <!-- Mostrando DATOS desde FUNCIONES.JS -->
    </tbody>
</table>


<!-- Modal Register User -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" id="frmUsuario">
                        <div class="form-group">
                            <input class="form-control" id="username" name="username"
                                placeholder="Elija un nombre de usuario único" type="text" required minlength="3"
                                maxlength="11">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Ingrese su apellido" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Ingrese un correo" required>
                        </div>
                        <div class="form-group row my-0">
                            <div class="form-group col-md-6 my-0">
                                <b><label for="phone">Celular:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+64</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Ingrese el número de teléfono" required maxlength="9">
                                </div>
                            </div>
                            <div class="form-group col-md-6 my-0">
                                <b><label for="userType">Type:</label></b>
                                <select name="userType" id="userType" class="custom-select browser-default" required>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <b><label for="password">Contraseña:</label></b>
                            <input class="form-control" id="password" name="password"
                                placeholder="Ingrese una contraseña" type="password" required data-toggle="password"
                                minlength="4" maxlength="21">
                        </div>
                        <div class="form-group">
                            <b><label for="password1">Renter Contraseña:</label></b>
                            <input class="form-control" id="cpassword" name="cpassword" placeholder="Repita la conseña"
                                type="password" required data-toggle="password" minlength="4" maxlength="21">
                        </div>
                    <button type="submit" class="btn btn-sm btn-primary" onclick="userRegister(event);"> Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Edit User -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" id="frmEditUsuario">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <input class="form-control" id="editUsername" name="editUsername"
                                placeholder="Elija un nombre de usuario único" type="text" required minlength="3"
                                maxlength="11">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editFirstName" name="editFirstName"
                                placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editLastName" name="editLastName"
                                placeholder="Ingrese su apellido" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="editEmail" name="editEmail"
                                placeholder="Ingrese un correo" required>
                        </div>
                        <div class="form-group row my-0">
                            <div class="form-group col-md-6 my-0">
                                <b><label for="phone">Celular:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+64</span>
                                    </div>
                                    <input type="tel" class="form-control" id="editPhone" name="editPhone"
                                        placeholder="Ingrese el número de teléfono" required maxlength="9">
                                </div>
                            </div>
                            <div class="form-group col-md-6 my-0">
                                <b><label for="userType">Type:</label></b>
                                <select name="editUserType" id="editUserType" class="custom-select browser-default" required>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-sm btn-primary" onclick="modificarUsuario(event);"> Editar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>




    <?php include "Views/Templates/footer.php" ?>