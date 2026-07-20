<?php 
//subindo o banco
require_once __DIR__ . "/../conf/db.php";

//variaveis do formulario

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_limite = $_POST['data_limite'];

//consulta sql
$sql = "INSERT INTO metas (titulo, descricao, data_limite, status) 
VALUES (
    '$titulo', 
    '$descricao', 
    '$data_limite', 
    FALSE
);";

//execuçõo no banco

if(mysqli_query($conn, $sql)){
    header("location: ../pages/metas.php");
    //mata a execução
    exit;
}
else{
    echo"erro " . mysqli_error($conn);
}
?>