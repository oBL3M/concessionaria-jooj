<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header("Content-Type: text/html; charset=UTF-8", true);

require_once ('../model/Carros.php');
require_once ('../dao/CarrosDAO.php');

$dao = null;

try {
    $obj = new Carros();
    $obj->marca = $_POST["marca"];
    $obj->carro = $_POST["carro"];
    $obj->fab = $_POST["fab"];
    $obj->quilometros = $_POST["quilometros"];
    $obj->preco = $_POST["preco"];

    if ($obj->validarCampos()){
        $dao = new CarrosDAO();
        $codigo = $dao->insert($obj);
        if(!empty($codigo)) {
            echo $codigo;
        }
    } else {
        header('Error', true, 422);
        echo "Dados Invalidos";
    }

} catch (Exception $e){
    header('Erro', true, 500);
    echo $e->getMessage();
}


