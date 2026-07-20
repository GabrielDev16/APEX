<?php
session_start();

// inportndo o bd
include __DIR__ . "/../../conf/db.php";
include __DIR__ . "/../../conf/url.php";

if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL . "login.php");
}


// captura os dados do formulario
$nome = $_POST['nome'];
$email = $_POST['email'];

//coleta o alt da imagem
$fotoPerfil = basename($_FILES['imagem']['name']);

//variavel de destino da imagem, onde ela vai ficar guardada
$destino = __DIR__ . "/../uploads/" . $fotoPerfil;

//verificação se a imagem foi enviada corretamente para a pasta de destino
if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
    die("falha ao salvar essa imagem de perfil");
}

// consulta sql
$id = $_SESSION['id'];
$sql = "UPDATE perfil2
            SET nome = ? , email = ? , img = ?
            WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([
    $nome,
    $email,
    $fotoPerfil,
    $id
]);

//manda para a pagina de perfil novamente
header("location:" . BASE_URL . "pages/perfil.php");
exit();
