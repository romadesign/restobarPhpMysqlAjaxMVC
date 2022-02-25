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
}