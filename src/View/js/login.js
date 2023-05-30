let email = document.getElementById("email");
let senha = document.getElementById("senha");


function logar() {

    let dados = {
        
        email:email.value,
        senha:senha.value,
        action:"login"
    }

    $.ajax({
        url: "/Projeto-Locadrive/src/Controller/loginCliente.php",
        type: 'POST',
        data: dados,
        datatype: 'json'
    }).done((data)=>{
        console.log(data);
        
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.log(errorThrown);
    })
}