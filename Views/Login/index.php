<?php include "Views/Templates/header.php" ?>

<div class="container">
    <div class="row"></div>
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Iniciar Seccion</h1>
                            </div>
                            <form id="frmLogin" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Ingrese contraseña">
                                </div>
                                <div class="alert alert-danger d-none text-center" id="alerta" role="alert">
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit"
                                    onclick="frmLogin(event)">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php" ?>