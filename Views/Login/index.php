<?php include "Views/Templates/header.php" ?>

<form id="frmLogin" class="user">
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Ingrese contraseña">
    </div>
    <div class="alert alert-danger d-none text-center" id="alerta" role="alert">
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit" onclick="frmLogin(event)">
        Login
    </button>
</form>

<?php include "Views/Templates/footer.php" ?>