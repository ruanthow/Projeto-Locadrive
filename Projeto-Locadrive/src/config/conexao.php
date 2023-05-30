<?php 

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    global $connect;
    try{
        $connect = new PDO("mysql:host=$servidor; dbname=locadrive", $usuario, $senha);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){
        echo "Erro na conexão: " . $e->getMessage();
    }
?>