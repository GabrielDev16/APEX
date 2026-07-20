<!-- importando o baseurl para não dar problema nos links -->
<?php
session_start();

require_once __DIR__ . '/../conf/url.php';
require_once __DIR__ . '/../conf/db.php';

// /verificação de sseção
if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL. "login.php");
    exit();
}

?>

<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php
$title = "Rotina"; // variavel do titulo da página 
include __DIR__ .  "/../includes/header.php"; // include que puxa o cabeçalho da página
?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
    <?php
    include  __DIR__ . "/../includes/navbarPages.php";
    ?>
    <!-- fim do navbar da página -->

    <!-- conteudo principal da página de rotinas -->
    <main class="container mt-4 mb-4">

        <!-- titulo da página -->
        <h1 class="title-index">Rotina</h1>

        <!-- span com mês e ano -->
        <span class="date mt-2  w-100" id="datePages"></span>

        <!-- botão que ativa o modal de formulario para adcionar dados -->
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Novo Hábito
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario para colocar dados dentro da tabela do banco de dados -->
                            <form action="<?= BASE_URL ?>crud/rotinaCreat.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">TITULO:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="nome">
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">DESCRIÇÃO:</label>
                                    <textarea name="descricao" class="form-control" id="descricao"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="meta" class="form-label">META:</label>
                                    <input type="number" class="form-control" id="meta" aria-describedby="emailHelp"
                                        name="meta">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </main>
    <!-- fim conteudo principal da página de rotinas -->

    <!-- roadapé da página -->
    <?php
    include __DIR__ . "/../includes/footer.php"
    ?>
    <!-- fim do roadapé da página -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="../assets/js/pagesConf.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
</body>

</html>