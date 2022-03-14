<?php
class LoginModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(string $username, string $password)
    {
        $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
        $data = $this->select($sql);
        return $data;
    }

     //Create User
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
        //Verification un user
        $verificationUser = "SELECT * FROM users WHERE username = '$this->username' OR email = '$this->email'";
        $exitsUser = $this->select( $verificationUser);
        if(empty($exitsUser)){
            //hash password
            //$this->hash = password_hash($password, PASSWORD_DEFAULT);
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
        }else{
            $res = "existe";
        }
        return $res;
    }
}