<?php
require_once("../model/Cadastrar.php");
class Usuario extends User
{
    public function __construct(
        public $nome,
        public $sobrenome,
        public $email,
        public $senha,
        public $contato,
        public $deposito
    ) {
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getContato()
    {
        return $this->contato;
    }
    public function getDeposito()
    {
        return $this->deposito;
    }
}
