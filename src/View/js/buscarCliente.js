

 
function getAllUsers(){
    let currentOption = document.querySelector("#typeData");
    let inputSearch = document.querySelector("#inputSearch");
    let tableBody = document.querySelector("#tableBody");

    
    let response = [];
    let dados = {
        valor: inputSearch.value,
        fieldName: currentOption.value
    }

    $.post("/Projeto-Locadrive/src/Controller/getCliente.php", dados , (data, status)=>{
            
            response = JSON.parse(data)
            tableBody.innerHTML = ''
            response.map((client)=>{
                return(
                    
                    tableBody.innerHTML += 
                        `
                            <tr>
                                <td>${client.id}</td>
                                <td>${client.nome}</td>
                                <td>${client.sobrenome}</td>
                                <td>${client.email}</td>
                                <td>${client.senha}</td>
                                <td>${client.cidade}</td>
                                <td>${client.estado}</td>
                                <td>${client.telefone}</td>
                                <td>${client.cep}</td>
                                <td>${client.data_nasc}</td>
                            </tr>
                        `
                )
            })
    })

  
       
   


}

function getUserFromUpdate(){
    let currentOption = document.querySelector("#typeData");
    let inputSearch = document.querySelector("#inputSearch");
   

    let response = []

    let dados = {
        valorOfUpdate: inputSearch.value,
        optionOfUpdate: currentOption.value
    }

    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/getCliente.php',
        type: 'POST',
        data: dados,
        datatype: 'json'
    }).done((data)=>{
        response = JSON.parse(data);
        inputValues(response);
    }).fail((jqXHR, textStatus, errorThrown)=>{
        console.log(errorThrown);
    })

}

function inputValues(client){
    let campos = document.querySelectorAll(".required");
    
    campos[0].value = client[0].nome
    campos[1].value = client[0].sobrenome
    campos[2].value = client[0].usuario
    campos[3].value = client[0].senha
    campos[4].value = client[0].cidade
    campos[5].value = client[0].estado
    campos[6].value = client[0].cep
    campos[7].value = client[0].telefone
    campos[8].value = client[0].email
    campos[9].value = client[0].data_nasc
}
