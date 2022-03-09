
<?php
class Carrito extends Controller
{

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    // public function index()
    // {
    //     $userId = $_SESSION['id'];
    //     // $getItemsCarritos = $this->model->getItemsCarritos($userId , $menuId);
    //     $getItemsCarritos = $this->model->getCategorias();
    //     $this->views->getView($this, "index", $getItemsCarritos);
    //     //Para mostrar todos los menus por categorias
    //     print_r($getItemsCarritos);
        

    // }

    public function index()
    {
        $userId = $_SESSION['id'];
        $getItemsCarritos = $this->model->getItemsCarritos($userId);
        $this->views->getView($this, "index", $getItemsCarritos);
        //Para mostrar todos los menus por categorias
    }

}