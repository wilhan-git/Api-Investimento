<?php

class ContaUser
{
    private $saldo;


    public function depositar($deposito)
    {
        $this->saldo = $this->saldo + $deposito;
    }


    public function sacar($idUser, $idIvestimento, $data,$caixa)
    {
        $saque = new Investir();
        $valorSaque =  $saque->saqueInvest($idIvestimento, $data) + $caixa;
        $saque->atualizarCaixa($idUser, $valorSaque);

        if($saque==true){

            return $this->setSaldo($valorSaque);
        }

        
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($valor)
    {
        $this->saldo = +$valor;
        return $this;
    }
}
