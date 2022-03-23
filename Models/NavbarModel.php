<?php
class NavbarModel extends Query
{

    public function __construct()
    {

        parent::__construct();
    }

    //Get cantidad items nav
    public function getCantidadItems()
    {
        $sql = "SELECT count(*) c FROM viewcart WHERE userId = $_SESSION[id]";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Get message nav
    public function getMessageNav()
    {
        $sql = "SELECT * FROM `contactreply` WHERE userId = $_SESSION[id]";
        $data = $this->SelectAll($sql);
        return $data;
    }
    
    //Eliminar los mensajes del usuario
    public function deleteMessageId(int $id){
        $this->id = $id;
        $sql = "DELETE FROM contactreply WHERE id = ?";
        $datos = array($this->id);
        $data = $this->save($sql, $datos);
        if($data == 1 ){
            $res = "eliminado";
        }else{
            $res = "error";
        }
        return $res;
    }
}

