import {paramsCampos} from "/Projeto-Locadrive/src/components/validacao.js";

paramsCampos(".required", ".validacao", ".validacaoData");

export function receberValores(valores){
       $.ajax({
            url: '/Projeto-Locadrive/src/Controller/createCliente.php',
            type: 'POST',
            data: valores,
            datatype: 'json'
        })
            .done((data) => {
                let feedback = document.querySelector(".feedback");
                let feedbackContent = document.querySelector(".feedback-content");
                let validacaoEnviar = document.getElementById("validacaoEnviar");
                console.log(data);
                if(data.email == "valid"){
                    feedback.style.display = "flex";
                    feedbackContent.innerHTML = "<lottie-player src='https://assets2.lottiefiles.com/private_files/lf30_hsabbeks.json' background='transparent' speed='2' style='width: 100%; height: 100%;' autoplay></lottie-player>";
                    setTimeout(()=>{
                        window.location.href = "http://localhost/Projeto-Locadrive/src/View/login.php";
                    },3000)
                }
                else if(data.email == "invalid"){
                    validacaoEnviar.innerHTML = "Este email já esta em uso";
                    validacaoEnviar.style.display = "block"
                }
                
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                console.log(errorThrown);
            });
}


