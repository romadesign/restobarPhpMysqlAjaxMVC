<?php 
class Views{
    public function getView($controlador, $vista, $getCategorias = "" ){
        $controlador = get_class($controlador);
        if($controlador == "Home"){
            $vista = "Views/".$vista.".php";
        }else{
            $vista = "Views/".$controlador."/".$vista.".php";
        }
        require_once $vista;
    }
}
?>