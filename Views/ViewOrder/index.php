<?php 
include "Views/Templates/header.php";
include "Views/Templates/StatusOrder.php";
include "Views/Templates/OrderItemModal.php";
?>

<div class="container">
    <div class="row content">
        <div class="col-sm-6">
            <h2>Detalles del <b>pedido</b></h2>
        </div>
        <div class="col-sm-6 text-end">
            <a href="" class="btn btn-primary">
                <i class="fas fa-spinner"></i>
                <span>Actualizar
                    lista</span></a>
            <a href="#" onclick="window.print()" class="btn btn-info">
                <i class="fas fa-print"></i>
                <span>Imprimir</span></a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha de pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Items</th>
                </tr>
            </thead>
            <tbody id ="viewsOrder">
                <tr>
                   
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "Views/Templates/footer.php" ?>