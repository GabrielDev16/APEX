
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php 
        $title = "Livros"; // variavel do titulo da página 
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
        <h1 class="title-index">Livros</h1>

        <!-- span com mês e ano -->
        <span class="date mt-2  w-100" id="datePages"></span>

        <!-- botão que ativa o modal de formulario para adcionar dados -->
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Novo Livro
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Livro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario para colocar dados dentro da tabela do banco de dados -->
                            <form action="<?=BASE_URL?>crud/upload.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Nome do livro:</label>
                                    <input type="text" class="form-control" id="titulo"
                                        aria-describedby="emailHelp" name="titulo">
                                </div>
                                <div class="mb-3">
                                    <label for="autor" class="form-label">autor:</label>
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



        <!-- linha de divisão para mostar as metas concluidas -->
        <hr>

        <h1 class="title-index">Livros Conluidas</h1>

        <!-- exibe o dado em card pro usuario que já foram concluidas -->

        

       
        </div>


    </main>
    <!-- fim conteudo principal da página de rotinas -->

    <!-- roadapé da página -->
    <?php 
        include __DIR__ . "/../includes/footer.php"
    ?>
    <!-- fim do roadapé da página -->



    <script src="<?=BASE_URL?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/pagesConf.js">

    </script>
</body>

</html>