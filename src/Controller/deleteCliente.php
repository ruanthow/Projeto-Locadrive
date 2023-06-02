<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/Projeto-Locadrive/src/config/conexao.php";
include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Cliente.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = $connect->prepare("DELETE FROM `cliente` WHERE id = '$id'");
        $sql->execute();
        
        header("Content-Type: application/json");
        $result = array("status" => "sucesso");
        echo json_encode($result);
    }
    else{
        $result = array("status" => "ocorreu um erro");
        echo json_encode($result);
    }


?>