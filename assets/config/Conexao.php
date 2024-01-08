<?php

class Conexao
{
    private static $pdo;
    public static function conectar()
    {
        try {
            if (self::$pdo == null) {
                self::$pdo = new PDO("mysql:host=localhost; dbname=bd_bancoinvest", 'root', 'mwwznfsmwu2');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo "<h2>Erro ao conectar<h/2>";
        }
        return self::$pdo;
    }
}
?>