let carros
let btnFiltro = document.querySelectorAll(".btnFiltro");
let modalContent = document.querySelector(".modal-box")

window.onload = () => {
    buscarCarro()
    
}

function buscarCarro() {
    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/getCarro.php',
        type: 'GET',
        datatype: 'json'
    }).done((data) => {
        carros = JSON.parse(data);
        filtros('suv', 0)

    }).fail((jqXHR, textStatus, errorThrown) => {
        htmlcarros.innerHTML = 
        `<div class="boxAlerta">
            <h4>Ocorreu um erro entre em contato com os responsáveis</h4>
        </div>`
    })



}

function abrirModal(index) {
    var modal = document.getElementById("myModal");
    document.querySelector("#tipoCarro").innerText = carros[index].tipo;
    document.querySelector("#imagemCarro").src = carros[index].foto;
    document.querySelector("#nomeCarro").innerText = carros[index].nome;
    document.querySelector("#preçoCarro").innerText = "R$ " + carros[index].preco;
    document.querySelector("#descriçãoCarro").innerText = carros[index].descricao;
    modal.style.display = "block";
}

function fecharModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}   

function filtros(filtro, numero){

    if(numero == 0){
        document.getElementById("tipo").innerHTML="SUV"
        btnFiltro[numero].style.backgroundColor = "#550FED";
        btnFiltro[1].style.backgroundColor = "transparent";
        btnFiltro[2].style.backgroundColor = "transparent";
    }
    else if(numero == 1){
        document.getElementById("tipo").innerHTML="HATCH"
        btnFiltro[numero].style.backgroundColor = "#550FED";
        btnFiltro[0].style.backgroundColor = "transparent";
        btnFiltro[2].style.backgroundColor = "transparent";
    }
    else{
        document.getElementById("tipo").innerHTML="SEDAN"
        btnFiltro[numero].style.backgroundColor = "#550FED";
        btnFiltro[1].style.backgroundColor = "transparent";
        btnFiltro[0].style.backgroundColor = "transparent";
    }
    let htmlcarros = document.querySelector(".espaco")
    htmlcarros.innerHTML = "";
    let element = document.createElement("div");
    var div = htmlcarros.appendChild(element)
    let newformat
    
    
    for (let l = 0; l < carros.length; l++) {
        let valor = carros[l].preco.toString();
        if(valor.includes(".")){
            let antesDaVirgula = valor.substring(0, valor.indexOf("."));
            let depoisDaVirgula = valor.substring(valor.indexOf("."), 10); 
            let separador = depoisDaVirgula.split(""); 
            let contador = separador.length;
            if(contador > 2){
                 newformat = antesDaVirgula+depoisDaVirgula.replace(".",",")
                
            }
            else if(contador == 2){
                 newformat = antesDaVirgula+depoisDaVirgula.replace(".",",")+"0"
               
            }
        }
        else{
                 newformat = carros[l].preco+",00"
            
        }
        
       
        if (l == 0 || l % 3 == 0 ) {
            element = document.createElement("div");
            div = htmlcarros.appendChild(element);
            div.classList.add("rowCars", "d-flex");
        }
        if(carros[l].tipo == filtro){
            div.innerHTML += `
            <div class="cardsCar col p-4">
            <img src="${carros[l].foto}" alt="carro hatch">
            <h1 class="fs-2 py-3">${carros[l].nome}</h1>
            <div class="infoClasses">
                <h2>${carros[l].descricao}</h2>
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

    }
}

function ConfirmarCompra(){
    modalContent.innerHTML = "<lottie-player src='https://assets6.lottiefiles.com/packages/lf20_gktj7rsr.json' background='transparent' speed='2' style='width: 100%; height: 100%;' autoplay></lottie-player>";
    setTimeout(()=>{
        window.location.href = "http://localhost/Projeto-Locadrive/src/View/"
    },3000)
}