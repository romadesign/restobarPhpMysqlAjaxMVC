<?php include "Views/Templates/header.php" ?>

<!-- Page categorias -->
<!-- <div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $menuCategorie) { ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $menuCategorie["menuId"] ?></h5>
                    <p class="card-text"><?php echo $menuCategorie["itemQuantity"] ?></p>
                    <p class="card-text"><?php echo $menuCategorie["menuName"] ?></p>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Mí pedido</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Plato</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Price Total</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody  id="carritoUser">
                    <tr >
                       
                    </tr>
                </tbody>
            </table>
          
        </div>
        <div class="col-md-4">
            hello
        </div>
    </div>
</div>


<?php echo $_SESSION['username'] ?>
<?php echo $_SESSION['id'] ?>


<?php include "Views/Templates/footer.php" ?>