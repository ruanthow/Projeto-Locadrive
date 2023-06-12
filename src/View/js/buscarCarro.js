let carro 

window.onload=()=>{
    buscarCarro()
}

function buscarCarro() {

    let htmlcarros = document.querySelector(".espaco")

    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/getCarro.php',
        type: 'GET',
        datatype: 'json'
    }).done((data) => {
        let carros = JSON.parse(data);
        carro = carros
        htmlcarros.innerHTML = "";
        let element = document.createElement("div");
        var div = htmlcarros.appendChild(element)
        for (let l = 0; l < carros.length ; l++) {
            if(l == 0 || l%3 == 0){  
                element = document.createElement("div");
                div = htmlcarros.appendChild(element)
                div.classList.add("rowCars", "d-flex")    
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
                </div>
                `

        }
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.log(errorThrown);
    })



}

function abrirModal(index) {
    var modal = document.getElementById("myModal");
    document.querySelector("#tipoCarro").innerText = carro[index].tipo;
    document.querySelector("#imagemCarro").src = carro[index].imagem;
    document.querySelector("#nomeCarro").innerText = carro[index].nome;
    document.querySelector("#preçoCarro").innerText = "R$ "+carro[index].preco;
    document.querySelector("#descriçãoCarro").innerText = carro[index].descricao;
    modal.style.display = "block";
}

function fecharModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }   
