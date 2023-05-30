<?php 

    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/config/conexao.php";
    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Cliente.php";

    if(isset($_POST['valor']) and isset($_POST['fieldName'])){
        if($_POST['valor'] != ""){
            getUser($_POST['valor'], $_POST['fieldName']);
            
        }
        else{
            getUsers();
        }
    }
    elseif(isset($_POST['valorOfUpdate'])  and isset($_POST['optionOfUpdate']) ){
        getUser($_POST['valorOfUpdate'], $_POST['optionOfUpdate']);
    }


    function getUsers(){
        global $connect;
        $sql = $connect->prepare("SELECT * FROM cliente");
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results); 
        
    }

    function getUser($valor, $fieldName){
        global $connect;
        $query = "";
        switch ($fieldName){
            case "id":
                $query = "SELECT * FROM cliente where id = $valor";
                break;
            case "nome":
                $query = "SELECT * FROM cliente where nome LIKE '$valor%'";  
                break;
            case "email":
                $query = "SELECT * FROM cliente where email = '$valor'";
                break;
        }   
        $sql = $connect->prepare($query);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }


?>