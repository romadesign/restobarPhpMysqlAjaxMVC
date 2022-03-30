<?php
class OrderManager extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $this->views->getView($this, "index",);
    }

    //Get Categorias
    public function Listar()
    {
        $data = $this->model->getOrders();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Select OrderId
    public function selectStatu(int $orderStatus)
    {
        //Verificamos si nos da e Id seleccionado en el botton
        //  print_r($orderStatus);
        $data = $this->model->selectOrderStatus($orderStatus);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Modification order status
    public function modificarEstadoOrder()
    {
        $orderId = $_POST["orderId"];
        $orderStatus = $_POST["orderStatus"];
        $data = $this->model->modifyOder($orderId, $orderStatus);
        if ($data == "modificado") {
            $msg = "si";
        } else {
            $msg = "Error al editar la cateogira";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Create Delivery Boy Name
    public function createDeliveryName()
    {
        //print_r($_POST);
        $orderId = $_POST["orderIdDelivery"];
        $name = $_POST["name"];
        $time = $_POST["time"];
        $phone = $_POST["phone"];
        $data = $this->model->createDeliveryBoy($orderId, $name, $time, $phone);
        if ($data == "ok") {
            $msg = "si";
        } else {
            $msg = "Error al crear una nueva categoria";
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
