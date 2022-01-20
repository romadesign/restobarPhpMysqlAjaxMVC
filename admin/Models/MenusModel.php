<?php 
class MenusModel extends Query{
    //categories
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
        $sql = "SELECT `menuId`, `menuName`, `menuPrice`, `menuCategorieId`, `menuImage`, FROM `menu` ";
        $data = $this->SelectAll($sql);
        return $data;
    }

}
