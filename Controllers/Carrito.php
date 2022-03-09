
<?php
class Carrito extends Controller
{

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $userId = $_SESSION['id'];
        $getItemsCarritos = $this->model->getItemsCarritos($userId);
        $this->views->getView($this, "index", $getItemsCarritos);
        //Para mostrar todos los menus por categorias
    }

}