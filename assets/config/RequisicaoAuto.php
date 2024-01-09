<?php
    require_once("/xampp/htdocs/Api-Investimento/assets/config/Conexao.php");
    class ConsultaAuto{

        public function listaInvestimento($id,$status){

            try{
                $query= Conexao::conectar()->prepare("SELECT * FROM tb_Investimento WHERE id_USer = ? AND status_Investimento = ?");
                $query->bindParam(1,$id);
                $query->bindParam(2,$status);
                $query->execute();

                $lista = $query->fetchAll();
                return $lista;

            }catch(PDOException $e){
                echo("Erro na Consulta".$e);
            }
           
        }

    }
?>