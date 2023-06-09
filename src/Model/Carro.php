<?php

class Carro
{
    public $nome;
    public $tipo;
    public $descricao;
    public $preco;
    public $foto;


    function __construct()
    {
        $this->nome = "";
        $this->tipo = "";
        $this->descricao = "";
        $this->preco = "";
        $this->foto = "";


    }

    function __get($nomecampo)
    {
        return $this->$nomecampo;
    }

    function __set($nomecampo, $valor){
        $this->$nomecampo = $valor;

   }

}

