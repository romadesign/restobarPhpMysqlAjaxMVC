<?php
class CarritoModel extends Query
{
    private $menuId;
    private $itemQuantity;
    public function __construct()
    {

        parent::__construct();
    }

    public function getItemsCarritos()
    {
        //$selectUserIdMenu = "SELECT menuId, itemQuantity FROM viewcart WHERE userId = $_SESSION[id]";
        $selectUserIdMenu = "SELECT * FROM viewcart V INNER JOIN menu M ON V.menuId = M.menuId WHERE userId = $_SESSION[id] ";
        $data = $this->SelectAll($selectUserIdMenu);
        return $data;
    }  

     //Modification Menú
     public function modifyCantidad(
        int $itemQuantity,
        int $menuId)
    {
        $this->itemQuantity = $itemQuantity;
        $this->menuId = $menuId;
         #update
         $sql = "UPDATE `viewcart` SET  itemQuantity=? WHERE menuId =?";
         $data = array(
             $this->itemQuantity,
             $this->menuId,
         );
         $givens = $this->save($sql, $data);
         if($givens == 1){
             $res = "modificado";
         }else{
             $res = "error";
         }
        return $res;
    }


     //Select Categorie
     public function selectMenuIdCantida(int $menuId)
     {
         $sql = "SELECT * FROM viewcart WHERE menuId = $menuId";
         $data = $this->select($sql);
         return $data;
     }


    public function deleteMenuId(int $menuId)
    {
        $this->menuId = $menuId;
        $sql = "DELETE FROM viewcart WHERE menuId = ? AND userId = $_SESSION[id]";
        $data = array($this->menuId);
        $givens = $this->save($sql, $data);
        return $givens;
    }
}