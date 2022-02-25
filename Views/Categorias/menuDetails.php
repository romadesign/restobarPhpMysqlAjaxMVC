<?php include "Views/Templates/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <img class="image_menu w-100"
                    src="data:image/png;base64,<?php echo base64_encode(file_get_contents($getCategorias["menuImage"])) ?>">
                <h5 class="card-title">Title <?php echo $getCategorias["menuName"] ?></h5>
                <p class="card-text">Descripcion <?php echo $getCategorias["menuDesc"] ?></p>
                <p class="card-text"> Id <?php echo $getCategorias["menuId"] ?></p>
                <p class="card-text"> Precio <?php echo $getCategorias["menuPrice"] ?></p>
                <p class="card-text"> Categoria <?php echo $getCategorias["menuCategorieId"] ?></p>
                <p class="card-text"><?php echo $getCategorias["menuPubDate"] ?></p>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php" ?>