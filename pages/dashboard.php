<!-- implementação do base url para evitar erro de lunks -->
<?php
// inicia a sessão
session_start();

require_once __DIR__ . '/../conf/url.php';
require_once __DIR__ . '/../conf/db.php';

//verifica se o usuario tá logado
if (!isset($_SESSION['id'])) {
    header("location:" . BASE_URL . "login.php");
    exit();
}


?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php
$title = "Dashboard"; // variavel do titulo da página 
include "../includes/header.php"; // include que puxa o cabeçalho da página
?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
    <?php
    include "/../includes/navbar.php";
    include __DIR__ . "/../includes/navbar.php";
    ?>
    <!-- fim do navbar da página -->

    <!-- inicio do conteudo principal da página -->
    <main class="container mt-4 mb-4">

        <!-- php que gerencia o nome do usurio -->
        <?php
        //seção de id por usuario
        $id = $_SESSION['id'];
        //faz a consulta
        $sql = "SELECT * FROM perfil2 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);          // substitui bind_param + execute
        $user = $stmt->fetch(PDO::FETCH_ASSOC);  // substitui get_result + fetch_assoc
        ?>

        <!-- titulo da plataforma -->
        <h1 class="title-index">Olá, <?= $user['nome'] ?>👋</h1>

        <!-- paragrafo com dia/mês/ano -->
        <span id="date"></span>

        <!-- linha que vai comportar os cards dos links das outras telas/modulos -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">

            <!-- div coluna no celular / div inline desktop -->
            <!-- div 01 -->
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-calendar-date-fill iconCard"></i>
                        <h3 class="mt-2 tituloCard">Rotina</h3>
                        <p class="descricaoCard">Organize suas tarefas diárias com precisão e disciplina.</p>
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/rotina.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 02 -->
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-meta iconCard"></i>
                        <h3 class="mt-2 tituloCard">Metas</h3>
                        <p class="descricaoCard">Acompanhe seus objetivos de curto e longo prazo de forma analítica.</p>
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/metas.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 03 -->
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-book iconCard"></i>
                        <h3 class="mt-2 tituloCard">Leitura</h3>
                        <p class="descricaoCard">Agerencie sua lista de livros e o progresso do seu conhecimento.</p>
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/leitura.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 04 -->
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-wallet iconCard"></i>
                        <h3 class="mt-2 tituloCard">Finanças</h3>
                        <p class="descricaoCard">Controle seus gastos e ganhos com métricas de alta performance.</p>
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/financas.php">Acessar</a></button>
                    </div>
                </div>
            </div>

        </div>

        <!-- linha do pomodoro e do calendario -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">

            <!-- div coluna no celular / div inline desktop -->

            <!-- div 01 -->
            <div class="col-md-4">
                <!-- Adicionado d-flex e flex-column no card -->
                <div class="card h-100 d-flex flex-column">
                    <!-- Adicionado d-flex e flex-column no card-body -->
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-alarm-fill iconCard"></i>
                        <h3 class="mt-2 tituloCard">Pomodoro</h3>
                        <p class="descricaoCard">Elimine as distrações, ative o cronômetro e domine suas metas com foco absoluto.</p>

                        <!-- Adicionado mt-auto no botão para empurrá-lo para o fundo -->
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/pomodoro.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 02 -->
            <div class="col-md-8">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <i class="bi bi-calendar-week-fill iconCard"></i>
                        <h3 class="mt-2 tituloCard">Calendario</h3>
                        <p class="descricaoCard">Visualize sua jornada, planeje seus próximos passos e garanta que cada dia contribua para suas grandes metas.</p>
                        <button type="button" class="btn btn-outline-secondary w-100 mt-auto"><a class="nav-link" href="<?= BASE_URL ?>pages/calendario.php">Acessar</a></button>
                    </div>
                </div>
            </div>



        </div>

        <!-- card com a citação interessante -->
        <div class="row mt-4">
            <div class="col-12-md">
                <div class="card cardCite">
                    <div class="card-body">
                        <p class="citacaoCard">“Por que essa magnífica tecnologia científica, que economiza trabalho e facilita nossas vidas, nos traz tão pouca felicidade? A resposta é simplesmente esta: porque ainda não aprendemos como usá-lo adequadamente.”</p>
                        <h5 class="autorCard">— Albert Einstein</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- inclusão do rodapé da plataforma -->
    <?php
    include __DIR__ .  '/../includes/footer.php';
    ?>
    <!-- final do rodapé da plataforma -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <!-- script de personalização da página -->
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
</body>

</html>