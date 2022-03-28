<!-- Modal -->
<div class="modal fade" id="modalAddMenuCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Quieres agregar este menú a tu carrito?</h5>
                <button id="closeAddQuantityButton" onclick="closeButton(event)" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="errorAddMenu">
            </div>
            <div id="optionsAddCart" class="modal-body">
                <div id="tittle-menu-modal">
                </div>
                <form method="POST" id="frmAddCartMenu" name="frmAddCartMenu">
                    <div class="form-group d-flex ">
                        <input type="hidden" id="menuId" name="menuId">
                        <input type="number" id="itemQuantity" name="itemQuantity" class="w-100">
                        <button type="submit" class="button-add-menu btn btn-success w-100" onclick="addMenuAlCarrito(event)">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>