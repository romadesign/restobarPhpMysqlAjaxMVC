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
            <div class="alert-delivery">
               
            </div>
            <div id="content-modal-delivery" class="modal-body">
                <div class="alert alert-primary d-flex justify-content-around" role="alert">
                    <div>
                        <span>0 : Pedido en Lista</span> <br>
                        <span>1 : Pedido confirmado</span> <br>
                        <span>2 : Preparando</span> <br>
                        <span>3 : En camino</span> <br>
                    </div>
                    <div>
                        <span>4 : Delivery</span> <br>
                        <span>5 : Denegado</span> <br>
                        <span>6 : Cancelado</span>
                    </div>
                </div>
                <form method="POST" id="frmStatus">
                    <div class="form-group d-flex justify-content-center">
                        <div>
                            <input type="hidden" id="orderId" name="orderId">
                            <label for="formGroupExampleInput">Order Status</label>
                            <input type="number" class="form-control w-100" id="orderStatus" name="orderStatus" placeholder="Example input" min="0" max="6" required>
                        </div>
                        <div>
                            <label>Cambiar status</label>
                            <button type="button" onclick="editStatusOrder(event)" class="btn btn-primary w-100 btn-sm">Actualizar</button>
                        </div>
                    </div>
                    <span class="options-status">Elija una opción mayor a "0" para poder crear el dato de tu repartidor</span>

                </form>
                <div class="form-group ">
                    <form method="POST" id="frmDetails">
                        <input type="hidden" id="frmOrderId" name="frmOrderId">
                        <input type="hidden" id="frmId" name="frmId">
                        <div class="d-flex">
                            <label for="formGroupExampleInput">Datos del repartidor</label>
                        </div>
                        <input type="text" class="form-control w-100" id="frmName" name="frmName" placeholder="Example input">
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="formGroupExampleInput">Celular: </label>
                                <input type="text" class="form-control w-100" id="frmPhone" name="frmPhone" placeholder="Example input">
                            </div>
                            <div>
                                <label for="formGroupExampleInput">Hora</label>
                                <input type="number" class="form-control w-100" id="frmTime" name="frmTime" placeholder="Example input" min="0" max="120" required>
                            </div>
                        </div> <br>
                        <button onclick="editDeliveryDetails(event)" id="selectDetailsId" class="btn btn-primary" type="button">Actualizar</button>
                    </form>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <form method="POST" id="frmdelivery">

                        <div class="d-flex">
                            <label for="formGroupExampleInput">Crear datos del repartidor</label>
                        </div>
                        <input type="hidden" id="orderIdDelivery" name="orderIdDelivery">
                        <input type="text" class="form-control w-100" id="name" name="name" placeholder="Example input">
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="formGroupExampleInput">Celular: </label>
                                <input type="number" class="form-control w-100" id="phone" name="phone" placeholder="Example input">
                            </div>
                            <div>
                                <label for="formGroupExampleInput">Hora</label>
                                <input type="number" class="form-control w-100" id="time" name="time" placeholder="Example input" min="0" max="120" required>
                            </div>
                        </div> <br>
                        <button onclick="createDeliveryName(event)" class="btn btn-primary" type="button">Crear</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ModalItems -->
<div class="modal fade" id="modalOrderItems" tabindex="-1" aria-labelledby="idOrder" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="idOrder">Lista de items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">MenuId</th>
              <th scope="col">Menú</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody id="contentItemsOrder">
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "Views/Templates/footer.php" ?>