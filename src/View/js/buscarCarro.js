let carro

window.onload = () => {
    buscarCarro()
}

function buscarCarro() {
    document.getElementById("tipo").innerHTML="SEDAN"

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
        let newformat
        for (let l = 0; l < carros.length; l++) {
            let valor = carro[l].preco.toString();
            if(valor.includes(".")){
                let antesDaVirgula = valor.substring(0, valor.indexOf("."));
                let depoisDaVirgula = valor.substring(valor.indexOf("."), 10); 
                let separador = depoisDaVirgula.split(""); 
                let contador = separador.length;
                console.log(separador);
                console.log(contador);
                if(contador > 2){
                     newformat = antesDaVirgula+depoisDaVirgula.replace(".",",")
                    console.log(newformat);
                }
                else if(contador == 2){
                     newformat = antesDaVirgula+depoisDaVirgula.replace(".",",")+"0"
                    console.log(newformat);
                }
            }
            else{
                     newformat = carro[l].preco+",00"
                    console.log(newformat);
            }
            
           
            if (l == 0 || l % 3 == 0) {
                element = document.createElement("div");
                div = htmlcarros.appendChild(element)
                div.classList.add("rowCars", "d-flex")
            }
            div.innerHTML += `
            <div class="cardsCar col p-4">
            <img src="${carro[l].foto}" alt="carro hatch">
            <h1 class="fs-2 py-3">${carro[l].nome}</h1>
            <div class="infoClasses">
                <h2>${carro[l].descricao}</h2>
                <div class="preco">
                    <p>A partir de:</p>
                    <p><span>R$${newformat} /dia</span></p>
                    <p>*Proteções e taxa de aluguel (12%)<br> não inclusas neste valor.</p>
                </div>
            </div>
            <button class="btn btn-primary fw-bold" onclick="abrirModal(${l})">Reserve Agora</button>
        </div>
                `

        }
    }).fail((jqXHR, textStatus, errorThrown) => {
        htmlcarros.innerHTML = 
        `<div class="boxAlerta">
            <h4>Ocorreu um erro entre em contato com os responsáveis</h4>
        </div>`
    })



}

function abrirModal(index) {
    var modal = document.getElementById("myModal");
    document.querySelector("#tipoCarro").innerText = carro[index].tipo;
    document.querySelector("#imagemCarro").src = carro[index].foto;
    document.querySelector("#nomeCarro").innerText = carro[index].nome;
    document.querySelector("#preçoCarro").innerText = "R$ " + carro[index].preco;
    document.querySelector("#descriçãoCarro").innerText = carro[index].descricao;
    modal.style.display = "block";
}

function fecharModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}   
