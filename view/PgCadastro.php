<?php
require_once("../control/Usuario.php");


if (isset($_POST['acao'])) {
    $usuario = new Usuario($_POST['nomeUser'], $_POST['sobrenomeUser'], $_POST['emailUser'], $_POST['senhaUser'], $_POST['telefoneUser'], $_POST['deposito']);
    $usuario->cadastrarUser();

    echo ("<script>window.alert('Cadastro Efetuado Com sucesso')</script>");

    header("location:http://localhost/Api-Investimento");
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form action="" method="POST">
        <label for="Nome">Nome</label>
        <input type="text" name="nomeUser" id="nomeUser">

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenomeUser" id="sobrenomeUser">

        <label for="email">Email</label>
        <input type="email" name="emailUser" id="emailUser">

        <label for="senha">Senha</label>
        <input type="password" name="senhaUser" id="senhaUser">

        <label for="repitasenha">Repita a Senha</label>
        <input type="password" name="repitasenha" id="repitasenha">

        <label for="telefone">telefone</label>
        <input type="tel" name="telefoneUser" id="telefoneUser">

        <label for="Deposito">Valor Deposito</label>
        <input type="number" name="deposito" id="deposito">

        <input type="submit" name="acao" value="Cadastrar">
    </form>
</body>

</html>