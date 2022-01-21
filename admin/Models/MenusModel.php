<?php 
class MenusModel extends Query{
    //categories
    private $menuName;
    private $menuDesc;
    private $menuPrice;
    private $menuCategorieId;
    private $menuImage;

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
        string $menuPrice, 
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

}
