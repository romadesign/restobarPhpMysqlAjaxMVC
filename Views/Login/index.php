<?php include "Views/Templates/header.php" ?>

<div class="container">
<div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="content-form-login">
        <form id="frmLogin" class="user">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Ingrese contraseña">
            </div>
            <div class="alert alert-danger d-none text-center" id="alerta" role="alert">
            </div>
            <button class="btn btn-primary btn-user btn-block w-100" type="submit" onclick="frmLoginn(event)">
                Login
            </button>
            <button class="button-register-login btn-user btn-block w-100 mt-2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerUser">
                Registrar
            </button>
        </form>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php" ?>