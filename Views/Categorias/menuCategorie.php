<?php include "Views/Templates/header.php"; ?>

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

                        <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddMenuCart" onclick="selectMenuAddCart(<?php echo $value['menuId'] ?>)"> Add Cart </button>

                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAddMenuCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Quieres agregar este menú a tu carrito?</h4>
                <input type="text" class="form-control" id="menuName" name="menuName">
                <input type="text" class="form-control" id="menuPrice" name="menuPrice">
                <form method="POST" id="frmAddCartMenu">
                    <div class="form-group">
                        <input type="hidden" id="menuId" name="menuId">
                        <input type="number" id="itemQuantity" name="itemQuantity">
                    </div>
                    <div class="form-group d-flex ">
                    <button type="button" class="btn btn-success w-100" onclick="addMenuAlCarrito(event)">Agregar</button>
                    <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php echo $_SESSION['username'] ?>

<?php include "Views/Templates/footer.php" ?>