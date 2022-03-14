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

    //Register
      public function registrar() 
      {
        $username = $_POST["username"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $userType = $_POST["userType"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        //Hash password 
        $hash = hash("sha256", $password);
        if(empty($username) || empty($firstName) || empty($lastName)|| empty($email)|| empty($phone)|| empty($userType)|| empty($password)){
            $msg = "Todos los campos son obligatorios";
        }else if($password != $cpassword){
            $msg = "Las contraseñas no coinciden";
        }else{
            $data = $this->model->createUser($username,$firstName,$lastName,$email,$phone,$userType,$hash);
            if($data == "ok"){
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El usuario ya existe";
            }else{
                $msg = "Error al registrar el usuario";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
      }

}