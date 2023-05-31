<?php 
        
        if(isset($_COOKIE['PHPSESSID'])){
            header("Refresh:0");
            header("Location: http://localhost/Projeto-Locadrive/src/View/index.php");
        }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Locadrive</title>

</head>

<body>
    <header></header>
    <main class="container">
        <div class="box-modal row justify-content-center align-items-center">
            <div class="modal-login col-xxl-4 col-lg-6 d-flex align-items-center flex-column ">
                <div class="modal-logo">
                    <img src="./assets/logo.svg" alt="Logo local drive">
                </div>
                <h5>Faça login em sua conta</h5>
                <div>
                    <span class="msgErro">Email ou senha inválida</span>
                </div>
                <div class="modal-inputs col-xxl-12 col-lg-12">
                    <div class="modal-input">
                        <img src="./assets/user-login.svg" alt="icon user login">
                        <input type="email" placeholder="example@hotmail.com" id="email">
                    </div>
                    <div class="modal-input">
                        <img src="./assets/key-login.svg" alt="icon user password">
                        <input type="password" placeholder="senha" id="senha">
                    </div>
                </div>
                <p>Esqueci a minha senha. Clique aqui para redefinir</p>
                <div class="modal-buttons col-xxl-12 col-lg-12">
                    <button type="submit" onclick="logar()">Login</button>
                    <a href="./register.html"><button>Registrar nova conta</button></a>
                </div>
            </div>
        </div>

    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>