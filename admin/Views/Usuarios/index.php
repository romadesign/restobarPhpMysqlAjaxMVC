<?php include "Views/Templates/header.php" ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
</div>

<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Nuevo</button>

<table class="table" id="tblUsuarios">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Típo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="dataUsers">
      <!-- Mostrando DATOS desde FUNCIONES.JS -->
  </tbody>
</table>



<!-- Modal Register User -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal DELETE-->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalDelete">
     
    </div>
  </div>
</div>

<?php include "Views/Templates/footer.php" ?>