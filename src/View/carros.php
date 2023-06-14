<?php
//função para acessar essa pagina apenas logado 
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
   
} else {
    $user = NULL;
    unset($_COOKIE['PHPSESSID']);
    setcookie('PHPSESSID', null, -1, '/');
    header("Refresh:0");
    header("Location: /Projeto-Locadrive/src/View/login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carros.css">
    <link rel="stylesheet" href="css/modalCarro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <title>Locadrive</title>
</head>

<body>
    <!--NAV BAR-->

    <header class="">
        <nav class="nav container">
            <ul class="nav-options row">
                <div class="nav-logo col-xxl-6 col-xl-6 col-lg-6 col-6">
                    <a href="./index.php">
                        <li>
                            <img src="./assets/logo.svg" alt="" style="height: 60px; width: 180px;">
                        </li>
                    </a>
                </div>
                <div class="mobile col-6">
                    <div class="nav-mobile col-12">
                        <div class="d-flex justify-content-end">
                            <button class="nav-mobile-button" onclick="showMenu()">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <div class="nav-mobile-menu d-flex flex-column">
                            <div class="d-flex justify-content-end">
                                <button class="nav-menu-close" onclick="closeMenu()">
                                    <img src="./assets/fechar.png" alt="">
                                </button>
                            </div>
                            <?php
                                if($user != NULL){
                                    echo '  <a>
                                                <li>
                                                    <p> Usuário: '. $user['nome'] . '</p>
                                                </li>
                                            </a>';
                                }
                                else{
                                    echo '  <a href="./login.php">
                                                <li>
                                                    <p>LOGIN</p>
                                                </li>
                                            </a>';
                                }
                            ?>
                            <a href="./register.html">
                                <li>
                                    <p>CRIE SUA CONTA</p>
                                </li>
                            </a>
                            <a href="">
                                <li class="">
                                    <p>CONTATO</p>
                                </li>
                            </a>
                            <a href="">
                                <li class="">
                                    <p>AJUDA</p>
                                </li>
                            </a>
                            <?php
                                 if($user != NULL && $user['privilegio'] == 1){
                                    echo '  <a href="./gerenciarCliente.php">
                                                <li>
                                                    <p>GERENCIAR</p>
                                                </li>
                                            </a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="nav-buttons col-xxl-6 col-xl-6 col-lg-6">
                    <li class="nav-contato">
                        <img src="./assets/icon-phone.svg" alt="" style="padding-right: 16px ;">
                        <a href="#contato" style="text-decoration: none; color: #000;"><p>Contato</p></a>
                    </li>
                    <li class="nav-ajuda">
                        <img src="./assets/icon-help.svg" alt="" style="padding-right: 16px ;">
                        <a href="#ajuda" style="text-decoration: none; color: #000;"><p>Ajuda</p></a>
                    </li>
                    <?php 
                        if($user != NULL){
                            if($user['privilegio'] == 1){
                                echo '<li class="nav-user d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">
                                        <img src="./assets/user-icon.svg" alt="">
                                    </div>
                                    <button class="nav-user-button d-flex  align-items-center" onclick="showMenuLogado()">
                                        <p class="my-0 mx-1">'. $user["nome"] . '</p>
                                        <div>
                                            <img src="./assets/caret-down.svg" alt="">
                                        </div>
                                    </button>
                                </div>
                                <div class="submenu-user d-flex flex-column">
                                    <div class="btn-box-button">
                                        <button class="btn-user-button" onclick="deslogar()">Logout</button> 
                                    </div>
                                    <div class="btn-box-button">
                                    <a href='.'./gerenciarCliente.php'.'><button class="btn-user-button">Gerenciar</button></a> 
                                    </div>
                                </div>
                                </li>';
                            }
                            else{
                                echo '<li class="nav-user d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">
                                        <img src="./assets/user-icon.svg" alt="">
                                    </div>
                                    <button class="nav-user-button d-flex  align-items-center" onclick="showMenuLogado()">
                                        <p class="my-0 mx-1">'. $user["nome"] . '</p>
                                        <div>
                                            <img src="./assets/caret-down.svg" alt="">
                                        </div>
                                    </button>
                                </div>
                                <div class="submenu-user d-flex flex-column">
                                    <div class="btn-box-button">
                                        <button class="btn-user-button" onclick="deslogar()">Logout</button> 
                                    </div>
                                </div>
                                </li>';
                            }
                            
                        }   
                        else{
                            echo "<li class='nav-button'>
                                <a href='./login.php'><button>Entrar</button></a>
                            </li>";
                        }
                    ?>
                </div>
            </ul>

        </nav>
    </header>
    <!--TITULO-->
    
    <main>
        <!--TITULO-->
        <div class="titulo container">
            <div class="container-fluid text-center">
                <h1 id="tipo"></h1>
                <h2>Escolha seu veiculo</h2>
                <p>As melhores condicoes para voce reservar e aproveitar</p>
            </div>
        </div>


        <!--COMEÇO FILTRO-->
        <div class="boxPrincipalFiltro container">
            <div class="boxFiltro container-fluid">
                <h1>FILTRO</h1>
                <div class="boxOpcaoFiltro container">
                    <div class="opcaoFiltro ">
                        <button class="btnFiltro" onclick="filtros('suv', 0)"></button>
                        <p class="opcao">SUV</p>
                    </div>
                    <div class="opcaoFiltro ">
                        <button class="btnFiltro" onclick="filtros('hatch', 1)"></button>
                        <p class="opcao">HATCH</p>
                    </div>
                    <div class="opcaoFiltro ">
                        <button class="btnFiltro" onclick="filtros('sedan', 2)"></button>
                        <p class="opcao">SEDAN</p>
                    </div>
                </div>
            </div>
        </div>
        <!--FIM FILTRO-->


        <!--MODAL-->
        <div class="modal" id="myModal">

            <div class="modal-box">
                
                <div class="modal-content">

                    <div class="modal-body">
                        <img id="imagemCarro" src="" alt="Imagem do Carro">
                        <h1 id="tipoCarro"><!--TITULO--></h1>
                        <h2 id="nomeCarro"></h2>
                        <h3 id="preçoCarro"></h3>
                        <p id="descriçãoCarro"><!-- AQUI VÃO AS INFORMAÇÕES DO CARRO--></p>
                    </div>

                    <div class="container-fluid">
                        <div class="botao-box row">
                            <div class="col-xl-4 col-lg-12 ">
                                <input class="botao-grande" type="text" placeholder="Retirada" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input class="botao-pequeno" type="date" placeholder="Data" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input class="botao-pequeno" type="time" placeholder="Hora" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input class="botao-pequeno" type="text" placeholder="Cupom" />
                            </div>
                        </div>
                        <div class="botao-box2 row ">
                            <div class="col-xl-4 col-lg-12">
                                <input class="botao-grande" type="text" placeholder="Devolução" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input class="botao-pequeno" type="date" placeholder="Data" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input class="botao-pequeno" type="time" placeholder="Hora" />
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <button onclick="ConfirmarCompra()">Confirmar</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" onclick="fecharModal()">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="container d-flex">
            <!--FIM DO TITULO-->
            <!--INICIO DOS CARROS-->
            <div class="container">
                <div class="d-flex col flex-column">

                    <div class="espaco principal ">
                        
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!--FIM DOS CARROS-->
    <!--FOOTER-->
    <div class="footer-box">
        <footer class="footer container d-flex flex-column">
            <div class="d-flex container">
                <div class="footer-logo col"><img src="assets/logo.svg" alt="">
                </div>
                <div class="footer-infos col pe-5">
                    <p class="fw-bold">Somos LocaDrive</p>
                    <h1>Ajuda</h1>
                    <h1>Configurações de Privacidade</h1>
                    <h1>Entrar</h1>
                </div>
                <div class="footer-infos  col pe-5">
                    <p class="fw-bold">Informações Importantes</p>
                    <h1>Política de Cookies</h1>
                    <h1>Política de Privacidade</h1>
                    <h1>Termos de Serviço</h1>
                    <h1>Dados da Empresa</h1>
                </div>
                <div class="footer-infos col">
                    <p class="fw-bold">Promova seu negócio</p>
                    <h1>Explorar</h1>
                    <h1>Empresa</h1>
                    <h1>Parceiros</h1>
                    <h1>Viagens</h1>
                </div>
            </div>
            <div class="container justify-content-center d-flex flex-column align-items-center pag">
                <h1>formas de pagamento</h1>
                <p>Pague no cartão de crédito em até 12X com juros, boleto à vista ou parcelado, transferência bancária
                    ou com pix!</p>
                <div>
                    <img src="assets/cartao/mastercard.webp" alt="">
                    <img src="assets/cartao/amex.webp" alt="">
                    <img src="assets/cartao/sorocred.webp" alt="">
                    <img src="assets/cartao/diners.webp" alt="">
                    <img src="assets/cartao/hipercard.webp" alt="">
                    <img src="assets/cartao/elo.webp" alt="">
                    <img src="assets/cartao/credz.webp" alt="">
                    <img src="assets/cartao/hiper.webp" alt="">
                    <img src="assets/cartao/sorocred-1.webp" alt="">
                    <img src="assets/cartao/itau.webp" alt="">
                    <img src="assets/cartao/bradesco.webp" alt="">
                    <img src="assets/cartao/santander.webp" alt="">
                    <img src="assets/cartao/bb.webp" alt="">
                    <img src="assets/cartao/banrisul.webp" alt="">
                    <img src="assets/cartao/caixa.webp" alt="">
                    <img src="assets/cartao/safetyPay.webp" alt="">
                    <img src="assets/cartao/jcb.webp" alt="">
                    <img src="assets/cartao/discover.webp" alt="">
                    <img src="assets/cartao/aura.webp" alt="">
                    <img src="assets/cartao/pix.webp" alt="">
                </div>
            </div>
            <div class="text-center py-5 social">
                <div class="fs-4 py-4">
                    <h1 class="fw-bold">siga-nos!</h1>
                    <i class="fa-brands fa-square-facebook" style="color: #383333;"></i>
                    <i class="fa-brands fa-twitter px-3" style="color: #383333;"></i>
                    <i class="fa-brands fa-instagram" style="color: #383333;"></i>
                </div>
                <p class="footer-text"> © 2023 LOCADRIVE. TODOS OS DIREITOS RESERVADOS.
                </p>
            </div>
        </footer>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script defer src="./js/buscarCarro.js"></script>
        <script src="./js/index.js"></script>
</body>

</html>