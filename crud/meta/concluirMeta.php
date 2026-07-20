<?php 

    require_once __DIR__ ."/../conf/db.php";

    $id = $_GET['id'];

    $sql = "UPDATE metas SET status = 1 WHERE id = $id";

    mysqli_query($conn, $sql);

    header("location: ../pages/metas.php");
    exit;

?>