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
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url_user; ?>Assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url_user; ?>Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <?php include_once('Register.php') ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="collapse-item" href="<?php echo base_url_user; ?>Categorias">Restobar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url_user; ?>Categorias/menuCategorie/1">Desayuno</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url_user; ?>Categorias/menuCategorie/13">Almuerzo</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <?php
                $login = isset($_SESSION['username']);
                if ($login == "") { ?>
                    <div class="d-flex">
                        <a class="dropdown-item" href="<?php echo base_url_user; ?>Carrito">
                            <i class="fas fa-shopping-cart"></i>
                            <i id="navBarQuantityMenu" class="bi bi-cart">0</i>
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url_user; ?>Login">Login</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerUser">
                            Registrar
                        </button>

                    </div>
                <?php } else { ?>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <a id="navBarQuantityMenuCant" class="dropdown-item" href="<?php echo base_url_user; ?>Carrito">

                        </a>
                        <!-- Message -->
                        <div class="icon-badge-container d-flex align-items-center">
                            <a id="totalMessage" class="d-flex justify-content-center align-items-center dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminReply">
                                    
                                    
                            </a>
                        </div>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url_user ?>ViewOrder">
                                        <i class="fa fa-file-text" aria-hidden="true"></i></i>
                                        Pedidos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url_user ?>Login/salir">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar Sessión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php }
                ?>



            </div>
        </div>
    </nav>