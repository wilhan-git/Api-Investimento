<?php
    session_start();
    $itensLista = 0;
    if(isset($_GET['listar'])){
        $qtyPagina = 2;
        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $indiceInicio = ($paginaAtual - 1)* $qtyPagina;
        $itensLista = array('teste um','teste um','teste um','teste um','teste um','teste um','teste um','teste um');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Investimento</title>
</head>
<body>
    <a href="?listar=<?=$i?>"></a>
    <header><h1>LISTA INVESTIMENTO DE </h1></header>

    <main>
        <?php foreach($itensLista as $listaItem): ?>
            <p><?=$listaItem ?></p>
        <?php endforeach?>


        <?php 
        $totalPg = ceil(count($listaItem)/$qtyPagina);
            for($i=1;$i<=$totalPg;$i++) : 
        ?>
        <a href="?pagina=<?=$i?>"> <?=$i?></a>

        <?php endfor;?>
    </main>
</body>
</html>