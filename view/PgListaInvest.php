<?php

session_start();
require_once('/xampp/htdocs/Api-Investimento/assets/config/RequisicaoAuto.php');
require_once('/xampp/htdocs/Api-Investimento/control/Lista.php');

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location:http://localhost/Api-Investimento/index.php');
}

$padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
$pagina = 1;

if (isset($_GET['pagina'])) {
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}

if (!$pagina) {
    $pagina = 1;
}
$limite = 4;
$registro = new ConsultaAuto();
$totalPaginas = $registro->totalRegistros($_SESSION['id_usuario'], $limite);

$inicio = ($pagina * $limite) - $limite;

$listaPagina = new Lista();
$result = $listaPagina->listaLimitada($_SESSION['id_usuario'], $inicio, $limite);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Investimento</title>
</head>

<body>
    <a href="/Api-Investimento/view/Telahome.php">Voltar Para A Home</a>
    <h1>Lista De Ivestimentos do Sr(Sra) <?= $_SESSION['nome'] ?></h1>

    <ul>
        <?php foreach ($result as $listaItem) : ?>

            <li><br>Valor Depositado <strong><?= numfmt_format_currency($padrao, $listaItem['valorDepositado'], "BRL")  ?></strong> Valor Retriardo: <strong><?= numfmt_format_currency($padrao, $listaItem['valorRetirado'], "BRL")  ?></strong> Data de Criação: <strong><?= $listaItem['data_Criacao'] ?></strong><br></li>

        <?php endforeach; ?>

        <?php if ($pagina > 1) : ?>

            <a href="?pagina=<?= $pagina - 1 ?>">Voltar</a>
        <?php endif; ?>
        <?= $pagina ?>
        <?php if ($pagina < $totalPaginas) : ?>
            <a href="?pagina=<?= $pagina + 1 ?>">Proxima</a>
        <?php endif; ?>
    </ul>

</body>

</html>