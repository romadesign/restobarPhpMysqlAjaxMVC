<?php
class Categorias extends Controller{
    public function __construct()
    {
        session_start();
        // if(empty($_SESSION["userType"]) == "1" || empty($_SESSION["username"]) == "admin" ){
        //     header("location :" .base_url. "Usuarios");
        // }
        parent::__construct();
        
    }

    public function index()
    {   
        //Menu and categorieId
        $getMenuAndCategories = $this->model->getMenuAndCategories();
        $this->views->getView($this, "index", $getMenuAndCategories);
    }

    //Get Categorias
    public function Listar()
    {
       $data = $this->model->getCategorias();
       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
    }


    //Select CategorieId
    public function selectCategoriaId(int $categorieId)
    {   
        //Verificamos si nos da e Id seleccionado en el botton
        //print_r($categorieId);
        $data = $this->model->selectCategoriaId($categorieId);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    
    }

   


}
