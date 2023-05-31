<?php 

include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/config/conexao.php";
include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Login.php";

    

    if(isset($_POST['action']) == "login" and isset($_POST['email']) and isset($_POST['senha']) and !isset($_COOKIE['PHPSESSID'])){
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        try {
            $sql = $connect->prepare("SELECT cliente.usuario, cliente.email FROM cliente WHERE cliente.email = '$email' AND cliente.senha = '$senha' ");
            $sql->execute();
            $response = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($response) === 1){
                $cliente = new Login();
                $cliente->__set("usuario", $response[0]['usuario']);
                $cliente->__set("email", $response[0]['email']);
                $cliente->logando();
                $_SESSION["user"] = array("usuario" => $cliente->__get("usuario"), "email" => $cliente->__get("email"));
                echo "logado";
            }
            else{
                echo "houve um erro";
            }
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    elseif(isset($_POST['logout'])){
        try {
            $cliente->logout();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

?>