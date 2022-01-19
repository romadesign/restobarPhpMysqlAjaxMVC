<?php 
class CategoriasModel extends Query{
    //private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $userType;
    private $password;

    //categories
    private $categorieName;
    private $categorieDesc;
    private $categorieImage;


    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $username, string $password )
    {
        $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
        $data = $this->select($sql);
        return $data;
    }

    //User List
    public function getCategorias()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Create categorie
    public function createCategoria(
        string $categorieName, 
        string $categorieDesc, 
        string $categorieImage )
    {
        $this->categorieName = $categorieName;
        $this->categorieDesc = $categorieDesc;
        $this->categorieImage = $categorieImage;
        //Verification or categorie
        $verificationCategorie = "SELECT * FROM categories WHERE categorieName = '$this->categorieName'";
        $exitsCategorie = $this->select( $verificationCategorie);
        if(empty($exitsCategorie)){
            $sql = "INSERT INTO categories ( categorieName, categorieDesc, categorieImage) VALUES (?,?,?)"; 
            $data = array(
                $this->categorieName,
                $this->categorieDesc,
                $this->categorieImage,
            );
            $givens = $this->save($sql, $data);
            if($givens == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }

    //Modification user 
    public function modifyUser(
        string $username, 
        string $firstName, 
        string $lastName, 
        string $email, 
        string $phone, 
        string $userType,
        int $id )
    {
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->userType = $userType;
        $this->id = $id;
         #update
         $sql = "UPDATE users SET  username=?, firstName=?, lastName=?, email=?, phone=?, userType=? WHERE id =?";
         $data = array(
             $this->username,
             $this->firstName,
             $this->lastName,
             $this->email,
             $this->phone,
             $this->userType,
             $this->id,
         );
         $givens = $this->save($sql, $data);
         if($givens == 1){
             $res = "modificado";
         }else{
             $res = "error";
         }
        return $res;
    }

    //Edit
    public function selectUsuarioId(int $id)
    {
        $sql = "SELECT * FROM  users WHERE id = $id ";
        $data = $this->select($sql);
        return $data;
    }

    public function deleteUsuarioId(int $id)
    {
        $this->id = $id;
        $sql = "DELETE FROM  users WHERE id = ?";
        $data = array( $this->id);
        $givens = $this->save($sql, $data);
        return $givens;
    }
}
