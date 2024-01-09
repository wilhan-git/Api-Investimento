<?php

require_once("../assets/config/Conexao.php");

    class Investir {
        private $idUser;
        private $valorDepositado;
        private $valorLucro;
        private $valorRetirado;
        private $dataCriacao;
        private $data_Final;
        private $data_Retirada;
        private $statusInvst;


        function investe(){
            try{
                $query = Conexao::conectar()->prepare("INSERT INTO tb_Investimento(id_User,valorDepositado,valorLucro,data_Criacao,data_Final,status_Investimento) VALUE (?,?,?,?,?,?) ");
                $query->bindParam(1,$this->idUser);
                $query->bindParam(2,$this->valorDepositado);
                $query->bindParam(3,$this->valorLucro);
                $query->bindParam(4,$this->dataCriacao);
                $query->bindParam(5,$this->data_Final);
                $query->bindParam(6,$this->statusInvst);

                $query->execute();

                return true;
            }catch(PDOException $e){
                echo("Erro na Consulta" . $e);
            }
        }
        private function buscarInvestimento($idinvestimento){
                try{
                        $query= Conexao::conectar()->prepare("SELECT * FROM tb_Investimento WHERE id_Investimento = ?");
                        $query->bindParam(1,$idinvestimento);
                        $query->execute();
        
                        $investimento = $query->fetchAll();
                        return $investimento;
        
                    }catch(PDOException $e){
                        echo("Erro na Consulta".$e);
                    }
                   
        }

        private function atualizaDadosInvet($valor,$dataSaque,$status,$id){
                try{
                        $query= Conexao::conectar()->prepare("UPDATE tb_Investimento SET valorRetirado = ?, data_Retirada = ?, status_Investimento = ? WHERE id_Investimento = ?");
                        $query->bindParam(1,$valor);
                        $query->bindParam(2,$dataSaque);
                        $query->bindParam(3,$status);
                        $query->bindParam(4,$id);
                        $query->execute();

                        return true;
        
                    }catch(PDOException $e){
                        echo("Erro na Consulta".$e);
                    }   
        }

        public function atualizarCaixa($id,$valor){
                try{
                        $query= Conexao::conectar()->prepare("UPDATE tb_user SET CaixaUser = ? WHERE idtb_User = ?");
                        $query->bindParam(1,$valor);
                        $query->bindParam(2,$id);
                
                        $query->execute();

                        return true;
        
                    }catch(PDOException $e){
                        echo("Erro na Consulta".$e);
                    } 
        }
        

        function saqueInvest($idinvestimento,$dataAtual)
        {
            
            $dado = $this->buscarInvestimento($idinvestimento);
         
            if((strtotime($dataAtual) >= strtotime($dado[0]['data_Criacao'])) && (strtotime($dataAtual)<=strtotime($dado[0]['data_Final']))){
                $meses = $this->calcularMeses($this->formataData($dado[0]['data_Criacao']),$this->formataData($dataAtual));
                $valorganho = $meses * ($dado[0]['valorDepositado'] * 0.0052);
                $investimento = $dado[0]['valorDepositado'] + $this->tributos($meses, $valorganho);
                $this->atualizaDadosInvet($investimento,$dataAtual,'Sacado',$idinvestimento);
    
                return $investimento;
            }
          
            
        }

        private function calcularMeses($dataInicial,$dataAtual)
        {
            $periodoInvest = $dataInicial->diff($dataAtual);
    
            $tempoInvest = $periodoInvest->y * 12 + $periodoInvest->m;
    
    
            return $tempoInvest;
        }
    
        private function tributos($meses, $ganhoComposto)
        {
            if ($meses < 12) {
                $lucro = $ganhoComposto - ($ganhoComposto * 0.225);
                return $lucro;
            } else if ($meses <= 24 && $meses >= 12) {
                $lucro = $ganhoComposto - ($ganhoComposto * 0.185);
                return $lucro;
            } else {
                $lucro = $ganhoComposto - ($ganhoComposto * 0.15);
                return $lucro;
            }
        }

        private function formataData($data){
                $dataformatada = new DateTime($data);
                return $dataformatada;
        }
        /**
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */ 
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of valorDepositado
         */ 
        public function getValorDepositado()
        {
                return $this->valorDepositado;
        }

        /**
         * Set the value of valorDepositado
         *
         * @return  self
         */ 
        public function setValorDepositado($valorDepositado)
        {
                $this->valorDepositado = $valorDepositado;

                return $this;
        }

        /**
         * Get the value of valorLucro
         */ 
        public function getValorLucro()
        {
                return $this->valorLucro;
        }

        /**
         * Set the value of valorLucro
         *
         * @return  self
         */ 
        public function setValorLucro($valorLucro)
        {
                $this->valorLucro = $valorLucro;

                return $this;
        }

        /**
         * Get the value of valorRetirado
         */ 
        public function getValorRetirado()
        {
                return $this->valorRetirado;
        }

        /**
         * Set the value of valorRetirado
         *
         * @return  self
         */ 
        public function setValorRetirado($valorRetirado)
        {
                $this->valorRetirado = $valorRetirado;

                return $this;
        }

        /**
         * Get the value of dataCriacao
         */ 
        public function getDataCriacao()
        {
                return $this->dataCriacao;
        }

        /**
         * Set the value of dataCriacao
         *
         * @return  self
         */ 
        public function setDataCriacao($dataCriacao)
        {
                $this->dataCriacao = $dataCriacao;

                return $this;
        }

        /**
         * Get the value of data_Final
         */ 
        public function getData_Final()
        {
                return $this->data_Final;
        }

        /**
         * Set the value of data_Final
         *
         * @return  self
         */ 
        public function setData_Final($data_Final)
        {
                $this->data_Final = $data_Final;

                return $this;
        }

        /**
         * Get the value of data_Retirada
         */ 
        public function getData_Retirada()
        {
                return $this->data_Retirada;
        }

        /**
         * Set the value of data_Retirada
         *
         * @return  self
         */ 
        public function setData_Retirada($data_Retirada)
        {
                $this->data_Retirada = $data_Retirada;

                return $this;
        }

        /**
         * Get the value of statusInvst
         */ 
        public function getStatusInvst()
        {
                return $this->statusInvst;
        }

        /**
         * Set the value of statusInvst
         *
         * @return  self
         */ 
        public function setStatusInvst($statusInvst)
        {
                $this->statusInvst = $statusInvst;

                return $this;
        }
    }
?>