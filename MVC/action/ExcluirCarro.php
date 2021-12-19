<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header("Content-Type: text/html; charset=UTF-8", true);

require_once ('../dao/CarrosDAO.php');

$dao = null;

try {
    if (!empty($_POST["id"])) {
        $dao = new CarrosDAO();
        $dao->delete($_POST["id"]);
    } else {}
    
} catch (Exception $e){
    header('Erro', true, 500);
    echo $e->getMessage();
}


