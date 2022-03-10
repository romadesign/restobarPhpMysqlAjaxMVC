
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
        $this->views->getView($this, "index");
    }

     //Get listar menus por usuarios
     public function Listar()
     {
        $userId = $_SESSION['id'];
        $data = $this->model->getItemsCarritos(($userId));
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
     }

     //Delete menu User
    public function eliminarMenuId($menuId)
    {
        //Mira si muesta el item seleccionado
        print_r($menuId);
        $data = $this->model->deleteMenuId($menuId);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al elimiar la categoria";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}