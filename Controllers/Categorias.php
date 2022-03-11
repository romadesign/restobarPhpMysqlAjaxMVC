
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
        //Para mostrar todos los menus por categorias
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



    //Select Categorie
    public function selectMenuIdAddCart(int $menuId)
    {
        //Verificamos si nos da e Id seleccionado en el botton
        //print_r($categorieId);
        $data = $this->model->selectMenuIdAddCartItem($menuId);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }



    public function ingresarMenuAlCarrito()
    {
        $menuId = $_POST["menuId"];
        $itemQuantity = $_POST["itemQuantity"];
        $userId = $_SESSION["id"];

        $data = $this->model->addMenuCart($menuId, $itemQuantity, $userId);
        if ($data == "1") {
            $msg = "si";
        }else {
            $msg = "Error al crear una nueva categoria";
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
