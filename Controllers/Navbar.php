
<?php
class Navbar extends Controller
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

    //Get Total de items
    public function CantidadItems()
    {
        $userId = $_SESSION['id'];
        $data = $this->model->getCantidadItems($userId);

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Get Message
    public function getMessage()
    {
        $userId = $_SESSION['id'];
        $data = $this->model->getMessageNav($userId);

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

     //Delete message id
     public function eliminarMensajeId($id)
     {
         //Mira si muesta el item seleccionado
         //print_r($menuId);
         $data = $this->model->deleteMessageId($id);
         if ($data == "eliminado") {
             $msg = "ok";
         } else {
             $msg = "Error al elimiar la categoria";
         }
         echo json_encode($msg, JSON_UNESCAPED_UNICODE);
         die();
     }
}
