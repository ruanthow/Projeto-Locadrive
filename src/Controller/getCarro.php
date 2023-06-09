<?php

    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/config/conexao.php";
    include $_SERVER['DOCUMENT_ROOT'] ."/Projeto-Locadrive/src/Model/Carro.php";

    $sql = $connect->prepare("SELECT * from carro");
    $sql->execute();
    $response = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($response);

