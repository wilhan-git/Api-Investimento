<?php


require_once("model/ValidaLogin.php");

class Login extends ValidaLogin{

        public function __construct(
            public $email,
            public $senha
        ) {
           
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }
    }
?>