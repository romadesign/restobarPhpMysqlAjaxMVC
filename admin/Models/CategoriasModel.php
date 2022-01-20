<?php 
class CategoriasModel extends Query{
    //categories
    private $categorieId;
    private $categorieName;
    private $categorieDesc;
    private $categorieImage;


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

    //User List
    public function getCategorias()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //Create categorie
    public function createCategoria(
        string $categorieName, 
        string $categorieDesc, 
        string $categorieImage )
    {
        $this->categorieName = $categorieName;
        $this->categorieDesc = $categorieDesc;
        $this->categorieImage = $categorieImage;
        //Verification or categorie
        $verificationCategorie = "SELECT * FROM categories WHERE categorieName = '$this->categorieName'";
        $exitsCategorie = $this->select( $verificationCategorie);
        if(empty($exitsCategorie)){
            $sql = "INSERT INTO categories ( categorieName, categorieDesc, categorieImage) VALUES (?,?,?)"; 
            $data = array(
                $this->categorieName,
                $this->categorieDesc,
                $this->categorieImage,
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

    //Modification user 
    public function modifyCategoria(
        string $categorieName, 
        string $categorieDesc,
        int $categorieId )
    {
        $this->categorieName = $categorieName;
        $this->categorieDesc = $categorieDesc;
        $this->categorieId = $categorieId;
         #update
         $sql = "UPDATE `categories` SET  categorieName=?, categorieDesc=? WHERE categorieId =?";
         $data = array(
             $this->categorieName,
             $this->categorieDesc,
             $this->categorieId,
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
    public function selectCategoriaId(int $categorieId)
    {
        $sql = "SELECT * FROM `categories` WHERE categorieId  = $categorieId ";
        $data = $this->select($sql);
        return $data;
    }

    public function deleteCategoriaId(int $categorieId)
    {
        $this->categorieId = $categorieId;
        $sql = "DELETE FROM  `categories` WHERE categorieId = ?";
        $data = array( $this->categorieId);
        $givens = $this->save($sql, $data);
        return $givens;
    }
}
