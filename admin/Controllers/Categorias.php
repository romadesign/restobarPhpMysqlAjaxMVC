<?php
class Categorias extends Controller{
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

    //Get Categorias
    public function Listar()
    {
       $data = $this->model->getCategorias();
       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
    }

    //CreateCategorie
    public function createCategories() 
    {
      $categorieName = $_POST["categorieName"];
      $categorieDesc = $_POST["categorieDesc"];
      $categorieImage = $_FILES['categorieImage']['tmp_name'];
      //Config base64 img
      $categorieImageType = pathinfo($categorieImage, PATHINFO_EXTENSION);    
      $datainage = file_get_contents($categorieImage);
      $img_base64 = base64_encode($datainage);
      $img = 'data:image/' . $categorieImageType . ';base64,' . $img_base64;

      if(empty($categorieName) || empty($categorieDesc) || empty($img)){
          $msg = "Todos los campos son obligatorios";
      }else{
          $data = $this->model->createCategoria($categorieName,$categorieDesc,$img);
          if($data == "ok"){
              $msg = "si";
          }else if($data == "existe"){
              $msg = "La categoria ya existe";
          }else{
              $msg = "Error al crear una nueva categoria";
          }
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }

     //Modification
    //  public function modificar() 
    //  {
    //    $username = $_POST["editUsername"];
    //    $firstName = $_POST["editFirstName"];
    //    $lastName = $_POST["editLastName"];
    //    $email = $_POST["editEmail"];
    //    $phone = $_POST["editPhone"];
    //    $userType = $_POST["editUserType"];
    //    $id = $_POST["id"];
    //    if(empty($username) || empty($firstName) || empty($lastName)|| empty($email)|| empty($phone)|| empty($userType)){
    //        $msg = "Todos los campos son obligatorios";
    //    }else{
    //        $data = $this->model->modifyUser($username,$firstName,$lastName,$email,$phone,$userType,$id);
    //        if($data == "modificado"){
    //            $msg = "si";
    //        }else{
    //            $msg = "Error al editar el usuario";
    //        }
    //    }
    //    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //    die();
    //  }
    

    //Edit User
    // public function selectUserId(int $id)
    // {   
    //     //Verificamos si nos da e Id seleccionado en el botton
    //     //print_r($id)
    //     $data = $this->model->selectUsuarioId($id);
    //     echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     die();
    
    // }

    //Delete User
    // public function eliminarUserId($id)
    // {
    //    $data = $this->model->deleteUsuarioId($id);
    //    if($data == 1){
    //        $msg = "ok";
    //    }else{
    //        $msg = "Error al elimiar usuario";
    //    }
    //    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //    die();
    // }


}
