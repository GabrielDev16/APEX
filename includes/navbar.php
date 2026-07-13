<!-- requerimento de base url pronta para não dar problema nos links -->
<?php 
    require_once __DIR__ . '/../conf/url.php'
?>

<nav class="navbar border-bottom">

    <div class="container justify-content-between">
        <a class="navbar-brand" href="<?= BASE_URL ?>index.php">
            <strong class="Logo">APEX</strong>
        </a>

        <a href="pages/perfil.php">
            <i class="bi bi-person-circle person"></i>
        </a>
    </div>

</nav>