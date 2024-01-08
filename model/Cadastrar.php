<?php
    require_once("../assets/config/Conexao.php");
    require_once("../control/Usuario.php");


    class User{
        public $nome;
        public $sobrenome;
        public $email;
        public $senha;
        public $contato;
        public function __construct( 
            private readonly Usuario $usuario
            ) {
           $this->nome = $this->usuario->getNome();
           $this->sobrenome = $this->usuario->getSobrenome();
           $this->email = $this->usuario->getEmail();
           $this->senha = $this->usuario->getSenha();
           $this->contato = $this->usuario->getContato();
        }

        function cadastrarUser()
        {
            try {
                $query = Conexao::conectar()->prepare("INSERT INTO tb_user(Nome_User,Sobrenome_User,Email,Senha_User,Contato) VALUES (?,?,?,?,?)");

                $query->bindParam(1,$this->nome);
                $query->bindParam(2,$this->sobrenome); 
                $query->bindParam(3,$this->email);  
                $query->bindParam(4,$this->senha);
                $query->bindParam(5, $this->contato); 
                $resultado = $query->execute();
        
                return $resultado;
            } catch (PDOException $e) {
                echo "erro na consulta";
            }
        }
    }
?>