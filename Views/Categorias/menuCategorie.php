<?php 
include "Views/Templates/header.php"; 
include "Views/Templates/Login.php"; 
include "Views/Templates/AddMenuAlCarrito.php"; 
?>

<div class="container">
    <div class="row content">
        <?php
        foreach ($getCategorias as $value) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-categoria-menu">
                        <img class="image_menu w-100" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($value["menuImage"])) ?>">
                        <a  class="titulo-menu-categoria" href="<?php echo base_url_user; ?>Categorias/menuDetails/<?php echo $value["menuId"]; ?>"><?php echo $value["menuName"] ?></a>
                        <!-- <p class="card-text"><?php echo $value["menuDesc"] ?></p> -->
                        <!-- <a class="btn btn-primary" href="<?php echo base_url_user; ?>Categorias/menuDetails/<?php echo $value["menuId"]; ?>">Detalle</a> -->
                        <?php 
                        if(isset($_SESSION['username'])){ ?>
                            <button type="submit" class="button-categoria-menu" data-bs-toggle="modal" data-bs-target="#modalAddMenuCart" onclick="selectMenuAddCart(<?php echo $value['menuId'] ?>)"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                        <?php
                        }else { ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="button-categoria-menu" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>
                        <?php
                        } ?>
                        <div class="fondo-degradado"></div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>







<?php include "Views/Templates/footer.php" ?>