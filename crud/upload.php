<?php
// conexão com o banco de dados
require_once __DIR__ . "/../conf/db.php";

// variaveis do formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$totalPaginas = $_POST['total_pagina'];

// variavel que coleta a imagem - basename remove possivel caminho que vanha com o nome do arquivo
$capaImagem = basename($_FILES['capa']['name']);

// variavel que manda a imagem para a pasta que ela vai ser salva
$destino = __DIR__ . "/../uploads/" . $capaImagem;

// verificação se a imagem foi enviada para a pasta
if(!move_uploaded_file($_FILES['capa']['tmp_name'],$destino)){
    die("falha ao salvar a imagem");
};

// consulta/comando de execução do sql
$conn->query("INSERT INTO boks (
    titulo,
    autor,
    total_paginas,
    capa
) VALUES (
    '$titulo',
    '$autor',
    $totalPaginas,
    '$capaImagem'
)");

// encaminha novamente para o arquivo de leitura
header("Location: ../pages/leitura.php");
exit;
?>