<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header("Content-Type: text/html; charset=UTF-8", true);

require_once ('../model/Carros.php');
require_once ('../dao/CarrosDAO.php');

$dao = null;

try {

    if (!empty($_POST["id"])) {
        $dao = new CarrosDAO();
        $obj = $dao->getById($_POST["id"]);

        if (!empty($obj)) {
            $obj = new Carros();
            $obj->id = $_POST['id'];
            $obj->marca = $_POST['marca'];
            $obj->carro = $_POST['carro'];
            $obj->fab = $_POST['fab'];
            $obj->quilometros = $_POST['quilometros'];
            $obj->preco = $_POST['preco'];

            if ($obj->validarCampos()){
                $dao = new CarrosDAO();
                $codigo = $dao->update($obj);
                if (!empty($codigo)) {
                    echo $codigo;
                }
            } else {}
        } else {}
    } else {}

} catch (Exception $e){
    header('Erro', true, 500);
    echo $e->getMessage();
}


