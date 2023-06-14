let email = document.getElementById("email");
let senha = document.getElementById("senha");
let msgErro = document.querySelector(".msgErro");

function logar() {
    if(email.value != "" && senha.value){
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
            if(data == "logado"){
                window.location.href = "/Projeto-Locadrive/src/View/index.php";
                msgErro.style.display = "none"
            }
            else{
                msgErro.style.display = "flex"
            }
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.log(errorThrown);
        })
    }
   else{
    console.log("ta vazio");
   }
}