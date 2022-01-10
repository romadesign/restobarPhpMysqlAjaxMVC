<?php
class UsuariosModel extends Query{
    // private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $userType;
    private $password;

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

    public function getUsuarios()
    {
        $sql = "SELECT * FROM users";
        $data = $this->SelectAll($sql);
        return $data;
    }

    public function createUser(
        string $username, 
        string $firstName, 
        string $lastName, 
        string $email, 
        string $phone, 
        string $userType, 
        string $password  )
    {
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->userType = $userType;
        $this->password = $password;
        $sql = "INSERT INTO users ( username, firstName, lastName, email, phone, userType, password) VALUES (?,?,?,?,?,?,?)"; 
        $data = array(
            $this->username,
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phone,
            $this->userType,
            $this->password,
        );
        $givens = $this->save($sql, $data);
        if($givens == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    // //delete
    // public function deleteUsuario(int $id)
    // {
    //     $this->id = $id;
    //     $sql = "DELETE FROM  users WHERE id = ? ";
    //     $datos = array($this->id);
    //     $data = $this->select($sql, $datos);
    //     return $data;

    // }
}

?>