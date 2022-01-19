<?php include "Views/Templates/header.php" ?>
<!-- Page categorias -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
</div>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createCategorieModal">Nuevo</button>

<table class="table" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Detalle</th>
            <th scope="col">Img</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody id="dataCategories">
        <!-- Mostrando DATOS desde FUNCIONES.JS -->
    </tbody>
</table>


<!-- Modal Create Categorie -->
<div class="modal fade" id="createCategorieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCategoria">
                    <div class="form-group">
                        <input class="form-control" id="categorieName" name="categorieName" placeholder="Elija un titulo para la categoria" type="text" required minlength="3" maxlength="11">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="3" class="form-control" id="categorieDesc" name="categorieDesc" placeholder="Description:" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        <input type="file" name="categorieImage" id="categorieImage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" onclick="createCategoria(event);"> Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php" ?>