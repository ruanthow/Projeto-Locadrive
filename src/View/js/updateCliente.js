
export function updateCliente(valores){
    $.ajax({
        url: '/Projeto-Locadrive/src/Controller/updateCliente.php',
        type: 'POST',
        data: valores,
        datatype: 'json'
    }).done((data)=>{

        console.log(data);

    }).fail((jqXHR, textStatus, errorThrown)=>{

        console.log(errorThrown);

    })
}