<?php
class Categorias extends Controller
{

    public function __construct()
    {
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


    public function validarLogin()
    {

        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $msg = "Los campos estan vacios";
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];
            //validation hash password
            $hash = hash("sha256", $password);
            $data =  $this->model->getUsuario($username,  $hash);
            if ($data) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['userType'] = $data['userType'];
                $msg = "ok";
            } else {
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}