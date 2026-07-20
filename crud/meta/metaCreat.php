<?php
session_start();

require_once __DIR__ . "/../../conf/url.php";

if(!isset($_SESSION['id'])){
    header("location:" . BASE_URL . "login.php");
    exit();
}

//subindo o banco
require_once __DIR__ . "/../../conf/db.php";

//variaveis do formulario

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_limite = $_POST['data_limite'];

//consulta sql
$sql = "INSERT INTO metas (titulo, descricao, data_limite, status)
VALUES (:titulo, :descricao, :data_limite, FALSE)";


$stmt = $conn->prepare($sql);

$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':data_limite', $data_limite);

$stmt->execute();

header("location:" . BASE_URL . "pages/metas.php");
