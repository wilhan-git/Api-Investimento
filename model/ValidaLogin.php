<?php

require_once("/xampp/htdocs/Api-Investimento/assets/config/Conexao.php");
require_once("/xampp/htdocs/Api-Investimento/control/Login.php");


class ValidaLogin{

    public $email;
    public $senha;
    public $idUser;
    public $username;
    public $sobrenome;
    public $contato;
    public $deposito;

    public function __construct(
        private readonly Login $user
    ) {
        $this->email = $this->user->getEmail();
        $this->senha =$this->user->getSenha();
     }

      public function getNome(){
        return $this->username;
      }


      public function getSobreNome(){
        return $this->sobrenome;
      }

      public function getContato(){
        return $this->contato;
      }
      public function getId(){
        return $this->idUser;
      }

      public function getDeposito(){
        return $this->deposito;
      }

     function valida()
     {
       try {

         $query = Conexao::conectar()->prepare("SELECT * FROM tb_user WHERE Email = ?");
         $query->bindParam(1, $this->email);
         $query->execute();
         $verifica = $query->fetchAll();
         if($query->rowCount() > 0) {
             if ($this->senha == $verifica[0]["Senha_User"]) {
               $this->idUser = $verifica[0]["idtb_User"];
               $this->username = $verifica[0]["Nome_User"];
               $this->sobrenome = $verifica[0]["Sobrenome_User"];
               $this->contato = $verifica[0]["Contato"];
               $this->deposito = $verifica[0]["CaixaUser"];
               return true;
             } else {
               $msgErro = "SENHA INCORRETA, POR FAVOR INSIRA UMA SENHA VALIDA";

               return $msgErro;
             }
           }
            $msgErro = "EMAIL INCORRETO OU INEXISTENTE, POR FAVOR INSIRA UM EMAIL VALIDO";
         
            return $verifica;
       } catch (PDOException $e) {
            echo "erro na consulta";
       }
     }
}
?>