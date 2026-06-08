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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <!-- falvicon do sistema -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/Icon APEX.png" type="image/x-icon">
</head>