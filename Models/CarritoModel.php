<?php
class CarritoModel extends Query
{

    public function __construct()
    {

        parent::__construct();
    }

    public function getItemsCarritos()
    {
        //$selectUserIdMenu = "SELECT menuId, itemQuantity FROM viewcart WHERE userId = $_SESSION[id]";
        $selectUserIdMenu = "SELECT * FROM viewcart V 
                            INNER JOIN menu M ON V.menuId = M.menuId
                            WHERE userId = $_SESSION[id] ";
        $data = $this->SelectAll($selectUserIdMenu);
        return $data;
    }

    

  
}