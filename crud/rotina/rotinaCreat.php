<?php
session_start();

require_once __DIR__ . "/../../conf/url.php";

if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL . "login.php");
    exit();
}

//subindo o banco
require_once __DIR__ . "/../../conf/db.php";

//variaveis do formulario

$titulo = $_POST['nome'];
$descricao = $_POST['descricao'];
$meta = $_POST['meta'];

//consulta sql
$sql = "INSERT INTO habitos (titulo, descricao ,meta_mensal) VALUES (:nome,:descricao,:meta)";


$stmt = $conn->prepare($sql);

$stmt->bindParam(':nome', $titulo);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':meta', $meta);

$stmt->execute();

header("location:" . BASE_URL . "pages/rotina.php");
