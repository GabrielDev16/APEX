<?php
require_once __DIR__ . '/../conf/db.php';
require_once __DIR__ . '/../conf/url.php';

$habito_id = $_POST['habito_id'];

$hoje = date('Y-m-d');

// Verifica se já foi marcado hoje
$sql = "
SELECT id
FROM registros_habito
WHERE habito_id = ?
AND data_registro = ?
";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "is",
    $habito_id,
    $hoje
);

$stmt->execute();

$resultado = $stmt->get_result();

// Se já existe, volta para a página
if($resultado->num_rows > 0){
    header("Location: " . BASE_URL . "pages/rotina.php");
    exit;
}

// Salva a conclusão do hábito
$sql = "
INSERT INTO registros_habito
(habito_id, data_registro)
VALUES (?, ?)
";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "is",
    $habito_id,
    $hoje
);

$stmt->execute();

header("Location: " . BASE_URL . "pages/rotina.php");
exit;
?>