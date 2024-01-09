<?php
    session_start();
    require_once("../control/Criar.php");
    require_once("../control/Conta.php");
    require_once("../assets/config/RequisicaoAuto.php");
    $valorInvestimento = 0;

    $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    $conta = new ContaUser();
    $conta ->setSaldo($_SESSION['caixa']);
    

    $lista = new ConsultaAuto();
    $listaInvest = $lista->listaInvestimento($_SESSION['id_usuario'],"Investido");



    if(isset($_POST['investir'])){
        $valor = $_POST['valorInvest'];
        $dataInicio = $_POST['dataInicio'];
        $dataFinal = $_POST['dataFinal'];
        $investir = new Investimento($_SESSION['id_usuario'],$valor,$dataFinal,$dataInicio,$conta->getSaldo());

        $resultado = $investir->criar();
        
        if($resultado == 1){
            header("Location:http://localhost/Api-Investimento/view/Telahome.php");
        }
        

         return $resultado; 
    }

    if(isset($_POST['sacar'])){
        $data = $_POST['dataSaque'];
        $resultado = $conta ->sacar($_SESSION['usuario'],$_POST['id'],$data);

        header("Location:http://localhost/Api-Investimento/view/Telahome.php");
      }

    

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <h2> Olá <strong><?=$_SESSION['nome']?></strong>, Seja Bem vindo! </h2>
    </div>

    <div class="main">
        <p>Valor Disponivel <strong><?=numfmt_format_currency($padrao, $conta->getSaldo(), "BRL")?></strong></p>

        <p>Investimento <strong><?=numfmt_format_currency($padrao,  $valorInvestimento, "BRL")?></strong></p>

        <form action="" method="POST">
            <label for="valorInvest">Digite o valor Desejado</label>
            <input type="float" name="valorInvest" id="iValorInvest">

            <label for="dataInicio">Informe A data de Inicio</label>
            <input type="date" name="dataInicio" id="dataInicio">

            <label for="dataFinal">Informe A data de Retirada</label>
            <input type="date" name="dataFinal" id="dataFinal">

            <input type="submit" name="investir" value="investir">

        </form>

        <form action="" class="deposito">
            <label for="valorDeposito">Digite o Valor de Deposito</label>
            <input type="number" name="valorDeposito" id="iValorDeposito">
            <input type="submit" name="deposito" value="Depositar">
        </form>
        
        <div class="lista-investimento">
           <?php foreach($listaInvest as $listar) :?>
                <p>Valor Investido <strong><?=numfmt_format_currency($padrao, $listar["valorDepositado"], "BRL")?> </strong>  Valor Bruto <strong><?=numfmt_format_currency($padrao, $listar["valorDepositado"] + $listar['valorLucro'], "BRL")?></strong> Data Para Retirada <?=$listar['data_Final']?></p>
                <form action="" method="POST">
                    <label for="dataSaque">Retirada</label>
                    <input type="date" name="dataSaque">
                    <input type="hidden" name="id" value="<?=$listar['id_Investimento'] ?>">
                    <button type="submit" name="sacar">Sacar</button>  
                </form>
                
                

              <p>__________________________________________________</p>
                <?php endforeach?>
        </div>
    </div>
</body>
</html>