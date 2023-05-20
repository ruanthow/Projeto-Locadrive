let renderConteudo = document.querySelector(".renderConteudo");

function htmlCliente(){
    return (
        renderConteudo.innerHTML =
        `
                <div class='col-12' id="formSearch">
                    <div class='d-flex'>
                        <h2>Clientes</h2>
                        <input class='form-input' type='text' id="inputSearch">
                        <button type='button' id="btnSearch" onclick="getAllUsers()">Buscar</button>
                        <div class='col-2'>
                            <select id='typeData' class='form-select' aria-label='Default select example'>
                                <option value='id'>id</option>
                                <option value='nome'>nome</option>
                                <option value='email'>email</option>
                            </select>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center'>
                        <div class='col-10'>
                            <table class='table table-dark'>
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
                </div>`
    )
}