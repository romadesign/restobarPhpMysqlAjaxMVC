<?php include "Views/Templates/header.php" ?>
<!-- Page categorias -->
<div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $menuCategorie) { ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <img class="image_menu w-100"
                        src="data:image/png;base64,<?php echo base64_encode(file_get_contents($menuCategorie["categorieImage"])) ?>">
                    <h5 class="card-title"><?php echo $menuCategorie["categorieName"] ?></h5>
                    <p class="card-text"><?php echo $menuCategorie["categorieDesc"] ?></p>
                    <a class="btn btn-primary"
                        href="<?php echo base_url_user; ?>Categorias/menuCategorie/<?php echo $menuCategorie["categorieId"]; ?>">Mirar
                        los menús</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>




<?php include "Views/Templates/footer.php" ?>