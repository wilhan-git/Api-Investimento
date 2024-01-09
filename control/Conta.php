<?php 

    class ContaUser{
        private $saldo;
            

            public function depositar($deposito){
                $this->saldo = $this->saldo + $deposito;
            }

            
            public function sacar($idUser,$idIvestimento,$data){
               $saque = new Investir();
               $valorSaque =  $saque->saqueInvest($idIvestimento,$data); 
               $saque -> atualizarCaixa($idUser,$valorSaque);
                 
               $this->setSaldo($valorSaque);

               return $valorSaque;
            }

            public function getSaldo(){
                return $this->saldo;
            }

            public function setSaldo($valor){
                $this ->saldo =+ $valor;
                return $this;
            }
    }

    /*public $dataAtual;

    function saqueInvest($investimento, $deposito, $dataInicial)
    {
        $ganhoComposto = $deposito * 0.0052;
        $meses = $this->calcularMeses($dataInicial);
        if ($investimento > 0) {
            $investimento = $deposito + $this->tributos($meses,$ganhoComposto);

            return $investimento;
        }
    }

    function calcularMeses($dataInicial)
    {
        $periodoInvest = $dataInicial->diff($this->dataAtual);

        $tempoInvest = $periodoInvest->y * 12 + $periodoInvest->m;


        return $tempoInvest;
    }

    function tributos($meses, $ganhoComposto)
    {
        switch ($meses) {
            case $meses < 12:
                $lucro = $ganhoComposto - ($ganhoComposto * 0.225);
                return $lucro;
                break;
            case $meses < 24:
                $lucro = $ganhoComposto - ($ganhoComposto * 0.185);
                return $lucro;
                break;
            case $meses > 24:
                $lucro = $ganhoComposto - ($ganhoComposto * 0.15);
                return $lucro;
                break;
        }
    }

    if($saque<=$this->saldo){
                    $this->saldo = $this->saldo - $saque;
                    $msgInfo = "Saque Efetuado";
                    return $msgInfo;
                }

                $msgInfo = "Saldo Insuficiente";

                return $msgInfo;
    */
?>