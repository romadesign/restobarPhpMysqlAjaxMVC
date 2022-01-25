<?php 
class MenusModel extends Query{
    //categories
    private $menuId;
    private $menuName;
    private $menuDesc;
    private $menuPrice;
    private $menuCategorieId;
    private $menuImage;

    public function __construct()
    {
        parent::__construct();
    }
    
    //All Menus
    public function getMenus()
    {
        $sql = "SELECT * FROM `menu` ";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Categorie select
    public function getCategories()
    {
        $sql = "SELECT `categorieId`, `categorieName` FROM `categories` ";
        $data = $this->SelectAll($sql);
        return $data;
    }

     //Create menus
     public function createMenu(
        string $menuName, 
        string $menuDesc, 
        int $menuPrice, 
        int $menuCategorieId,
        string $menuImage )
    {
        $this->menuName = $menuName;
        $this->menuDesc = $menuDesc;
        $this->menuPrice = $menuPrice;
        $this->menuCategorieId = $menuCategorieId;
        $this->menuImage = $menuImage;
        //Verification menus
        $verificationMenu = "SELECT * FROM menu WHERE menuName = '$this->menuName'";
        $exitsCategorie = $this->select( $verificationMenu);
        if(empty($exitsCategorie)){
            $sql = "INSERT INTO menu ( menuName, menuDesc, menuPrice, menuCategorieId, menuImage) VALUES (?,?,?,?,?)"; 
            $data = array(
                $this->menuName,
                $this->menuDesc,
                $this->menuPrice,
                $this->menuCategorieId,
                $this->menuImage,
            );
            $givens = $this->save($sql, $data);
            if($givens == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }

    //Modification Menú
    public function modifyMenu(
        string $menuName, 
        string $menuDesc, 
        int $menuPrice, 
        int $menuCategorieId,
        int $menuId)
    {
        $this->menuName = $menuName;
        $this->menuDesc = $menuDesc;
        $this->menuPrice = $menuPrice;
        $this->menuCategorieId = $menuCategorieId;
        $this->menuId = $menuId;
         #update
         $sql = "UPDATE `menu` SET  menuName=?, menuDesc=?,  menuPrice=?,  menuCategorieId=? WHERE menuId =?";
         $data = array(
             $this->menuName,
             $this->menuDesc,
             $this->menuPrice,
             $this->menuCategorieId,
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

    //Delete Menu
    public function deleteMenuId(int $menuId)
    {
        $this->menuId = $menuId;
        $sql = "DELETE FROM menu WHERE menuId = ?";
        $data = array($this->menuId);
        $givens = $this->save($sql, $data);
        return $givens;
    }

    //Select Menú
    public function selectCategoriaId(int $menuId)
    {
        $sql = "SELECT * FROM `menu` WHERE menuId  = $menuId ";
        $data = $this->select($sql);
        return $data;
    }

}
