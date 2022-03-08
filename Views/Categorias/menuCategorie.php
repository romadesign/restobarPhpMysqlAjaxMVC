<?php include "Views/Templates/header.php"; ?>

<div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $value) { ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img class="image_menu w-100"
                        src="data:image/png;base64,<?php echo base64_encode(file_get_contents($value["menuImage"])) ?>">
                    <h5 class="card-title"><?php echo $value["menuName"] ?></h5>
                    <p class="card-text"><?php echo $value["menuDesc"] ?></p>
                    <a class="btn btn-primary"
                        href="<?php echo base_url_user; ?>Categorias/menuDetails/<?php echo $value["menuId"]; ?>">Detalle</a>
                    <a class="btn btn-success"
                        href="<?php echo base_url_user; ?>Categorias/menuDetails/<?php echo $value["menuId"]; ?>">Add
                        cart</a>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<?php echo $_SESSION['username'] ?>

<?php include "Views/Templates/footer.php" ?>