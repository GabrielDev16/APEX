<?php
require_once __DIR__ . "/../conf/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $paginas_lidas = (int) $_POST['paginas_lidas'];
    $total_paginas = (int) $_POST['total_paginas'];

    if ($paginas_lidas > $total_paginas) {
        $paginas_lidas = $total_paginas;
    }

    $sql = "UPDATE boks SET paginas_lidas = $paginas_lidas WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/leitura.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}
?>