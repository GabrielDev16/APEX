<!-- implementação do base url para evitar erro de lunks -->
<?php
require_once __DIR__ . '/../conf/url.php';
?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php
$title = "Perfil"; // variavel do titulo da página 
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
        <h1 class="title-index">Configurações</h1>

        <!-- Linha superior com nome e foto do usuario -->
        <div class="row">
            <div class="card ">
                <div class="card-body d-flex gap-4">
                    <div class=" col-md-4">
                        <div class="ratio ratio-4x3" style="width:200px;">
                            <img src="../assets/img/Perfil ML.jpg" class="img-fluid object-fit-cover rounded" alt="Foto de perfil">
                        </div>
                    </div>

                    <div class=" col-md-8 ">
                        <h1>João Gabriel</h1>
                        <p>jooaogabriel@gmail.com</p>
                        <button class="btn btn-primary">Alterar Dados</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- linha que ativa o modo escuro -->
        <div class="row mt-4">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-md-10">
                        <h2>Modo Escuro</h2>
                        <p>O modo escuro é um tema de interface que usa fundo escuro e textos/ícones claros. Ele ajuda a reduzir o brilho da tela e pode deixar a leitura mais confortável em ambientes com pouca luz.</p>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <div class="form-check form-switch m-0 p-0 d-flex justify-content-center align-items-center" style="--bs-form-switch-width: 3.5em; --bs-form-switch-height: 2em;">
                            <button class="btn btn-dark" id="toggleTheme">Dark mode</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
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
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>
    
</body>

</html>