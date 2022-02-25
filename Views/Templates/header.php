<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restobar</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url_user; ?>Assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url_user; ?>Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="collapse-item" href="<?php echo base_url_user; ?>Categorias">Restobar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"
                                    href="<?php echo base_url_user; ?>Categorias/menuCategorie/1">Desayuno</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="<?php echo base_url_user; ?>Categorias/menuCategorie/13">Almuerzo</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-ligth mx-2"><i class="fas fa-shopping-cart"></i></button>
                    <button type="button" class="btn btn-light">Login</button>
                    <button type="button" class="btn btn-light" data-toggle="modal"
                        data-target="#loginModal">Login</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </nav>