<?php include "Views/Templates/header.php" ?>
<!-- Page categorias -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detalles del Pedido</h1>
</div>
<table class="table" id="tblPedidos">
    <thead class="thead-dark">
        <tr>
            <th scope="col">OrderId</th>
            <th scope="col">UserId</th>
            <th scope="col">Dirección</th>
            <th scope="col">Telefono</th>
            <th scope="col">Precio</th>
            <th scope="col">Payment</th>
            <th scope="col">Fecha</th>
            <th scope="col">Status</th>
            <th scope="col">Items</th>
        </tr>
    </thead>
    <tbody id="dataPedidos">
        <!-- Mostrando DATOS desde FUNCIONES.JS -->
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estado del pedido y detalles de entrega</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                    <span>0 : Pedido en Lista</span> <br>
                    <span>1 : Pedido confirmado</span> <br>
                    <span>2 : Preparando</span> <br>
                    <span>3 : En camino</span> <br>
                    <span>4 : Delivery</span> <br>
                    <span>5 : Denegado</span> <br>
                    <span>6 : Cancelado</span>
                </div>
                <form method="POST" id="frmStatus">
                    <div class="form-group d-flex justify-content-center">
                        <div>
                            <input type="hidden" id="orderId" name="orderId">
                            <label for="formGroupExampleInput">Order Status</label>
                            <input type="number" class="form-control w-100" id="orderStatus" name="orderStatus"  placeholder="Example input" min="0" max="6" required>
                        </div>
                        <div>
                            <label>Cambiar status</label>
                            <button type="button" onclick="editStatusOrder(event)" class="btn btn-primary w-100 btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-body" id="content-delivery">
            <form method="POST" id="frmDelivery">
                    <div class="text-left my-2">
                    <b><label for="name">Delivery Boy Name</label></b>
                    <input class="form-control" id="name" name="name"  type="text" required>
                </div>
                <div class="text-left my-2 row">
                    <div class="form-group col-md-6">
                        <b><label for="phone">Phone No</label></b>
                        <input class="form-control" id="phone" name="phone"  type="tel" required pattern="[0-9]{10}">
                    </div>
                    <div class="form-group col-md-6">
                        <b><label for="catId">Estimate Time(minute)</label></b>
                        <input class="form-control" id="time" name="time" type="number" min="1" max="120" required>
                    </div>
                </div>
                <input type="hidden" id="trackId" name="trackId">
                <input type="hidden" id="orderIdDelivery" name="orderIdDelivery" >
                <button onclick="createDeliveryName(event)" type="submit" class="btn btn-success" name="updateDeliveryDetails">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>



<?php include "Views/Templates/footer.php" ?>