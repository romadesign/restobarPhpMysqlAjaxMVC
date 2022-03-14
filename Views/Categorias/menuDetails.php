<?php 
include "Views/Templates/header.php"; 
include "Views/Templates/AddMenuAlCarrito.php"; 

?>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <img class="image_menu w-100" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($getCategorias["menuImage"])) ?>">
                    </div>
                    <div class="col-md-4">
                        <p class="card-text"> Id <?php echo $getCategorias["menuId"] ?></p>
                        <h5 class="card-title">Title <?php echo $getCategorias["menuName"] ?></h5>
                        <p class="card-text">Descripcion <?php echo $getCategorias["menuDesc"] ?></p>
                        <p class="card-text"> Precio <?php echo $getCategorias["menuPrice"] ?> € </p>
                        <p class="card-text"> Categoria <?php echo $getCategorias["menuCategorieId"] ?></p>
                        <p class="card-text"><?php echo $getCategorias["menuPubDate"] ?></p>
                        <?php 
                        if(isset($_SESSION['username'])){ ?>
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddMenuCart" onclick="selectMenuAddCart(<?php echo $getCategorias['menuId'] ?>)"> Add Cart </button>
                        <?php
                        } ?>

                        <div class="mx-4">
                            <a href="<?php echo base_url_user; ?>Categorias/menuCategorie/<?php echo $getCategorias["menuCategorieId"] ?>" class="active text-dark">
                                <i class="fas fa-qrcode"></i>
                                <span>Más platos</span>
                            </a>
                        </div>
                        <div class="mx-4">
                            <a href="<?php echo base_url_user ?>Categorias" class="active text-dark">
                                <i class="fas fa-qrcode"></i>
                                <span>Todas las Categorias</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php" ?>