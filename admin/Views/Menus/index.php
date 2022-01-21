<?php include "Views/Templates/header.php" ?>
<!-- Page categorias -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Menus</h1>
</div>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createMenuModal">Nuevo</button>
<?php print_r($categories) ?>
<table class="table" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Categoria</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Img</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody id="dataMenus">
        <!-- Mostrando DATOS desde FUNCIONES.JS -->
    </tbody>
</table>

<!-- Modal Register Menu-->
<div class="modal fade" id="createMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar un menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmMenus">
                    <div class="form-group">
                        <input class="form-control" id="menuName" name="menuName" placeholder="Agrega un menu" type="text" required minlength="3" maxlength="30">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="3" class="form-control" id="menuDesc" name="menuDesc" placeholder="Description:" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="menuImage" class="control-label">Image</label>
                        <input type="file" name="menuImage" id="menuImage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                    </div>
                    <div class="form-group">
							<input type="number" class="form-control" name="menuPrice" Placeholder="Price:" required min="1">
						</div>
                    <div class="form-group">
                        <label for="menuCategorieId">Categorias</label>
                        <select class="form-control" name="menuCategorieId" id="menuCategorieId">
                            <?php 
                                foreach($categories as $categorie ){ ?>
                                    <option value="<?php echo $categorie["categorieId"] ?>"><?php echo $categorie["categorieName"] ?></option>
                            <?php }?>
                        </select>
                    </div>
                   
                    <button type="submit" class="btn btn-sm btn-primary" onclick="createMenu(event);"> Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php" ?>