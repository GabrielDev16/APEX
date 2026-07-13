<!-- requerimento de base url prota para evivitar conflito de links -->
<?php 
    require_once __DIR__ . '/../conf/url.php';
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- parte do php que define o titulo de cada página do projeto -->
    <title>
        <?= isset($title) ? $title : 'Meu Site'?>
    </title>
    <link rel="stylesheet" href="<?=BASE_URL?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/darkmod.css">
    <!-- falvicon do sistema -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/Icon APEX.png" type="image/x-icon">
</head>