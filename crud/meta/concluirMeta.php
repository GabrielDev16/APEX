<?php
session_start();

require_once __DIR__ . "/../../conf/url.php";

if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL . "login.php");
    exit();
}
require_once __DIR__ . "/../../conf/db.php";

$id = $_SESSION['id'];

$idmeta = $_GET['id'];


$sql = "UPDATE metas SET status = 1 WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(":id", $idmeta, PDO::PARAM_INT);

$stmt->execute();

header("location:". BASE_URL ."pages/metas.php");
exit;
