
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
}
