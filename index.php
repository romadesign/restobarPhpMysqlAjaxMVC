<?php
require_once "Config/Config.php";
//Colocamos la ruta principal que va a tener 
$ruta = !empty($_GET['url']) ? $_GET['url'] : "Categorias/index";
$array = explode("/", $ruta); // print_r($array);
$controller = $array[0];
$metodo = "index";
$parametro = "";
if (!empty($array[1])) {
    if (!empty($array[1] != "")) {
        $metodo = $array[1];
    }
}
if (!empty($array[2])) {
    if (!empty($array[2] != "")) {
        for ($i = 2; $i < count($array); $i++) {
            $parametro .= $array[$i] . ",";
        }
        $parametro = trim($parametro, ",");
    }
}
require_once "Config/App/autoload.php";
$dirControllers = "Controllers/" . $controller . ".php";
if (file_exists($dirControllers)) {
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        echo "No existe el Método";
    }
} else {
    echo "No existe el Controlador";
}