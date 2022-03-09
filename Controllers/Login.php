<?php
class Login extends Controller
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

    public function validarLogin()
    {

        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $msg = "Los campos estan vacios";
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];
            //validation hash password
            $hash = hash("sha256", $password);
            $data =  $this->model->getUsuario($username,  $hash);
            if ($data) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['userType'] = $data['userType'];
                $msg = "ok";
            } else {
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: " .base_url_user);
    }

}