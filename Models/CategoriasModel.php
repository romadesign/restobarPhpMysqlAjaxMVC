<?php
class CategoriasModel extends Query
{
    //categories
    private $categorieId;
    private $menuId;
    private $userId;
    private $itemQuantity;
    private $categorieDesc;
    private $categorieImage;

    public function __construct()
    {

        parent::__construct();
    }

    //Get categorias
    public function getCategorias()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->SelectAll($sql);
        return $data;
    }

    public function getUsuario(string $username, string $password)
    {
        $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
        $data = $this->select($sql);
        return $data;
    }

    //Seleccionando menus por categorias
    public function getMenuAndCategories(int $categorieId)
    {
        $this->categorieId = $categorieId;
        // $sql = "SELECT * FROM menu WHERE menuCategorieId = $this->categorieId ";

        //Trae todos información de 2 tablas "menus and categorie por su ID"
        $sql = "SELECT * FROM `menu` INNER JOIN categories on menuCategorieId = categorieId WHERE categorieId = $this->categorieId ";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Seleccionando menus por categorias
    // public function getMenuAndCategories(int $categorieId)
    // {
    //     $this->categorieId = $categorieId;
    //     $sql = "SELECT * FROM menu WHERE menuCategorieId = $this->categorieId ";
    //     $data =  $this->SelectAll($sql);
    //     return $data;
    // }


    //Seleccionando menu por $menuId
    public function getMenuDetails(int $menuId)
    {
        $this->menuId = $menuId;
        $sql = "SELECT * FROM menu WHERE menuId = $this->menuId ";
        $data =  $this->select($sql);
        return $data;
    }

     //Select Categorie
    public function selectMenuIdAddCartItem(int $menuId)
    {
        $sql = "SELECT * FROM `menu` WHERE menuId = $menuId";
        // $sql = "SELECT * FROM `menu` INNER JOIN categories on menuCategorieId = categorieId WHERE categorieId = $this->categorieId ";

        $data = $this->select($sql);
        return $data;
    }



    //Agregando menu al carrito de compras por userLogeado
    public function addMenuCart(int $menuId, int $itemQuantity, int $userId)
    {   
        $this->menuId = $menuId;
        $this->itemQuantity = $itemQuantity;
        $this->userId = $userId;

        $sql = "INSERT INTO viewcart (menuId, itemQuantity, userId) VALUES (?,?,?)";
        $data = array($this->menuId, $this->itemQuantity, $this->userId);
        $resul = $this->insert($sql, $data);
        return $resul;
    }
}
