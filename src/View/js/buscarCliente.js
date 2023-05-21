

 
function getAllUsers(){
    let currentOption = document.querySelector("#typeData");
    let inputSearch = document.querySelector("#inputSearch");
    let tableBody = document.querySelector("#tableBody");

    
    var response = [];
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

