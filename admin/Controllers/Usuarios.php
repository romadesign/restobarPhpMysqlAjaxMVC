<?php
class Usuarios extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
        
    }

    public function index()
    {   
        $this->views->getView($this, "index");
    }
    public function validar()
    {   
        $username = $_POST["username"];
        $password = $_POST["password"]; 
        if(empty( $username) || empty($password)){
            $msg = "Los campos estan vacios";
        }else{
            
            $data =  $this->model->getUsuario( $username,  $password );
            if($data){
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
                $msg = "ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        print_r($data);
        die();
    }
}
?>