<?php include "Views/Templates/header.php" ?>

<!-- Page categorias -->
<div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <?php
        foreach ($getCategorias as $menuCategorie) { ?>
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-categoria">
                        <img class="image_menu w-100" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($menuCategorie["categorieImage"])) ?>">
                        <a  class="titulo-menu-categoria" href="<?php echo base_url_user; ?>Categorias/menuCategorie/<?php echo $menuCategorie["categorieId"]; ?>"><?php echo $menuCategorie["categorieName"] ?></a>
                        <a class="button-categoria" href="<?php echo base_url_user; ?>Categorias/menuCategorie/<?php echo $menuCategorie["categorieId"]; ?>">Mirar</a>
                        <div class="fondo-degradado"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div id="menuCategorie">

</div>

<?php include "Views/Templates/footer.php" ?>