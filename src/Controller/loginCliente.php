<?php 

include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/config/conexao.php";
include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Login.php";

    
    $cliente = new Login();
    if(isset($_POST['action']) == "login" and isset($_POST['email']) and isset($_POST['senha']) and !isset($_COOKIE['PHPSESSID'])){
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        try {
            $sql = $connect->prepare("SELECT cliente.nome, cliente.email, cliente.gerenciador FROM cliente WHERE cliente.email = '$email' AND cliente.senha = '$senha' ");
            $sql->execute();
            $response = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(count($response) === 1){
                $cliente->__set("nome", $response[0]['nome']);
                $cliente->__set("email", $response[0]['email']);
                $cliente->logando();
                $_SESSION["user"] = array("nome" => $cliente->__get("nome"), "email" => $cliente->__get("email"), "privilegio" => $response[0]['gerenciador']);
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