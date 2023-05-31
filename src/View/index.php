<?php 
session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        
    }
    else{
        $user = NULL;
        
        unset($_COOKIE['PHPSESSID']);
        setcookie('PHPSESSID', null, -1, '/');
    }
  
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <title>Locadrive</title>
</head>

<body>

    <!-- NAV -->

    <header class="">
        <nav class="nav container">
            <ul class="nav-options row">
                <div class="nav-logo col-xxl-6 col-xl-6 col-lg-6 col-6">
                    <li>
                        <img src="./assets/logo.svg" alt="" style="height: 60px; width: 180px;">
                    </li>
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
                            <a href="./login.php">
                                <li>
                                    <p>Login</p>
                                </li>
                            </a>
                            <a href="./register.html">
                                <li>
                                    <p>Crie sua conta</p>
                                </li>
                            </a>
                            <a href="">
                                <li class="">
                                    <p>Contato</p>
                                </li>
                            </a>
                            <a href="">
                                <li class="">
                                    <p>Ajuda</p>
                                </li>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav-buttons col-xxl-6 col-xl-6 col-lg-6">
                    <li class="nav-contato">
                        <img src="./assets/icon-phone.svg" alt="" style="padding-right: 16px ;">
                        <p>Contato</p>
                    </li>
                    <li class="nav-ajuda">
                        <img src="./assets/icon-help.svg" alt="" style="padding-right: 16px ;">
                        <p>Ajuda</p>
                    </li>
                    <li class="nav-button">
                        <a href="./login.php"><button><?= $user != NULL ? $user['usuario'] : 'Entrar' ?></button></a>
                    </li>
                </div>
            </ul>

        </nav>
    </header>
    <main class="container">

        <!-- SLIDER -->

        <section class="slider">
            <div class="slider-content">
                <input type="radio" name="btn-radio" id="radio1">
                <input type="radio" name="btn-radio" id="radio2">
                <input type="radio" name="btn-radio" id="radio3">

                <div class="slide-box primeiro">
                    <img src="assets/banner1.webp" alt="slide 1">
                </div>

                <div class="slide-box">
                    <img src="assets/banner2.webp" alt="slide 1">
                </div>

                <div class="slide-box">
                    <img src="assets/banner3.webp" alt="slide 1">
                </div>
            

            <div class="nav-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>

            <div class="nav-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
            </div>

        </div>
           

        </section>

        <!-- ALUGUEL DE CARROS -->
        <section class="container justify-content-center align-items-center d-flex ">
            <div class="aluguel-de-carro">
                <h2 class="text-center">Conheça a nossa Frota</h2>
                <p class="text-center mb-5">As melhores condições para você reservar e aproveitar</p>
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
                        <button>Buscar</button>
                    </div>
                </div>
            </div>

        </section>

        <!-- CARROS -->

        <section>
            <div class="principal row">
                <div class="bloco-principal col p-4">
                    <img src="./assets/hatch.png" alt="carro hatch">
                    <h1 class="fs-2 py-3">SUV</h1>
                    <div class="info-classes">
                        <h2>Veículo similar a: Jeep Compass 1.3 Turbo, Toyota Corolla Cross 2.0, Mitsubishi Eclipse
                            Cross 1.5 T,
                            dentre outros.</h2>
                        <h3>Sua reserva garante um dos carros desse grupo.
                            Modelo sujeito à disponibilidade da agência.</h3>
                    </div>
                    <a class="btn btn-primary fw-bold" href="#">Conferir Grupo</a>
                </div>
                <div class="bloco-principal col p-4" id="bloco2">
                    <img src="./assets/sedan.png" alt="sedan">
                    <h1 class="fs-2 py-3">SEDAN</h1>
                    <div class="info-classes">
                        <h2>Veículo similar a: Toyota Corolla GLI FAST, GM Cruze Sedan FAST, dentre outros.</h2>
                        <h3>Sua reserva garante um dos carros desse grupo.
                            Modelo sujeito à disponibilidade da agência.</h3>
                    </div>
                    <a class="btn btn-primary fw-bold" href="#">Conferir Grupo</a>
                </div>
                <div class="bloco-principal col p-4">
                    <img src="./assets/suv.png" alt="suv">
                    <h1 class="fs-2 py-3">HATCH </h1>
                    <div class="info-classes">
                        <h2>Veículo similar a: Fiat Argo 1.0, Hyundai HB20 1.0, GM Onix LT 1.0, dentre outros.</h2>
                        <h3>Sua reserva garante um dos carros desse grupo.
                            Modelo sujeito à disponibilidade da agência.</h3>
                    </div>
                    <a class="btn btn-primary fw-bold" href="#">Conferir Grupo</a>
                </div>
            </div>
        </section>
    </main>
    <!-- QUEM SOMOS -->
    <div class="informacao-box">
        <section class="informacao container">
            <div class="quem-somos col">
                <div class="quem-somos-card row d-flex align-items-center">
                    <div class="quem-somos-img col-xxl-5">
                        <img src="./assets/personagem1.svg" alt="">
                    </div>
                    <div class="infotexto col-xxl-7">
                        <h2>QUEM SOMOS</h2>
                        <p>Somos para todos! Usamos a tecnologia a favor dos nossos clientes, como um meio para
                            conseguirmos
                            preços mais acessíveis.</p>

                    </div>
                </div>
            </div>
            <div class="quem-somos col" id="personagem2">
                <div class="quem-somos-card row d-flex align-items-center">
                    <div class="quem-somos-img col-xxl-5"">
                        <img src=" ./assets/personagem2.svg" alt="">
                    </div>
                    <div class="infotexto col-xxl-7">
                        <h2>NÃO PRECISA TER MILHAS</h2>
                        <p>Utilizamos pontos de programas de fidelidade que seriam perdidos ou não utilizaVdos para que
                            mais
                            pessoas possam comprar passagens a preços mais acessíveis.</p>

                    </div>
                </div>
            </div>
            <div class="quem-somos col">
                <div class="quem-somos-card row d-flex align-items-center">
                    <div class="quem-somos-img col-xxl-5">
                        <img src="./assets/personagem3.svg" alt="">
                    </div>
                    <div class="infotexto col-xxl-7">
                        <h2>NOSSO BLOG</h2>
                        <p>O locadrive é a nossa plataforma de experiências de viagem e traz a você dicas especiais de
                            destinos, cultura, gastronomia e hospedagem.</p>

                    </div>
                </div>
            </div>
        </section>




        <!-- CENTRAL DE AJUDA -->

        <section class="ajuda-container container">
            <div class="ajuda-card">
                <h2>CENTRAL DE AJUDA</h2>
                <p>Escolha como você gostaria de ser atendido.</p>
                <h3>ACESSE AGORA</h3>
            </div>
            <div class="ajuda-card-imagem">
                <img src="./assets/imagemajuda.svg" alt="">
            </div>
        </section>
    </div>

    
    <section class="container-fluid d-flex flex-column pergunta-box justify-content-center align-items-center">
        <div class="col-8 d-flex flex-column">
            <h2 class="text-center">DÚVIDAS FREQUENTES</h2>
            <div class="col">
                <button class="accordion">Como o LocaDrive encontra tantos carros para alugar a preços tão
                    baixos?</button>
                <div class="panel">
                    <p>O LocaDrive compara os preços de aluguel de carros das principais locadoras de veículos, como
                        Thrifty, Dollar, Enterprise, Hertz, Payless e muito mais. Tudo para encontrar a melhor oferta.
                    </p>
                </div>

                <button class="accordion">O que há de especial em comparar as ofertas de aluguel de carros no
                    LocaDrive?</button>
                <div class="panel">
                    <p>Procurando o menor preço? Podemos ajudar. A nossa classificação de preços dos carros para aluguel
                        permite que você acesse rapidamente as ofertas mais baratas e/ou mais caras - a viagem é sua,
                        então você que sabe. Às vezes, a mesma oferta estará disponível em vários sites. Todos os
                        fornecedores são mostrados para que você possa escolher seu preferido, mas destacamos uma oferta
                        principal com base em fatores como popularidade junto aos clientes ou classificações.</p>
                </div>

                <button class="accordion">Qual é a idade mínima para alugar um carro?</button>
                <div class="panel">
                    <p>A idade mínima estabelecida por lei para aluguel de carros depende do país. Nos EUA e no Canadá,
                        os motoristas devem ter pelo menos 21 anos. No entanto, alguns estados e províncias permitem o
                        aluguel por motoristas com idade a partir de 18 anos. Na Europa e na Ásia, a idade mínima varia
                        entre 18 e 21, mas algumas agências exigem que os motoristas tenham pelo menos 25 anos de idade.
                        Lembre-se de que a maioria das agências cobra taxas diárias para motoristas com menos de 25
                        anos.</p>
                </div>

                <button class="accordion">Motoristas com carteira recente podem alugar um carro?</button>
                <div class="panel">
                    <p>As políticas para novos motoristas variam de acordo com a locadora de carros. Algumas exigem que
                        os motoristas possuam carteira há pelo menos um ano, enquanto outras exigem uma carteira de
                        motorista válida durante o período de aluguel. Confira as exigências diretamente com a locadora.
                    </p>
                </div>

                <button class="accordion">Posso ir de um país a outro em um carro alugado?</button>
                <div class="panel">
                    <p>Nos EUA, geralmente não é problema cruzar divisas estaduais ou a fronteira com o Canadá. No
                        entanto, você provavelmente pagará uma taxa de seguro extra se quiser viajar para o México. A
                        Europa tem regras semelhantes, e você precisará de pagar uma cobertura além-fronteiras se quiser
                        viajar de um país para outro. Se não fizer isso, é provável que o seu seguro de automóvel perca
                        a validade. Cruzar fronteiras na África e na Ásia costuma ser mais difícil, e você vai precisar
                        de documentação adicional para a fronteira. Recomendamos informar a locadora de carros sobre o
                        itinerário planejado.</p>
                </div>

                <button class="accordion">Como posso encontrar as melhores ofertas de carros para alugar no
                    LocaDrive?</button>
                <div class="panel">
                    <p>Uma simples pesquisa de carros de aluguel em https://www.locadrive.online/cars verifica preços em
                        centenas de sites de viagens em segundos. Reunimos ofertas de aluguel de carros disponíveis em
                        toda a web e as colocamos em um só lugar. Na página de resultados de pesquisa, você pode usar
                        vários filtros para comparar as opções disponíveis para um mesmo tipo de veículo que pretende
                        locar e escolher facilmente o melhor preço entre todas as ofertas disponibilizadas a partir de
                        sites de viagens diretamente na sua tela, sem precisar pagar qualquer taxa extra ao LocaDrive.
                    </p>
                </div>

                <button class="accordion">Que tipo de carros posso alugar no LocaDrive?</button>
                <div class="panel">
                    <p>No LocaDrive você pode encontrar ofertas de todos os tipos de carros de aluguel, incluindo
                        veículos
                        pequenos, médios, grandes, SUV, van, de luxo, caminhonete, conversíveis e comerciais.</p>
                </div>

                <button class="accordion">Posso devolver o carro em um local diferente?</button>
                <div class="panel">
                    <p>Você pretende pegar o carro alugado em uma cidade e devolver em outra? Nós podemos cuidar disso.
                        Ao fazer uma busca de aluguel de carros no LocaDrive, basta selecionar a opção "Outro local".
                        Você
                        poderá inserir os locais de retirada e devolução desejados. Nesse caso, a maioria das locadoras
                        de veículos cobra uma taxa de retorno do carro entre agências.</p>
                </div>

                <button class="accordion">Posso alugar um carro sem cartão de crédito?</button>
                <div class="panel">
                    <p>É pouco comum conseguir alugar um carro sem usar cartão de crédito, mas não é impossível.
                        Diversas agências aceitam pagamento em cartão de débito em aeroportos, desde que você apresente
                        uma comprovação da viagem de volta. Esteja ciente que a agência pode fazer uma verificação de
                        crédito baseada nos seus dados e provavelmente vai solicitar uma retenção de autorização da sua
                        conta como depósito-caução. Se você pretende pagar com cartão de débito, é sempre recomendável
                        verificar as condições com a locadora antes de reservar.</p>
                </div>

                <button class="accordion">É mais barato alugar um carro no aeroporto ou fora dele?</button>
                <div class="panel">
                    <p>Você costuma encontrar as melhores ofertas se escolher uma locadora fora da área do aeroporto. As
                        agências de locação oferecem uma opção muito conveniente para quem deseja retirar o carro
                        diretamente no local. No entanto, como a demanda costuma ser maior, os preços tendem a ser
                        ligeiramente mais altos. Algumas locadoras oferecem serviços de transporte do aeroporto para a
                        agência e vice-versa.</p>
                </div>
            </div>
    </section>

    
    <!-- OFERTAS EXCLUSIVAS -->
    <div class="oferta-box">
        <section class="d-flex container justify-content-center align-items-center">
            <div class="oferta-box">
                <h1>INSCREVA-SE PARA RECEBER <b>OFERTAS EXCLUSIVAS</b></h1>
                
            </div>
            <div class="oferta">
                
                <form action="">
    
                    <input type="text" id="nome" placeholder="Nome" />
                    <input type="text" id="nome" placeholder="Digite seu e-mail" />
                    <button class="btn-oferta">Eu Quero</button>
                </form>
            </div>
    
        </section>
    
    </div>

    <div class="footer-box">
        <footer class="footer container d-flex flex-column">
            <div class="d-flex container">
                <div class="col"><img src="assets/logo.svg" alt="">
                </div>
                <div class="col pe-5">
                    <p class="fw-bold">Somos LocaDrive</p>
                    <h1>Ajuda</h1>
                    <h1>Configurações de Privacidade</h1>
                    <h1>Entrar</h1>
                </div>
                <div class="col pe-5">
                    <p class="fw-bold">Informações Importantes</p>
                    <h1>Política de Cookies</h1>
                    <h1>Política de Privacidade</h1>
                    <h1>Termos de Serviço</h1>
                    <h1>Dados da Empresa</h1>
                </div>
                <div class="col">
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
    </div>

    <div class="buttonzap">
        <a href='https://api.whatsapp.com/send?phone=55999999999&' class="icon" target='_blank'><i
                class="fab fa-whatsapp"></i></a>
    </div>

    <script src="./js/index.js"></script>
</body>

</html>