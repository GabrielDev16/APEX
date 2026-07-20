<?php 
    require_once __DIR__ . "/../conf/db.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM metas WHERE id= $id";

    mysqli_query($conn, $sql);

    header("location: ../pages/metas.php");
    exit;
?>