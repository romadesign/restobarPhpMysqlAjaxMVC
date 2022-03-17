<!-- Modal -->
<div class="modal fade" id="frmOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tú pedido</h5>
        <button onclick="location.reload()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="" class="modal-body">
        <form id="frmOrderItemsViews">
          <div class="form-group">
            <input type="hidden" id="orderId" name="orderId">
          </div>

        </form>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Menú</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody id="contenMenu">
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>