<?php 
// arquivo de conexão com o banco de dados DBeaver

$host = "localhost";
$user = "root";
$senha = "";
$db = "gabriel";

// faz conexão com o banco

$conn = new mysqli($host, $user, $senha, $db);

// verifica se a conexão foi bem sucessedida
if ($conn -> connect_erro){
    die("Erro na Conexão " . $conn->connect_erro);
}

// echo"Conexão realizada com sucesso!";
?>