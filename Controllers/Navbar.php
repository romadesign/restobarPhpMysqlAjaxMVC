
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

    //Get listar menus por usuarios
    public function ListarNav()
    {
        $userId = $_SESSION['id'];
        $data = $this->model->getCategorieNavbar($userId);

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
