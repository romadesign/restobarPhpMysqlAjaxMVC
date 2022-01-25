<?php
class Usuarios extends Controller{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION["userType"]) == "1" || empty($_SESSION["username"]) == "admin" ){
            header("location :" .base_url. "Usuarios");
        }
        parent::__construct();
        
    }

    public function index()
    {   
        $this->views->getView($this, "index");
    }

    //Get Users
    public function Listar()
    {
       $data = $this->model->getUsuarios();
       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
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

     //Modification
     public function modificar() 
     {
       $username = $_POST["editUsername"];
       $firstName = $_POST["editFirstName"];
       $lastName = $_POST["editLastName"];
       $email = $_POST["editEmail"];
       $phone = $_POST["editPhone"];
       $userType = $_POST["editUserType"];
       $id = $_POST["id"];
       if(empty($username) || empty($firstName) || empty($lastName)|| empty($email)|| empty($phone)|| empty($userType)){
           $msg = "Todos los campos son obligatorios";
       }else{
           $data = $this->model->modifyUser($username,$firstName,$lastName,$email,$phone,$userType,$id);
           if($data == "modificado"){
               $msg = "si";
           }else{
               $msg = "Error al editar el usuario";
           }
       }
       echo json_encode($msg, JSON_UNESCAPED_UNICODE);
       die();
     }
    

    //Select User Id
    public function selectUserId(int $id)
    {   
        //Verificamos si nos da e Id seleccionado en el botton
        //print_r($id)
        $data = $this->model->selectUsuarioId($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    
    }

    //Delete User
    public function eliminarUserId($id)
    {
       $data = $this->model->deleteUsuarioId($id);
       if($data == 1){
           $msg = "ok";
       }else{
           $msg = "Error al elimiar usuario";
       }
       echo json_encode($msg, JSON_UNESCAPED_UNICODE);
       die();
    }


    public function validar()
    {   
       
        if(empty( $_POST["username"]) || empty($_POST["password"])){
            $msg = "Los campos estan vacios";
        }else{
            $username = $_POST["username"];
            $password = $_POST["password"]; 
            //validation hash password
            $hash = hash("sha256", $password);
            $data =  $this->model->getUsuario( $username,  $hash );
            if($data){
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['userType'] = $data['userType'];
                $msg = "ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: " .base_url);
    }

}
