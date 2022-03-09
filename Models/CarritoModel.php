<?php
class CarritoModel extends Query
{

    public function __construct()
    {

        parent::__construct();
    }

    public function getItemsCarritos()
    {
        $selectUserIdMenu = "SELECT menuId, itemQuantity FROM viewcart WHERE userId = $_SESSION[id]";
        //$selectUserIdMenu = "SELECT * FROM menu ";
        $data = $this->SelectAll($selectUserIdMenu);
        return $data;
    }

    

  
}