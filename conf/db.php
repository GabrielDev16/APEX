<?php
// arquivo de conexão com o banco de dados DBeaver

$host = "localhost";
$user = "root";
$senha = "";
$db = "apex";

// faz conexão com o banco
try {

    $conn = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $senha
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die("Erro na conexão: " . $e->getMessage());
}
