function buscarCarro(){

    let htmlcarros = document.querySelector(".espaco")
    let contador = 1
    let div = document.createElement("div");
    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/getCarro.php',
        type: 'GET',
        datatype: 'json'
    }).done((data)=>{
        carros = JSON.parse(data);
        console.log(carros)
        // carros.map((carro)=>{
            for (let i = 0; i < carros.length; i++) {
                contador++
                if(contador==3){

                let div = document.createElement('div');
                div.className = "div-card d-flex col-9 justify-content-center align-items-center text-center";

                div.innerHTML += `
                    <div class="cards-car">
                        <img class="img-car" src="assets/hatch-argo.png" alt="">
                        <h1>${carros[contador-3].nome}</h1>
                        <p class="descricao-car">${carros[contador-3].descricao}</p>
                        <p class="texto-card">Sua reserva garante um dos carros desse grupo. Modelo sujeito à disponibilidade da agência.</p>
                        <div class="preco">
                            <p>A partir de:</p>
                            <p><span>R$187,70</span></p>
                            <p>*Proteções e taxa de aluguel (12%)<br> não inclusas neste valor.</p>
                        </div>
                        <button class="but-card">Reserve Agora</button>
                    </div>
                `
                div.innerHTML += `
                    <div class="cards-car">
                        <img class="img-car" src="assets/hatch-argo.png" alt="">
                        <h1>${carros[contador-2].nome}</h1>
                        <p class="descricao-car">${carros[contador-2].descricao}</p>
                        <p class="texto-card">Sua reserva garante um dos carros desse grupo. Modelo sujeito à disponibilidade da agência.</p>
                        <div class="preco">
                            <p>A partir de:</p>
                            <p><span>R$187,70</span></p>
                            <p>*Proteções e taxa de aluguel (12%)<br> não inclusas neste valor.</p>
                        </div>
                        <button class="but-card">Reserve Agora</button>
                    </div>
                `
                div.innerHTML += `
                    <div class="cards-car">
                        <img class="img-car" src="assets/hatch-argo.png" alt="">
                        <h1>${carros[contador].nome}</h1>
                        <p class="descricao-car">${carros[contador].descricao}</p>
                        <p class="texto-card">Sua reserva garante um dos carros desse grupo. Modelo sujeito à disponibilidade da agência.</p>
                        <div class="preco">
                            <p>A partir de:</p>
                            <p><span>R$187,70</span></p>
                            <p>*Proteções e taxa de aluguel (12%)<br> não inclusas neste valor.</p>
                        </div>
                        <button class="but-card">Reserve Agora</button>
                    </div>
                `
                htmlcarros.appendChild(div);
                contador=0
                }
            }
            
        
    }).fail((jqXHR, textStatus, errorThrown)=>{
        console.log(errorThrown);
    })



}