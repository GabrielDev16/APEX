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
<html lang="pt-br">

<?php
$title = "Livros";
include __DIR__ . "/../includes/header.php";
?>

<body>
    <?php include __DIR__ . "/../includes/navbarPages.php"; ?>

    <main class="container mt-4 mb-4">
        <h1 class="title-index">Livros</h1>

        <span class="date mt-2 w-100" id="datePages"></span>

        <div class="mt-3">
            <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Novo Livro
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Livro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASE_URL ?>crud/upload.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Nome do livro:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>

                                <div class="mb-3">
                                    <label for="autor" class="form-label">Autor:</label>
                                    <input type="text" name="autor" id="autor" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="paginas" class="form-label">Total de páginas:</label>
                                    <input type="number" class="form-control" name="total_pagina" id="paginas">
                                </div>

                                <div class="mb-3">
                                    <label for="capa" class="form-label">Arquivo:</label>
                                    <input type="file" accept="image/*" class="form-control" name="capa" id="capa">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <?php
        $id = $_SESSION['id'];
        // consulta a tabela
        $sql = "SELECT * from books WHERE status = 1";
        $stmt= $conn->query($sql);
        ?>

        <div class="row mt-4">
            <?php while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php
                $total = (int) $user_data['total_paginas'];
                $lidas = (int) $user_data['paginas_lidas'];
                $porcentagem = ($total > 0) ? round(($lidas / $total) * 100) : 0;
                $porcentagem = min(100, $porcentagem);
                $modalId = "modalAtualizar" . $user_data['id'];
                ?>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?= BASE_URL ?>uploads/<?= $user_data['capa'] ?>" alt="capa do livro"
                                        class="img-fluid h-100 w-100">
                                </div>

                                <div class="col-8">
                                    <h5 class="card-title"><?= $user_data['titulo'] ?></h5>
                                    <p class="card-text"><?= $user_data['autor'] ?></p>
                                    <p class="card-text"><?= $user_data['total_paginas'] ?> Páginas</p>

                                    <div class="progress mb-2" style="height: 20px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: <?= $porcentagem ?>%;"
                                            aria-valuenow="<?= $porcentagem ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                            <?= $porcentagem ?>%
                                        </div>
                                    </div>

                                    <small><?= $lidas ?> de <?= $total ?> páginas lidas</small>

                                    <hr>

                                    <button type="button" class="btn btn-primary w-100 mt-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#<?= $modalId ?>">
                                        Atualizar páginas
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= BASE_URL ?>crud/atualizar.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Atualizar leitura</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $user_data['id'] ?>">
                                    <input type="hidden" name="total_paginas" value="<?= $total ?>">

                                    <label class="form-label">Páginas lidas</label>
                                    <input type="number" name="paginas_lidas" class="form-control"
                                        min="0" max="<?= $total ?>" value="<?= $lidas ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php include __DIR__ . "/../includes/footer.php"; ?>

    <script src="<?= BASE_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/pagesConf.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
</body>

</html>