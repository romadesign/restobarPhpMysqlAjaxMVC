<?php include "Views/Templates/header.php" ?>
<!-- Page categorias -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Menus</h1>
</div>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createCategorieModal">Nuevo</button>

<table class="table" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Categoria</th>
            <th scope="col">Detalle</th>
            <th scope="col">Img</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody id="dataMenus">
        <!-- Mostrando DATOS desde FUNCIONES.JS -->
    </tbody>
</table>



<?php include "Views/Templates/footer.php" ?>