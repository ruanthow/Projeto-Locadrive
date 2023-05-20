
let campos = document.querySelectorAll(".required"); // pegar todos os campos do form
let msgErro = document.querySelectorAll(".validacao"); // pegar todos os spans com msg de erro
let msgErroData = document.querySelector(".validacaoData"); // span unico para erro de compatibilidade do compo data

// campos filtrados para enviar a requisição

let nomeValid = "";
let sobrenomeValid = "";
let usuarioValid = "";
let senhaValid = "";
let cidadeValid = "";
let estadoValid = "";
let cepValid = "";
let telefoneValid = 0;
let emailValid = "";
let dataValid = "";



//Tornar msg de erro de campo especifico visivel
function setError(num, num2) {
    if (num2 == undefined) {
        campos[num].style.border = "1px solid red";
        msgErro[num].style.display = "block";
    }
    else {
        campos[num].style.border = "1px solid red";
        msgErro[num].style.display = "block";
        campos[num2].style.border = "1px solid red";
        msgErro[num2].style.display = "block";
    }
}
//Tornar msg de erro de compatibilidade de campo data visivel
function setErrorData() {
    campos[9].style.border = "1px solid red";
    msgErroData.style.display = "block";
}

//Tornar msg de erro de compatibilidade de campo data invisivel
function setValidData() {
    campos[9].style.border = "1px solid #ced4da";
    msgErroData.style.display = "none";
}

//Tornar msg de erro de campo especifico invisivel
function setValid(num, num2) {
    if (num2 == undefined) {
        campos[num].style.border = "1px solid #ced4da";
        msgErro[num].style.display = "none";
    }
    else {
        campos[num].style.border = "1px solid #ced4da";
        msgErro[num].style.display = "none";
        campos[num2].style.border = "1px solid #ced4da";
        msgErro[num2].style.display = "none";
    }

}


// validaçao de caracteres para campo nome e sobrenome
function validNameSobrenome() {
    let nomeRegex = new RegExp(/(^[a-zA-Zà-úÀ-Ú ]*$)/gm);
    let sobrenomeRegex = new RegExp(/(^[a-zA-Zà-úÀ-Ú ]*$)/gm);
    let campoNome = nomeRegex.test(campos[0].value);
    let campoSobrenome = sobrenomeRegex.test(campos[1].value);


    if (campoNome && campoSobrenome) {
        setValid(0, 1);
        nomeValid = campos[0].value;
        sobrenomeValid = campos[1].value;
    }
    else if (!campoNome && campoSobrenome) {
        setError(0);
        setValid(1);
    }
    else if (campoNome && !campoSobrenome) {
        setError(1);
        setValid(0);
    }
    else {
        setError(0, 1);

    }
}


function validSenha() {
    if (campos[3].value.length < 8) {
        setError(3)
    }
    else {
        setValid(3)
        senhaValid = campos[3].value;
    }
}

// validaçao de caracteres para campo estado e cidade
function validEstadoCidade() {
    let cidadeRegex = new RegExp(/(^[a-zA-Zà-úÀ-Ú ]*$)/gm);
    let estadoRegex = new RegExp(/(^[a-zA-Zà-úÀ-Ú ]*$)/gm);
    let campoEstado = estadoRegex.test(campos[5].value);
    let campoCidade = cidadeRegex.test(campos[4].value);

    if (campoEstado && campoCidade) {
        setValid(5, 4);
        estadoValid = campos[5].value;
        cidadeValid = campos[4].value;
    }
    else if (!campoEstado && campoCidade) {
        setError(5);
        setValid(4);
    }
    else if (campoEstado && !campoCidade) {
        setError(4);
        setValid(5);
    }
    else {
        setError(5, 4);

    }
}

//validar campo para cep valido
function validCep() {
    let cep;
    if (campos[6].value.length < 9 && campos[6].value.length > 7) {

        let str = campos[6].value;
        let inicio = str.slice(0, 5);
        let final = str.slice(5);
        cep = campos[6].value = inicio + "-" + final;
    }

    let Regex = new RegExp(/^[0-9]{5}[-][0-9]{3}$/gm);
    let campoCep = Regex.test(cep);

    if (campoCep) {
        setValid(6);
        cepValid = cep;
    }
    else {
        setError(6);
    }

}

// validar campo de telefone com apenas numeros
function validTelefone() {
    let Regex = new RegExp(/^[0-9]{11}$/gm);
    let campoTelefone = Regex.test(campos[7].value);

    if (campoTelefone) {
        setValid(7)
        telefoneValid = campos[7].value;
    }
    else {
        setError(7)
    }
}
//validação de tipo de email
function validEmail() {
    let Regex = new RegExp(/^([A-z0-9\._-])+@([A-z])+[.]+[A-z]{2,4}$/gm);
    let campoEmail = Regex.test(campos[8].value);

    if (campoEmail) {
        setValid(8)
        emailValid = campos[8].value;
    }
    else {
        setError(8)
    }
}

//validação de data 
function validData() {
    let dataAgora = new Date();
    let dataAgoraDia = dataAgora.getUTCDate();
    let dataAgoraMes = (dataAgora.getMonth() + 1);
    let dataAgoraAno = dataAgora.getFullYear();
    let data = campos[9].value.split("-");
    let Regex = new RegExp(/^([0-9]{4})+[-]+([0-9]{2})+[-]+([0-9]{2})$/gm);
    let campoData = Regex.test(campos[9].value);

    if (campoData) {
        setValidData();
        let calcAno = dataAgoraAno - data[0];
        let calcMes = dataAgoraMes - data[1];
        let calcDia = dataAgoraDia - data[2];

        if (calcAno == 18 && calcMes >= 0 && calcDia >= 0) {
            setValid(9)
            dataValid = campos[9].value;
        }
        else if (calcAno > 18) {
            setValid(9)
            dataValid = campos[9].value;
        }
        else {
            setError(9)
        }
    }
    else {
        setErrorData();
    }
}

function enviar() {
    let response;
    usuarioValid = campos[2].value;
    let dados = {

        nomeValid:nomeValid,
        sobrenomeValid:sobrenomeValid,
        usuarioValid:usuarioValid,
        senhaValid:senhaValid,
        cidadeValid:cidadeValid,
        estadoValid:estadoValid,
        cepValid:cepValid,
        telefoneValid:telefoneValid,
        emailValid:emailValid,
        dataValid:dataValid

    }

    if (nomeValid != "", sobrenomeValid != "", usuarioValid != "", senhaValid != "", cidadeValid != "", estadoValid != "", cepValid != "", telefoneValid != "", emailValid != "", dataValid != "") {
        // $.post("/Projeto-Locadrive/src/Controller/createCliente.php", dados, (data, status)=>{
        //     console.log(data);
        // })

        $.ajax({
            url: '/Projeto-Locadrive/src/Controller/createCliente.php',
            type: 'POST',
            data: dados,
            datatype: 'json'
        })
        .done((data)=>{
            console.log(data);
            window.location.href = "http://localhost/Projeto-Locadrive/src/View/"
        })
        .fail((jqXHR, textStatus, errorThrown)=>{
            console.log(errorThrown);
        });
            
    }
    else {
        console.log("erroado");
    }
}