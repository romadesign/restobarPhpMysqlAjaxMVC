<?php
class Categorias extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
        
    }

    public function index()
    {   
        //Menu and categorieId
        $getCategorias = $this->model->getCategorias();
        $this->views->getView($this, "index", $getCategorias);
    }

    public function menus($categorieId)
    {   
        //Para mostrar todos los menus por categorias
        //getMenuAndCategories
        //print_r($categorieId);
        $data = $this->model->getMenuAndCategories($categorieId);
        print_r($data);

        $this->views->getView($this, "menus");
        
    }

       


}
