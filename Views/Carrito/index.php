<?php include "Views/Templates/header.php" ?>

<!-- Page categorias -->
<!-- <div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $menuCategorie) { ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $menuCategorie["menuId"] ?></h5>
                    <p class="card-text"><?php echo $menuCategorie["itemQuantity"] ?></p>
                    <p class="card-text"><?php echo $menuCategorie["menuName"] ?></p>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Mí pedido</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Plato</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Price Total</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody id="carritoUser">
                    <tr>

                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-md-4">
            hello
        </div>
    </div>
</div>


<?php echo $_SESSION['username'] ?>
<?php echo $_SESSION['id'] ?>



<!-- Modal -->
<div class="modal fade" id="editMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cantidad del menú seleccionado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" id="frmMenuCantidad">
                    <div class="form-group d-flex">
                        <input type="hidden" id="menuId" name="menuId"> 
						<input type="number" class="form-control" id="edititemQuantity" name="edititemQuantity" Placeholder="Price:" required min="1">
                        <button type="submit" class="btn btn-sm btn-primary" onclick="editCantidad(event)"> Editar </button>
					</div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php" ?>