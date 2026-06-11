<!-- importando o baseurl para não dar problema nos links -->
<?php 
    require_once __DIR__ . "/../conf/url.php";
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
                            <form action="<?=BASE_URL?>crud/rotinaCreat.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="nome">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Apelido</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="apelido">
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


        <!-- exibir teste de tabela para mostrar os nomes que estão em uma tabela -->
        <?php 
            
            // 1. Corrigido o caminho (geralmente é __DIR__ para pegar a pasta atual antes de subir)
            require_once __DIR__ . "/../conf/db.php"; 
            
            $sql = "SELECT * FROM usuarios";
            $resultado = $conn->query($sql);
    ?>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Apelido</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user_data = mysqli_fetch_assoc($resultado)){
                        echo"<tr>";
                        echo"<td>" . $user_data['id'] . "<td>" ;
                        echo"<td>" . $user_data['nome'] . "<td>" ;
                        echo"<td>" . $user_data['apelido'] . "<td>" ;
                        echo"</tr>";
                    }
                ?>
            </tbody>
        </table>


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
    <script src="../assets/js/pagesConf.js">

    </script>
</body>

</html>