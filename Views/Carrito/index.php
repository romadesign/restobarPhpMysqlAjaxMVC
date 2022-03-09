<?php include "Views/Templates/header.php" ?>

<!-- Page categorias -->
<div class="container">
    <div class="row">
        <?php
        foreach ($getCategorias as $menuCategorie) { ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $menuCategorie["menuId"] ?></h5>
                    <p class="card-text"><?php echo $menuCategorie["itemQuantity"] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div id="menuCategorie">

</div>

<?php echo $_SESSION['username'] ?>
<?php echo $_SESSION['id'] ?>


<?php include "Views/Templates/footer.php" ?>