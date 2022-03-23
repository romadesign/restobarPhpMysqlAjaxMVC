
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
}
