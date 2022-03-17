
<?php
class ViewOrder extends Controller
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

    //Get listar orders Users
    public function ListarOrders()
    {
        $userId = $_SESSION['id'];
        $data = $this->model->getViewsOrder(($userId));
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Sele
    //Select Categorie
    public function selectItemsOrders(int $orderId)
    {   
        $userId = $_SESSION['id'];
        //Verificamos si nos da e Id seleccionado en el botton
        $data = $this->model->getOrdersItems($orderId, $userId );
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
