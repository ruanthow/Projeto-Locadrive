import {paramsCampos} from "http://localhost/Projeto-Locadrive/src/components/validacao.js";

let renderConteudo = document.querySelector(".renderConteudo");
let teste = document.querySelector("#teste");

window.htmlListar = function (){
    return (
        renderConteudo.innerHTML =
        `
        <div class='col-12' id="formSearch">
        <div class='menuPesquisa d-flex align-items-center'>
            <h4>Clientes</h4>
            <div class="menuPesquisaInput">
                <input class='form-input' type='text' id="inputSearch" placeholder="pesquisar"/>
                <button type='button' id="btnSearch" onclick="getAllUsers()">
                    <div>
                        <img src="./assets/iconSend.svg" alt="">
                    </div>
                </button>
            </div>
            <div class='col-2'>
                <select id="typeData" class='menuPesquisaSelect form-select' aria-label='Default select example'>
                    <option value='id'>id</option>
                    <option value='nome'>nome</option>
                    <option value='email'>email</option>
                </select>
            </div>
        </div>
        <div class='d-flex justify-content-center'>
            <div class='boxTable col-10'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>id</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>Sobrenome</th>
                            <th scope='col'>email</th>
                            <th scope='col'>senha</th>
                            <th scope='col'>cidade</th>
                            <th scope='col'>estado</th>
                            <th scope='col'>telefone</th>
                            <th scope='col'>cep</th>
                            <th scope='col'>data</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        `
    )
}



window.htmlEditar = function (){
    renderConteudo.innerHTML = 
    `
    <div class='col-12' id="formSearch">
        <div class='menuPesquisa d-flex align-items-center'>
            <h4>Clientes</h4>
            <div class="menuPesquisaInput">
                <input class='form-input' type='text' id="inputSearch" placeholder="pesquisar"/>
                <button type='button' id="btnSearch" onclick="getAllUsers()">
                    <div>
                        <img src="./assets/iconSend.svg" alt="">
                    </div>
                </button>
            </div>
            <div class='col-2'>
                <select id="typeData" class='menuPesquisaSelect form-select' aria-label='Default select example'>
                    <option value='id'>id</option>
                    <option value='nome'>nome</option>
                    <option value='email'>email</option>
                </select>
            </div>
        </div>
    </div>    
    <div class="content">
      <form method="post" class="col-7">
        <input type="hidden" name="cad" value="cadastrar">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault01">Nome</label>
            <input type="text" onchange="validNameSobrenome()" name="nome" id="nome" class="form-control required"
              placeholder="Nome" required>
            <span class="validacao">Não ultilize números ou caracteres especias</span>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault02">Sobrenome</label>
            <input type="text" onchange="validNameSobrenome()" name="sobrenome" class="form-control required"
              id="sobrenome" placeholder="Sobrenome" value="" required>
            <span class="validacao">Não ultilize números ou caracteres especias</span>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefaultUsername">Usuário</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
              </div>
              <input type="text" class="form-control required" id="usuario" placeholder="Usuário"
                aria-describedby="inputGroupPrepend2" required>
            </div>
            <span class="validacao">Digite um usuario válido</span>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefaultPassword">Senha</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend1">*</span>
              </div>
              <input type="password" onchange="validSenha()" name="senha" class="form-control required" id="senha"
                placeholder="Senha" aria-describedby="inputGroupPrepend1" required>
            </div>
            <span class="validacao">Minimo de 8 caracteres</span>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault03">Cidade</label>
            <input type="text" onchange="validEstadoCidade()" name="cidade" class="form-control required" id="cidade"
              placeholder="Cidade" required>
            <span class="validacao">Digite o nome da sua cidade</span>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault04">Estado</label>
            <input type="text" onchange="validEstadoCidade()" name="estado" class="form-control required" id="estado"
              placeholder="Estado" required>
            <span class="validacao">Digite o nome da sua Estado</span>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault05">CEP</label>
            <input type="text" onchange="validCep()" name="cep" class="form-control required" id="cep" placeholder="CEP"
              required>
            <span class="validacao">Digite seu cep</span>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault06"> Telefone</label>
            <input type="text" onchange="validTelefone()" name="telefone" class="form-control required" id="telefone"
              placeholder="Telefone" required>
            <span class="validacao">Digite seu telefone</span>
          </div>
          <div class="col-md-5 mb-3">
            <label for="validationDefault07">E-mail</label>
            <input type="text" onchange="validEmail()" name="email" class="form-control required" id="email"
              placeholder="E-mail" required>
            <span class="validacao">Digite um email válido</span>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault08">Data de Nascimento</label>
            <input type="date" onchange="validData()" name="data" class="form-control required" id="data"
              placeholder="Aniversário" required>
            <span class="validacao">Deve ser maior de idade</span>
            <span class="validacaoData">Data invalida</span>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check col-md-6 mb-3">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Concordo com os termos e condições
            </label>
          </div>
          <img class="img-car"
            src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/96fdb578684029.5cac4a000cece.gif" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
          <span class="validacao">Preencha todos os campos corretamente</span>
        </div>
        <button class="btn-primary" type="button" onclick="enviar()">Enviar</button>
      </form>
    </div>
    `
    paramsCampos(".required", ".validacao", ".validacaoData");
}

