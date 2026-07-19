<!-- requerimento de base url pronta para não dar problema nos links -->
<?php 
    require_once __DIR__ . '/../conf/url.php'
?>

<nav class="navbar border-bottom">

    <div class="container justify-content-between">
        <a class="navbar-brand" href="<?= BASE_URL ?>pages/dashboard.php">
            <strong class="Logo">APEX</strong>
        </a>

        <a class="nav-link navPages" href="<?= BASE_URL ?>pages/dashboard.php">
            <i class="bi bi-arrow-bar-left"></i> Voltar ao painel
        </a>
    </div>

</nav>