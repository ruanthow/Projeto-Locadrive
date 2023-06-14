let renderConteudo = document.querySelector(".renderConteudo");

export function updateCliente(valores){
    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/updateCliente.php',
        type: 'POST',
        data: valores,
        datatype: 'json'
    }).done((data)=>{

        renderConteudo.innerHTML = 
        `<div class="boxAlerta d-flex justify-content-center align-items-center h-100">
            <h4>Atualizado com sucesso</h4>
        </div>`
    

    }).fail((jqXHR, textStatus, errorThrown)=>{

        renderConteudo.innerHTML = 
        `<div class="boxAlerta d-flex justify-content-center align-items-center h-100">
            <h4>Ocorreu um erro entre em contato com os responsáveis</h4>
        </div>`

    })
}