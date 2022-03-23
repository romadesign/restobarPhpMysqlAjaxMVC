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

}

