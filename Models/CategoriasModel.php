<?php 
class CategoriasModel extends Query{
    //categories
    private $categorieId;
    private $categorieName;
    private $categorieDesc;
    private $categorieImage;

    public function __construct()
    {
        parent::__construct();
    }

    //User List
    public function getCategorias()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Select Categorie
    public function selectCategoriaId(int $categorieId)
    {
        $sql = "SELECT * FROM `categories` WHERE categorieId  = $categorieId ";
        $data = $this->select($sql);
        return $data;
    }

   
    //Categorie select
    public function getMenuAndCategories()
    {
        $sql = "SELECT * FROM `menu` WHERE menuCategorieId = 12 ";
        $data = $this->SelectAll($sql);
        return $data;
    }

    

}
