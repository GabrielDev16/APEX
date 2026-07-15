<?php 
// arquivo de conexão com o banco de dados DBeaver

$host = "localhost";
$user = "root";
$senha = "";
$db = "gabriel";

// faz conexão com o banco

$conn = new mysqli($host, $user, $senha, $db);

// verifica se a conexão foi bem sucessedida
if ($conn ->connect_error){
    die("Erro na Conexão " . $conn->connect_error);
    
}

// echo"Conexão realizada com sucesso!";
?>