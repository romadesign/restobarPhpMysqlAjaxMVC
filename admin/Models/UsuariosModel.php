<?php
class UsuariosModel extends Query{
    private $id;
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

    //delete
    public function deleteUsuario(int $id)
    {
        $this->id = $id;
        $sql = "DELETE FROM  users WHERE id = ? ";
        $datos = array($this->id);
        $data = $this->select($sql, $datos);
        return $data;

    }
}

?>