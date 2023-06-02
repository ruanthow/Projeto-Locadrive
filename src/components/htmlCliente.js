import {paramsCampos} from "http://localhost/Projeto-Locadrive/src/components/validacao.js";

let renderConteudo = document.querySelector(".renderConteudo");


window.htmlListar = function (){
    return (
        renderConteudo.innerHTML =
        `
        <div class='col-12' id="formSearch">
        <div class='menuPesquisa d-flex align-items-center'>
            <h4>Clientes</h4>
            <div class="menuPesquisaInput">
                <input class='form-input' type='text' id="inputSearch" placeholder="Pesquisar"/>
                <button type='button' id="btnSearch" onclick="getAllUsers()">
                    <div>
                        <img src="./assets/Arrow - Left.svg" alt="">
                    </div>
                </button>
            </div>
            
            <div class='col-2'>
                <select id="typeData" class='menuPesquisaSelect form-select' aria-label='Default select example'>
                    <option value='id'>ID</option>
                    <option value='nome'>Nome</option>
                    <option value='email'>E-mail</option>
                </select>
                
            </div>

        </div>
        <div class='visionTable d-flex justify-content-center'>
            <div class='boxTable col-10'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>id</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>Sobrenome</th>
                            <th scope='col'>E-mail</th>
                            <th scope='col'>Senha</th>
                            <th scope='col'>Cidade</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Telefone</th>
                            <th scope='col'>Cep</th>
                            <th scope='col'>Data</th>
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
        <input class='form-input' type='text' id="inputSearch" placeholder="Pesquisar" />
        <button type='button' id="btnSearch" onclick="getUserFromUpdate()">
          <div>
            <img src="./assets/Arrow - Left.svg" alt="">
          </div>
        </button>
      </div>
      <div class='col-2'>
        <select id="typeData" class='menuPesquisaSelect form-select' aria-label='Default select example'>
          <option value='id'>ID</option>
          <option value='nome'>Nome</option>
          <option value='email'>E-mail</option>
        </select>
      </div>
    </div>
  </div>
  <div class="content">
    <form method="post" class="col-12">
      <div class="d-flex flex-row justify-content-center my-4">
          <div class="col-6 d-flex justify-content-center">
            <div class="form-row">
              <div class="col-11 mb-3">
                <label for="validationDefault01">Nome</label>
                <input type="text" onchange="validNameSobrenome()" name="nome" id="nome" class="form-control required"
                  placeholder="Nome" required>
                <span class="validacao">Não ultilize números ou caracteres especias</span>
              </div>
              <div class="col-11 mb-3">
                <label for="validationDefault02">Sobrenome</label>
                <input type="text" onchange="validNameSobrenome()" name="sobrenome" class="form-control required"
                  id="sobrenome" placeholder="Sobrenome" value="" required>
                <span class="validacao">Não ultilize números ou caracteres especias</span>
              </div>
              <div class="col-11 mb-3">
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
              <div class="col-11 mb-3">
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
              <div class="form-row">
                <div class="col-11 mb-3">
                  <label for="validationDefault03">Cidade</label>
                  <input type="text" onchange="validEstadoCidade()" name="cidade" class="form-control required"
                    id="cidade" placeholder="Cidade" required>
                  <span class="validacao">Digite o nome da sua cidade</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 d-flex justify-content-center">
            <div>
              <div class="col-11 mb-3">
                <label for="validationDefault04">Estado</label>
                <input type="text" onchange="validEstadoCidade()" name="estado" class="form-control required"
                  id="estado" placeholder="Estado" required>
                <span class="validacao">Digite o nome da sua Estado</span>
              </div>
              <div class="col-11 mb-3">
                <label for="validationDefault05">CEP</label>
                <input type="text" onchange="validCep()" name="cep" class="form-control required" id="cep"
                  placeholder="CEP" required>
                <span class="validacao">Digite seu cep</span>
              </div>
              <div class="col-11 mb-3">
                <label for="validationDefault06"> Telefone</label>
                <input type="text" onchange="validTelefone()" name="telefone" class="form-control required"
                  id="telefone" placeholder="Telefone" required>
                <span class="validacao">Digite seu telefone</span>
              </div>
              <div class="col-11 mb-3">
                <label for="validationDefault07">E-mail</label>
                <input type="text" onchange="validEmail()" name="email" class="form-control required" id="email"
                  placeholder="E-mail" required>
                <span class="validacao">Digite um email válido</span>
              </div>
              <div class="col-11 mb-3">
                <label for="validationDefault08">Data de Nascimento</label>
                <input type="date" onchange="validData()" name="data" class="form-control required" id="data"
                  placeholder="Aniversário" required>
                <span class="validacao">Deve ser maior de idade</span>
                <span class="validacaoData">Data invalida</span>
              </div>
            </div>
          </div>
      </div>
      <div class="form-group">
        <div class="d-flex justify-content-center my-4">
          <input class="form-check-input mx-2" type="checkbox" value="" id="invalidCheck2" required>
          <label class="form-check-label" for="invalidCheck2">
            Concordo com os termos e condições
          </label>
        </div>
      </div>
      <div class="d-flex justify-content-center my-2">
        <button class="btn-primary" type="button" onclick="updateCliente()">Atualizar</button>
      </div>
      <div class="d-flex justify-content-center my-2">
        <span class="validacao">Preencha todos os campos corretamente</span>
      </div>
    </form>
  </div>
    `
    paramsCampos(".required", ".validacao", ".validacaoData");
}

window.htmlDeletar =  function(){
  renderConteudo.innerHTML = 
  `
    <div>
      <div class='col-12' id="formSearch">
      <div class='menuPesquisa d-flex align-items-center'>
        <h4>Clientes</h4>
        <div class="menuPesquisaInput">
          <input class='form-input' type='text' id="inputSearch" placeholder="Pesquisar" />
          <button type='button' id="btnSearch" onclick="alertaDelete()">
            <div>
              <img src="./assets/Arrow - Left.svg" alt="">
            </div>
          </button>
        </div>
        <div class='col-2'>
          <select id="typeData" class='menuPesquisaSelect form-select' aria-label='Default select example'>
            <option value='id'>ID</option>
          </select>
        </div>
      </div>
      <div class="alertaConfirmacao d-flex justify-content-center align-items-center">
        
      </div>
    </div>
    </div>
  `
}