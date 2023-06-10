<?php
    
    include $_SERVER['DOCUMENT_ROOT'] . "/Projeto-Locadrive/src/config/conexao.php";
    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Cliente.php";
    
    $checkEmail = $_POST['emailValid'];

    $sql = $connect->prepare("SELECT cliente.email FROM cliente WHERE email = '$checkEmail' ");
    $sql->execute();
    $test = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(($test[0]['email'] ?? NULL) == $checkEmail){
        $res = array("email" => "invalid");
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    else{

        if(isset($_POST['nomeValid']) and isset($_POST['usuarioValid']) and isset($_POST['sobrenomeValid']) and isset($_POST['senhaValid']) and isset($_POST['cidadeValid']) and isset($_POST['estadoValid']) and isset($_POST['cepValid']) and isset($_POST['telefoneValid']) and isset($_POST['emailValid']) and isset($_POST['dataValid'])){
            $cliente = new Cliente();
            $cliente->__set("nome", $_POST['nomeValid']);
            $cliente->__set("sobrenome", $_POST['sobrenomeValid']);
            $cliente->__set("email", $_POST['emailValid']);
            $cliente->__set("senha", $_POST['senhaValid']);
            $cliente->__set("cidade", $_POST['cidadeValid']);
            $cliente->__set("estado", $_POST['estadoValid']);
            $cliente->__set("telefone", $_POST['telefoneValid']);
            $cliente->__set("usuario", $_POST['usuarioValid']);
            $cliente->__set("cep", $_POST['cepValid']);
            $cliente->__set("data", $_POST['dataValid']);

            $sql = $connect->prepare("INSERT INTO cliente VALUES (null,?,?,?,?,?,?,?,?,?,?,0)");
            $sql->execute(array(
                $cliente->__get("nome"),
                $cliente->__get("sobrenome"),
                $cliente->__get("email"),
                $cliente->__get("senha"),
                $cliente->__get("cidade"),
                $cliente->__get("estado"),
                $cliente->__get("telefone"),
                $cliente->__get("usuario"),
                $cliente->__get("cep"),
                $cliente->__get("data"),    
            ));
            
            $res = array("email" => "valid");
            header('Content-Type: application/json');
            echo json_encode($res);
        }
    }
   
