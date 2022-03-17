<?php
class ViewOrderModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getViewsOrder()
    {
        //$selectUserIdMenu = "SELECT menuId, itemQuantity FROM viewcart WHERE userId = $_SESSION[id]";
        $selectUserIdMenu = "SELECT * FROM `orders` WHERE `userId` = $_SESSION[id] ";
        $data = $this->SelectAll($selectUserIdMenu);
        return $data;
    }  


    //Select Categorie
    public function getOrdersItems(int $orderId)
    {
        $sql = "SELECT * FROM orderitems OT
                        INNER JOIN menu M on M.menuId = OT.menuId
                        WHERE OT.orderId = $orderId";
        $data = $this->SelectAll($sql);
        return $data;
    }


    
}