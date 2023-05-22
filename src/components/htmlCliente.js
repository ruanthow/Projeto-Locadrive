let renderConteudo = document.querySelector(".renderConteudo");

function htmlCliente(){
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
        <div class='d-flex justify-content-center'>
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