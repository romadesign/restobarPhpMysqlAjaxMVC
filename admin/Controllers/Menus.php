<?php
class Menus extends Controller
{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION["userType"]) == "1" || empty($_SESSION["username"]) == "admin" ){
            header("location :" .base_url. "Usuarios");
        }
        parent::__construct();
    }

    public function index()
    {
        $categories = $this->model->getCategories();
        $this->views->getView($this, "index", $categories);
    }

    //Get Categorias
    public function Listar()
    {
        $data = $this->model->getMenus();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Create Menus
    public function createMenus()
    {
        //print_r($_POST);
        $menuName = $_POST["menuName"];
        $menuDesc = $_POST["menuDesc"];
        $menuPrice = $_POST["menuPrice"];
        $menuCategorieId = $_POST["menuCategorieId"];
        $menuImage = $_FILES['menuImage']['tmp_name'];
        //Config base64 img
        $menuImageType = pathinfo($menuImage, PATHINFO_EXTENSION);
        $datainage = file_get_contents($menuImage);
        $img_base64 = base64_encode($datainage);
        $img = 'data:image/' . $menuImageType . ';base64,' . $img_base64;


        $data = $this->model->createMenu($menuName, $menuDesc, $menuPrice, $menuCategorieId, $img);
        if ($data == "ok") {
            $msg = "si";
        } else if ($data == "existe") {
            $msg = "La categoria ya existe";
        } else {
            $msg = "Error al crear una nueva categoria";
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Menu Edit
    public function editMenu()
    {
        $menuName = $_POST["editMenuName"];
        $menuDesc = $_POST["editMenuDesc"];
        $menuPrice = $_POST["editMenuPrice"];
        $menuCategorieId = $_POST["editMenuCategorieId"];
        $menuId = $_POST["menuId"];
        $data = $this->model->modifyMenu($menuName, $menuDesc, $menuPrice, $menuCategorieId, $menuId);
        if ($data == "modificado") {
            $msg = "si";
        } else {
            $msg = "Error al editar el usuario";
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Delete Menu
    public function eliminarMenuId($menuId)
    {
        $data = $this->model->deleteMenuId($menuId);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar Menú";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Select MenuId
    public function selectMenuId(int $menuId)
    {
        //Verificamos si nos da e Id seleccionado en el botton
        //print_r($menuId);
        $data = $this->model->selectCategoriaId($menuId);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
