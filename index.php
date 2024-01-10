<?php
session_start();
require_once("control/Login.php");
require_once("model/ValidaLogin.php");


if (isset($_POST['acao'])) {
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];


    $usuario = new Login($email, $senha);
    $executaLogin = $usuario->valida();
    
    if ($executaLogin == 1) {

        $_SESSION['login'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['id_usuario'] = $usuario->getId();
        $_SESSION['nome'] = $usuario->getNome();
        $_SESSION['sobrenome'] = $usuario->getSobreNome();
        $_SESSION['contato'] = $usuario->getContato();
        $_SESSION['caixa'] = $usuario->getDeposito();
        header("Location:http://localhost/Api-Investimento/view/Telahome.php");
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <label for="user">Usuario</label>
        <input type="email" name="usuario" id="iUsuario">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="iSenha">

        <input type="submit" name="acao" value="Logar">
    </form>

    <a href="../Api-Investimento/view/PgCadastro.php">Criar Usuario</a>
</body>

</html>