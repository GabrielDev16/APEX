<?php
session_start();

require_once __DIR__ . "/../../conf/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario_id = $_SESSION['id'];

    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data_lancamento = $_POST['data_lancamento'];

    $sql = "INSERT INTO transacoes
            ( tipo, categoria, descricao, valor, data_lancamento)
            VALUES
            ( :tipo, :categoria, :descricao, :valor, :data_lancamento)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':data_lancamento', $data_lancamento);

    $stmt->execute();

    header("Location: ../../pages/financas.php");
    exit();
}