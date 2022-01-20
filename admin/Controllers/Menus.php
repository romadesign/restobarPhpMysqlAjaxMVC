<?php
class Menus extends Controller{
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
        $this->views->getView($this, "index");
    }

    //Get Categorias
    public function Mostrar()
    {
       $data = $this->model->getMenus();
       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
    }

}
