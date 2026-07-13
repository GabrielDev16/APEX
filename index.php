<!-- implementação do base url para evitar erro de lunks -->
<?php 
    require_once __DIR__ . '/conf/url.php'
?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php 
        $title = "Dashboard"; // variavel do titulo da página 
        include "includes/header.php"; // include que puxa o cabeçalho da página
    ?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
    <?php 
            include "includes/navbar.php";
        ?>
    <!-- fim do navbar da página -->

    <!-- inicio do conteudo principal da página -->
    <main class="container mt-4 mb-4">
        <!-- titulo da plataforma -->
        <h1 class="title-index">Olá, Gabriel 👋</h1>

        <!-- paragrafo com dia/mês/ano -->
        <span id="date"></span>

        <!-- linha que vai comportar os cards dos links das outras telas/modulos -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">

            <!-- div coluna no celular / div inline desktop -->
            <!-- div 01 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="bi bi-calendar-date-fill iconCard"></i>
                        <h3 class="mt-2 tituloCard">Rotina</h3>
                        <p class="descricaoCard">Organize suas tarefas diárias com precisão e disciplina.</p>
                        <button type="button" class="btn btn-outline-secondary w-100"><a class="nav-link" href="<?= BASE_URL ?>pages/rotina.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 02 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="bi bi-meta iconCard"></i>
                        <h3 class="mt-2 tituloCard">Metas</h3>
                        <p class="descricaoCard">Acompanhe seus objetivos de curto e longo prazo de forma analítica.</p>
                        <button type="button" class="btn btn-outline-secondary w-100"><a class="nav-link" href="<?= BASE_URL ?>pages/metas.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 03 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="bi bi-book iconCard"></i>
                        <h3 class="mt-2 tituloCard">Leitura</h3>
                        <p class="descricaoCard">Agerencie sua lista de livros e o progresso do seu conhecimento.</p>
                        <button type="button" class="btn btn-outline-secondary w-100"><a class="nav-link" href="<?= BASE_URL ?>pages/leitura.php">Acessar</a></button>
                    </div>
                </div>
            </div>

            <!-- div 04 -->
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="bi bi-wallet iconCard"></i>
                        <h3 class="mt-2 tituloCard">Finanças</h3>
                        <p class="descricaoCard">Controle seus gastos e ganhos com métricas de alta performance.</p>
                        <button type="button" class="btn btn-outline-secondary w-100"><a class="nav-link" href="<?= BASE_URL ?>pages/financas.php">Acessar</a></button>
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
        include 'includes/footer.php';
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