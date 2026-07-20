<!-- implementação do base url para evitar erro de lunks -->
<?php
session_start();

require_once __DIR__ . '/../conf/url.php';
require_once __DIR__ . '/../conf/db.php';

// /verificação de sseção
if (!isset($_SESSION['id'])) {
    header("location:" . "login.php");
    exit();
}

?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php
$title = "Pomodoro"; // variavel do titulo da página 
include __DIR__ . "/../includes/header.php"; // include que puxa o cabeçalho da página
?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
    <?php
    include __DIR__ . "/../includes/navbarPages.php";
    ?>
    <!-- fim do navbar da página -->



    <!-- inicio do conteudo principal da página -->
    <main class="container mt-4 mb-4 ">
        <!-- titulo da página -->
        <h1 class="title-index">Pomodoro</h1>

        

    </main>

    <!-- inclusão do rodapé da plataforma -->
    <?php
    include  __DIR__ . '/../includes/footer.php';
    ?>
    <!-- final do rodapé da plataforma -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <!-- script de personalização da página -->
    <script type="module" src="<?= BASE_URL ?>assets/js/pomodoro.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>

</body>

</html>