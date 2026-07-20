<?php
session_start();

require_once __DIR__ . '/../conf/url.php';
require_once __DIR__ . '/../conf/db.php';

// /verificação de sseção
if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL. "login.php");
    exit();
}



$id = $_SESSION['id'];
$sql = "SELECT * FROM transacoes ORDER BY data_lancamento DESC, id DESC";
$stmt= $conn->query($sql);

$entradas = 0;
$saidas = 0;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['tipo'] === 'entrada') {
        $entradas += (float) $row['valor'];
    } else {
        $saidas += (float) $row['valor'];
    }
}

$saldo = $entradas - $saidas;

mysqli_data_seek($stmt, 0);
?>
<!doctype html>
<html lang="pt-br">

<?php $title = "Finanças"; 
include __DIR__ . "/../includes/header.php"; ?>

<body>
<?php include __DIR__ . "/../includes/navbarPages.php"; ?>

<main class="container mt-4 mb-4">
    <h1 class="title-index">Finanças</h1>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Entradas</h6>
                    <h3 class="text-success">R$ <?= number_format($entradas, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Saídas</h6>
                    <h3 class="text-danger">R$ <?= number_format($saidas, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Saldo</h6>
                    <h3 class="text-primary">R$ <?= number_format($saldo, 2, ',', '.') ?></h3>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#modalNovo">
        Novo lançamento
    </button>

    <div class="modal fade" id="modalNovo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= BASE_URL ?>crud/financasCRUD.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo lançamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-select" required>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <input type="text" name="categoria" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <input type="text" name="descricao" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Valor</label>
                            <input type="number" step="0.01" name="valor" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" name="data_lancamento" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-3">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?= $row['tipo'] ?></td>
                        <td><?= $row['categoria'] ?></td>
                        <td><?= $row['descricao'] ?></td>
                        <td>R$ <?= number_format($row['valor'], 2, ',', '.') ?></td>
                        <td><?= date('d/m/Y', strtotime($row['data_lancamento'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . "/../includes/footer.php"; ?>
<script src="<?= BASE_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
</body>
</html>