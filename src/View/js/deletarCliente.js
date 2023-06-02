


function alertaDelete(){
    let alertaConfirmacao = document.querySelector(".alertaConfirmacao");
    alertaConfirmacao.innerHTML = 
    `
    <div class="boxAlerta">
        <h4>Tem certeza que deseja excluir esse cliente ?</h4>
        <div class="botaoAlerta d-flex justify-content-around">
            <button onclick="deletarCliente()">Sim</button>
            <button onclick="cancelarDelete()">Não</button>
        </div>
    </div>
    `
}

function cancelarDelete(){
    let alertaConfirmacao = document.querySelector(".alertaConfirmacao");
    alertaConfirmacao.innerHTML = "";
    let inputSearch = document.getElementById("inputSearch");
    inputSearch.value = "";
}


function deletarCliente(){
    let inputSearch = document.getElementById("inputSearch");
    
    let dados ={
        id:inputSearch.value
    }

     $.ajax({
        url:"/Projeto-Locadrive/src/Controller/deleteCliente.php",
        type: "POST",
        data: dados,
        datatype: 'json'

    }).done((data)=>{
        console.log(data);
    }).fail((jqXHR, textStatus, errorThrown)=>{
        console.log(errorThrown);
    })
}