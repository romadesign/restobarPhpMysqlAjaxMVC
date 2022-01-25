<?php
class Query extends Conexion{
    private $pdo, $con, $sql;
    public function __construct() {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }
    //seleccionando solo un usuario o dato
    public function select(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Llamando a todos los datos de database
    public function SelectAll(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Register user
    public function save(string $sql, array $data)
    {
        $this->sql = $sql;
        $this->data = $data;
        $insert = $this->con->prepare($this->sql);
        $givens = $insert->execute($this->data);
        if($givens){
            $res = 1;
        }else{
            $res = 0;
        }
        return $res;
    }
}

?>