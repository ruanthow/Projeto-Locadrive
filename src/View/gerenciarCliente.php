<?php
    session_start();

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($user['privilegio'] == 0){
            header("Location: /Projeto-Locadrive/src/View/");
        }
    }
    else{
      $user = NULL;
      unset($_COOKIE['PHPSESSID']);
      setcookie('PHPSESSID', null, -1, '/');
      header("Refresh:0");
      header("Location: /Projeto-Locadrive/src/View/login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/gerenciarCliente.css">
  <title>Locadrive</title>
</head>

<body>

  <header></header>
  <main>
    <div class="col-12 d-flex ">
      <div class="sideMenu col-2">
        <div class="nameAdm">
          <?=  '<h3>'. $user['nome'] .'</h3>' ?>
        </div>
        <div class="actionClient">
          <h5>Clientes</h5>
          <button class="btnAction" onclick="htmlListar()">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconList">
                <img src="./assets/iconList.svg" alt="">
              </div>
              <strong>Listar</strong>
            </div>
          </button>
          <button class="btnAction" onclick="htmlEditar()">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconEdit">
                <img src="./assets/iconEdit.svg" alt="">
              </div>
              <strong>Editar</strong>
            </div>
          </button>
          <button class="btnAction" onclick="htmlDeletar()">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconDelete">
                <img src="./assets/iconDelete.svg" alt="">
              </div>
              <strong>Deletar</strong>
            </div>
          </button>
        </div>
        <div class="actionClient">
          <h5>Carros</h5>
          <button class="btnAction" onclick="htmlCliente()">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconList">
                <img src="./assets/iconList.svg" alt="">
              </div>
              <strong>Listar</strong>
            </div>
          </button>
          <button class="btnAction">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconEdit">
                <img src="./assets/iconEdit.svg" alt="">
              </div>
              <strong>Editar</strong>
            </div>
          </button>
          <button class="btnAction">
            <div class="d-flex justify-content-center align-items-center">
              <div class="iconDelete">
                <img src="./assets/iconDelete.svg" alt="">
              </div>
              <strong>Deletar</strong>
            </div>
          </button>
        </div>
        <div class="actionExit">
          
              <a href="./index.php" class="btnExit d-flex justify-content-center align-items-center w-100">
                <strong >Sair</strong>
              </a>
      
        </div>
      </div>
      <div class="renderConteudo col-10">
      
      </div>
    </div>

  </main>
  <footer></footer>
  <script defer src="./js/buscarCliente.js"></script>
  <script type="module" defer src="./js/register.js"></script>
  <script defer type="module" src="./js/updateCliente.js"></script>
  <script defer type="module" src="../components/htmlCliente.js"></script>
  <script defer type="module" src="../components/validacao.js"></script>
  <script src="./js/deletarCliente.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</body>

</html>