<!-- Modal -->
<div class="modal fade" id="modalAddMenuCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button id="closeAddQuantityButton" onclick = "closeButton()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="errorAddMenu">
            </div>
            <div id="optionsAddCart" class="modal-body">
                <h4>Quieres agregar este menú a tu carrito?</h4>
                <input type="text" class="form-control" id="menuName" name="menuName">
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