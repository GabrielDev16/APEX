<!-- importando o baseurl para não dar problema nos links -->
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
$title = "Metas"; // variavel do titulo da página 
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
        <h1 class="title-index">Metas</h1>

        <!-- span com mês e ano -->
        <span class="date mt-2  w-100" id="datePages"></span>

        <!-- botão que ativa o modal de formulario para adcionar dados -->
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Nova Meta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Meta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario para colocar dados dentro da tabela do banco de dados -->
                            <form id="formMetas" action="<?= BASE_URL ?>crud/metaCreat.php" method="POST">
                                <div class="mb-3">
                                    <label for="nomeM" class="form-label">Nome da meta:</label>
                                    <input type="text" class="form-control" id="nomeM"
                                        aria-describedby="emailHelp" name="titulo">
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição:</label>
                                    <textarea name="descricao" id="descricao"
                                        class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="data" class="form-label">Data de Conclusão:</label>
                                    <input type="date" class="form-control" name="data_limite" id="data">
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

        <!-- exibe o dado em card pro usuario -->

        <?php
        //conexão  com  banco
        require_once __DIR__ . ("/../conf/db.php");

        // consulta a tabela
        $sql = "SELECT * from metas WHERE status =0";

        $resultado = mysqli_query($conn, $sql);
        ?>

        <div class="row mt-4">
            <!-- laço que faz a checagem das linhas da tabela -->
            <?php while ($user_data = mysqli_fetch_assoc($resultado)) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $user_data['titulo'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $user_data['descricao'] ?>
                            </p>
                            <p class="card-text">
                                <?= $user_data['data_limite'] ?>
                            </p>
                            <hr>
                            <div>
                                <a href="<?= BASE_URL ?>crud/concluirMeta.php?id=<?= $user_data['id'] ?>" class="btn btn-primary w-100"><i class="bi bi-bookmark-check"></i> Meta Concluida</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- linha de divisão para mostar as metas concluidas -->
        <hr>

        <h1 class="title-index">Metas Conluidas</h1>

        <!-- exibe o dado em card pro usuario que já foram concluidas -->

        <?php
        //conexão  com  banco
        require_once __DIR__ . ("/../conf/db.php");

        // consulta a tabela
        $sql = "SELECT * from metas WHERE status =1";

        $resultado = mysqli_query($conn, $sql);
        ?>

        <div class="row mt-4">
            <!-- laço que faz a checagem das linhas da tabela -->
            <?php while ($user_data = mysqli_fetch_assoc($resultado)) { ?>

                <!-- card que vai exibir os dados da tabela -->
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body bg-secondary">
                            <h5 class="card-title text-light">
                                <!-- titulo -->
                                <?= $user_data['titulo'] ?>
                            </h5>
                            <p class="card-text">
                                <!-- decrição -->
                                <?= $user_data['descricao'] ?>
                            </p>
                            <p class="card-text">
                                <!-- data limite -->
                                <?= $user_data['data_limite'] ?>
                            </p>
                            <!-- BOTÃO DE DELETAR A META APÓS CONCLUIDA -->
                            <a onclick="return confirm('Deseja apagar essa meta?')" href="<?= BASE_URL ?>crud/deleteMeta.php?id=<?= $user_data['id'] ?>" class="btn btn-danger w-100"><i class="bi bi-trash3"></i> Deletar Meta</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    <script type="module" src="<?= BASE_URL ?>assets/js/metasValidation.js"></script>
    <script src="../assets/js/pagesConf.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
</body>

</html>