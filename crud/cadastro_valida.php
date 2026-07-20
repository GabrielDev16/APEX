<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// inicia a sessão
session_start();

// importa a url e o banco
require_once __DIR__ . "/../conf/db.php";
require_once __DIR__ . "/../conf/url.php";

// verifica se o formulario veio no methodo post
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    //se não for no methodo post manda o usuario de volta para a tela de cadastro
    header("Location:" . BASE_URL . "cadastro.php");
    exit(); //encessa o if de verificação do methodo
}

// captura os dados que o usuario digitou
$nome = trim($_POST['nome']); // trim(); -> serve para remover espaços em branco
$email = trim($_POST['email']); // trim(); -> serve para remover espaços em branco
$senha = $_POST['senha'];

//converte a senha em hash para deixar o sistema mais seguro
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

//salva o usuario no banco de dados
$sql = "INSERT INTO perfil2 (nome, email, senha_hash) VALUES (? , ? , ?)";

//prepara a consulta
$stmt = $conn->prepare($sql);

//execulta a consulta
$stmt->execute([
    $nome,
    $email,
    $senhaHash
]);

header("location:" . BASE_URL . "login.php");
//encerra a seção de cadastro
exit();
