<!-- importando o baseurl para não dar problema nos links -->
<?php 
    require_once __DIR__ . "/../conf/url.php";
?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
    <?php 
        $title = "Finanças"; // variavel do titulo da página 
        include __DIR__ .  "/../includes/header.php"; // include que puxa o cabeçalho da página
    ?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
        <?php 
            include  __DIR__ . "/../includes/navbarPages.php";
        ?>
    <!-- fim do navbar da página -->

    <h1>Página De Finanças</h1>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>