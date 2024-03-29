<?php
require_once("../control/Conta.php");
require_once("/xampp/htdocs/Api-Investimento/model/Investimento.php");

class Investimento extends ContaUser
{

    public function __construct(
        private $idUser,
        private $valorDeposito,
        private $dataInvest,
        private $dataInicio,
        private $saldoAtual

    ) {
    }


    function criar()
    {
        if ($this->valorDeposito <= $this->saldoAtual && $this->valorDeposito > 0) {
            $meses = $this->calcularMeses($this->dataInicio, $this->dataInvest);
            $ganhoComposto = $this->valorDeposito * 0.0052;
            $valor =  $ganhoComposto * $meses;
            $investir = new Investir();
            $investir->setIdUser($this->idUser);
            $investir->setDataCriacao($this->dataInicio);
            $investir->setValorDepositado($this->valorDeposito);
            $investir->setData_Final($this->dataInvest);
            $investir->setValorLucro($valor);
            $investir->setStatusInvst("Investido");

            $resultado =   $investir->investe();
            return $resultado;
        }

        $msgErro = "Valor Depositado utrapasa o saldo em conta ou e negativo, favor digitar um valor Valido.";
        return $msgErro;
    }


    function calcularMeses($dataInicial, $dataFinal)
    {
        $convertdataInicio = new DateTime($dataInicial);
        $convertdataFinal = new DateTime($dataFinal);
        $periodoInvest = $convertdataInicio->diff($convertdataFinal);

        $tempoInvest = $periodoInvest->y * 12 + $periodoInvest->m;


        return $tempoInvest;
    }
}
