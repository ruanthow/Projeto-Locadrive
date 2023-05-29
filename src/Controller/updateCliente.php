<?php 

    include $_SERVER['DOCUMENT_ROOT'] . "/Projeto-Locadrive/src/config/conexao.php";
    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Cliente.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] == "PUT"){
        array_shift($_POST);
        if(isset($_POST['nomeValid']) and isset($_POST['usuarioValid']) and isset($_POST['sobrenomeValid']) and isset($_POST['senhaValid']) and isset($_POST['cidadeValid']) and isset($_POST['estadoValid']) and isset($_POST['cepValid']) and isset($_POST['telefoneValid']) and isset($_POST['emailValid']) and isset($_POST['dataValid'])){
            
            $id = $_POST['id'];
            $nome = $_POST['nomeValid'];
            $sobrenome = $_POST['sobrenomeValid'];
            $usuario = $_POST['usuarioValid'];
            $senha = $_POST['senhaValid'];
            $cidade = $_POST['cidadeValid'];
            $estado = $_POST['estadoValid'];
            $cep = $_POST['cepValid'];
            $telefone = $_POST['telefoneValid'];
            $email = $_POST['emailValid'];
            $data = $_POST['dataValid'];


            $sql = $connect->prepare("UPDATE cliente SET nome = '$nome' , sobrenome = '$sobrenome', email = '$email', senha = '$senha', cidade = '$cidade', estado = '$estado', telefone = '$telefone', usuario = '$usuario', cep = '$cep', data_nasc = '$data' WHERE id = '$id';");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo "sucesso!";
        }
    }



?>