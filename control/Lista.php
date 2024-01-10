<?php
require_once("/xampp/htdocs/Api-Investimento/model/Investimento.php");

class Lista extends Investir{
   

    public function listaLimitada($idUser,$inicio,$limite){
        $lista = new Investir();
        $resultado = $lista->registrosInvest($idUser,$inicio,$limite);

        return $resultado;
    }

}



?>