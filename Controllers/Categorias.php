<?php
class Categorias extends Controller
{

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $getCategorias = $this->model->getCategorias();
        $this->views->getView($this, "index", $getCategorias);
    }

    public function menuCategorie(int $categorieId)
    {
        $getMenuCategorie = $this->model->getMenuAndCategories($categorieId);
        $this->views->getView($this, "menuCategorie", $getMenuCategorie);
    }

    public function menuDetails(int $menuId)
    {   
        //Para mostrar todos los menus por categorias
        //print_r($menuId);
        $getMenuDetails = $this->model->getMenuDetails($menuId);
        $this->views->getView($this, "menuDetails", $getMenuDetails);
    }

}