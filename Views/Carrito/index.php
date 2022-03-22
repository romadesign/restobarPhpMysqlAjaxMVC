<?php 
include "Views/Templates/header.php";
include "Views/Templates/CheckoutModal.php";
 ?>
<?php
if(isset($_SESSION['username'])){?>
    <div class="container">
        <div class="row content">
        <div class="alert alert-primary" role="alert">
        Info! El pago en línea está actualmente deshabilitado, así que elija contra reembolso. 
        </div>
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
             <h3> RESUMEN DE PEDIDO</h3>
            <div class="card wish-list mb-3">
                <div class="pt-4 border bg-light rounded p-3">
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">
                            Precio total<span id="total"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">
                            Transporte<span>0 €</span></li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                            <div>
                                <strong>La cantidad total de</strong>
                                <strong>
                                    <p class="mb-0">(incluidos impuestos y cargos)</p>
                                </strong>
                            </div>
                            <span><strong id="totalfinal"></strong></span>
                        </li>
                    </ul>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Contra reembolso
                        </label>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                        Realizar Pedido
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php
}else{?>
    <div class="alert alert-info" role="alert">
        Tienes que iniciar sección <a href="<?php echo base_url_user ?>Login" class="text-warning stretched-link">Login</a>
    </div>
<?php
}?>

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