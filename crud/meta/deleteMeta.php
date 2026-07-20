<?php 
    session_start();

    require_once __DIR__ . "/../../conf/url.php";

    if(!isset($_SESSION['id'])){
        header("location:" . BASE_URL . "login.php");
        exit();
    }
    require_once __DIR__ . "/../../conf/db.php";

    $id = $_SESSION['id'];


    $id = $_GET['id'];

    $sql = "DELETE FROM metas WHERE id= :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":id", $id , PDO::PARAM_INT);

    $stmt->execute();

    header("location:". BASE_URL ."pages/metas.php");
    exit;
?>