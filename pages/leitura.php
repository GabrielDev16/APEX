<!-- importando o baseurl para não dar problema nos links -->
<?php 
    require_once __DIR__ . "/../conf/url.php";
?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php 
        $title = "Leituras"; // variavel do titulo da página 
        include __DIR__ .  "/../includes/header.php"; // include que puxa o cabeçalho da página
    ?>
<!-- fim do head-->

<body>
    <!-- navbar da página -->
    <?php 
            include  __DIR__ . "/../includes/navbarPages.php";
        ?>
    <!-- fim do navbar da página -->

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
                            <!-- formulario para colocar dados dentro da tabela do banco de dados | recebe arquivos o forulario por ser multiplataforma-->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Nome do livro:</label>
                                    <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp"
                                        name="titulo">
                                </div>
                                <div class="mb-3">
                                    <label for="autor" class="form-label">Autor:</label>
                                    <input type="text" class="form-control" id="autor" aria-describedby="emailHelp"
                                        name="autor">
                                </div>
                                <div class="mb-3">
                                    <label for="paginas" class="form-label">Páginas do livro:</label>
                                    <input type="number" class="form-control" id="paginas" aria-describedby="emailHelp"
                                        name="total_pagina">
                                </div>
                                <div class="mb-3">
                                    <label for="capa" class="form-label">Capa:</label>
                                    <input type="file" class="form-control" id="capa" name="imagem" accept="image/*">
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
            $sql = "SELECT * from livros";

            $resultado = mysqli_query($conn, $sql);
        ?>

        <div class="row mt-4">
            <!-- laço que faz a checagem das linhas da tabela -->
            <?php while($user_data=mysqli_fetch_assoc($resultado)){?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <!-- imagem capa do livro -->
                            <div class="col-4">
                                <img src="" class="img-fluid">
                            </div>
                            <!-- dados do livro -->
                            <div class="col-8">
                                <h5 class="card-title">
                                    <!-- titulo -->
                                    <?=$user_data['titulo']?>
                                </h5>
                                <p class="card-text">
                                    <!-- decrição -->
                                    <?=$user_data['total_paginas']?>
                                </p>
                                <p class="card-text">
                                    <!-- data limite -->
                                    <?=$user_data['paginas_lidas']?>
                                </p>
                                <p class="card-text">
                                    <!-- data limite -->
                                    <?=$user_data['data_atualizacao']?>
                                </p>
                                <hr>
                                <div>
                                    <a href="<?=BASE_URL?>?id=<?=$user_data['id']?>" class="btn btn-primary w-100">
                                        Atualizar Página</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- linha de divisão para mostar as livros concluidas -->
        <hr>

        <h1 class="title-index">Livros Concluidos</h1>

        <!-- exibe o dado em card pro usuario que já foram concluidas -->

        <?php 
            //conexão  com  banco
            require_once __DIR__ . ("/../conf/db.php");
            
            // consulta a tabela
            $sql = "SELECT * from livros";

            $resultado = mysqli_query($conn, $sql);
        ?>

        <div class="row mt-4">
            <!-- laço que faz a checagem das linhas da tabela -->

        </div>


    </main>
    <!-- fim conteudo principal da página de rotinas -->

    <!-- roadapé da página -->
    <?php 
        include __DIR__ . "/../includes/footer.php"
    ?>
    <!-- fim do roadapé da página -->



    <script src="<?=BASE_URL?>bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>