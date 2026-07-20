<?php
require_once __DIR__ . "/../conf/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $valor = (float) $_POST['valor'];
    $data_lancamento = $_POST['data_lancamento'];

    $sql = "INSERT INTO transacoes (tipo, categoria, descricao, valor, data_lancamento)
            VALUES ('$tipo', '$categoria', '$descricao', '$valor', '$data_lancamento')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/financas.php");
        exit;
    } else {
        echo "Erro ao salvar: " . mysqli_error($conn);
    }
}