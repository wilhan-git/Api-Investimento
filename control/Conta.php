<?php

class ContaUser
{
    private $saldo;


    public function depositar($deposito)
    {
        $this->saldo = $this->saldo + $deposito;
    }


    public function sacar($idUser, $idIvestimento, $data)
    {
        $saque = new Investir();
        $valorSaque =  $saque->saqueInvest($idIvestimento, $data);
        $saque->atualizarCaixa($idUser, $valorSaque);

        $this->setSaldo($valorSaque);

        return $valorSaque;
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
