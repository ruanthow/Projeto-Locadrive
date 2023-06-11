let teste;

window.onload = ()=>{
    buscarCarro()
}

function buscarCarro() {

    let htmlcarros = document.querySelector(".espaco")
    let contador = 0

    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/getCarro.php',
        type: 'GET',
        datatype: 'json'
    }).done((data) => {
       let carros = JSON.parse(data);
        teste = carros;
        for (let l = 0; l < carros.length ; l++) {
            if(l == 0 || l%3 == 0){
                let element = document.createElement("div");
                var div = htmlcarros.appendChild(element)
                div.classList.add("d-flex")    
            }
            div.innerHTML += `
                <div class="cards-car mx-3">
                    <img class="img-car" src="assets/hatch-argo.png" alt="">
                    <h1>${carros[l].nome}</h1>
                    <p class="descricao-car">${carros[l].descricao}</p>
                    <p class="texto-card">Sua reserva garante um dos carros desse grupo. Modelo sujeito à disponibilidade da agência.</p>
                    <div class="preco">
                        <p>A partir de:</p>
                        <p><span>R$187,70</span></p>
                        <p>*Proteções e taxa de aluguel (12%)<br> não inclusas neste valor.</p>
                    </div>
                    <button class="but-card" onclick="abrirModal(${l})">Reserve Agora</button>
                    ${console.log(l)}
                </div>
                `

        }
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.log(errorThrown);
    })



}

function abrirModal(num){
    console.log(teste[num]);
}