<?php 
// conexão com o banco 

require_once __DIR__ ."../conf/db.php";

// variavies de informação do livro
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$totalPaginas = $_POST['total_pagina'];

// arquivo de imagem da capa
$capaImagem = $_FILES['imagem']['name'];
// move o arquivo para pasta das imagens
move_uploaded_file($_FILES['imagem']['name'], "../uploads" . $capaImagem);

// consulta sql
$conn->query("INSERT INTO boks (
    titulo,
    autor,
    total_paginas,
    capa
)
VALUES (
    '$titulo',
    '$autor',
    $totalPaginas,
    '$capaImagem'
)");

header("location: ../pages/leitura.php");
?>