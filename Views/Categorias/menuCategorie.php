<?php 
include "Views/Templates/header.php"; 
include "Views/Templates/Login.php"; 
include "Views/Templates/AddMenuAlCarrito.php"; 
?>

<div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $value) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img class="image_menu w-100" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($value["menuImage"])) ?>">
                        <h5 class="card-title"><?php echo $value["menuName"] ?></h5>
                        <p class="card-text"><?php echo $value["menuDesc"] ?></p>
                        <a class="btn btn-primary" href="<?php echo base_url_user; ?>Categorias/menuDetails/<?php echo $value["menuId"]; ?>">Detalle</a>

                        <?php 
                        if(isset($_SESSION['username'])){ ?>
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddMenuCart" onclick="selectMenuAddCart(<?php echo $value['menuId'] ?>)"> Add Cart </button>
                        <?php
                        }else { ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Addddd Cart
                            </button>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>







<?php include "Views/Templates/footer.php" ?>