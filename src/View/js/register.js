import {paramsCampos} from "http://localhost/Projeto-Locadrive/src/components/validacao.js";

paramsCampos(".required", ".validacao", ".validacaoData");

export function receberValores(valores){
       $.ajax({
            url: '/Projeto-Locadrive/src/Controller/createCliente.php',
            type: 'POST',
            data: valores,
            datatype: 'json'
        })
            .done((data) => {
                console.log(data);
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                console.log(errorThrown);
            });
}


