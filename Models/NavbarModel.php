<?php
class NavbarModel extends Query
{

    public function __construct()
    {

        parent::__construct();
    }

    //Get categorias
    public function getCategorieNavbar()
    {
        $sql = "SELECT count(*) c FROM viewcart WHERE userId = $_SESSION[id]";
        $data = $this->SelectAll($sql);
        return $data;
    }

}

