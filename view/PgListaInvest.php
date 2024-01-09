<?php
    session_start();
    $itensLista = 0;
    if(isset($_GET['listar'])){
       
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


    </main>
</body>
</html>