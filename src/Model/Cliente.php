<?php 

class Cliente{
    public $nome;
    public $sobrenome;
    public $email;
    public $senha;
    public $cidade;
    public $estado;
    public $telefone;
    public $usuario;
    public $cep;
    public $data;

    function __construct()
    {
        $this->nome = "";
        $this->sobrenome = "";
        $this->email = "";
        $this->senha = "";
        $this->cidade = "";
        $this->estado = "";
        $this->usuario = "";
        $this->telefone = "";
        $this->cep = "";
        $this->data = "";
    }

   function __get($nomecampo){
        return $this->$nomecampo;
   }

   function __set($nomecampo, $valor){
        $this->$nomecampo = $valor;

   }
}


?>