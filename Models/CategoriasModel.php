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

    //Get categorias
    public function getCategorias()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->SelectAll($sql);
        return $data;
    }
   
    //Seleccionando menus por categorias
    public function getMenuAndCategories($categorieId)
    {
        $sql = "SELECT * FROM `menu` WHERE menuCategorieId = $categorieId ";
        $data = $this->SelectAll($sql);
        return $data;
    }

    

}
