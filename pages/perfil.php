<!-- implementação do base url para evitar erro de lunks -->
<?php
require_once __DIR__ . '/../conf/url.php';

require_once __DIR__ . '/../conf/db.php';
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

        <!-- Modal/formulario de atualizar e cadastrar dados -->
        <div class="modal fade" id="formPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Dados do perfil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- puxando dos dados do db para os values do formulario-->
                        <?php
                        $sql = "SELECT * FROM perfil2";

                        $resultado = mysqli_query($conn, $sql);

                        $user_data = mysqli_fetch_assoc($resultado);
                        ?>

                        <form id="formValide" action="<?= BASE_URL ?>crud/perfilUpadate.php" method="post"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" value="<?= $user_data['nome'] ?>"
                                    name="nome">

                                <div class="toast align-items-center" role="alert" aria-live="assertive"
                                    aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body" id="mensagem">

                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $user_data['email'] ?>"
                                    name="email">
                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Foto de Perfil</label>
                                <input accept="image/*" type="file" class="form-control" id="imagem"
                                name="imagem">
                                
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

        <!-- Linha superior com nome e foto do usuario -->
        <div class="row">
            <div class="card ">
                <div class="card-body d-flex gap-4">
                    <div class=" col-md-4">

                        <div class="ratio ratio-4x3" style="width:200px;">
                            
                        <!-- php que carrega a imagem de perfil -->
                        <?php 
                            require_once __DIR__ . "/../conf/db.php";

                            $sql = "SELECT * FROM perfil2";

                            $resultado = mysqli_query($conn , $sql);

                        ?>


                            <?php while($user_data = mysqli_fetch_assoc($resultado)){?>

                            <img src="<?= BASE_URL ?>uploads/<?= $user_data['img'] ?>" class="img-fluid object-fit-cover rounded"
                                alt="Foto de perfil">

                            <?php };?>
                        </div>
                    </div>

                    <div class=" col-md-8 ">
                        <?php
                        //banco de dados
                        require_once __DIR__ . "/../conf/db.php";

                        // consulta sql
                        $sql = "SELECT * FROM perfil2;";

                        //joga no banco de dados
                        $resultado = mysqli_query($conn,  $sql);
                        ?>

                        <!-- laço de repetição -->
                        <?php while ($user_data = mysqli_fetch_assoc($resultado)) { ?>

                        <h1><?= $user_data['nome'] ?></h1>

                        <p><?= $user_data['email'] ?></p>

                        <?php } ?>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#formPerfil">
                            Atualizar Dados
                        </button>
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
                        <p>O modo escuro é um tema de interface que usa fundo escuro e textos/ícones claros. Ele ajuda a
                            reduzir o brilho da tela e pode deixar a leitura mais confortável em ambientes com pouca
                            luz.</p>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <div class="form-check form-switch m-0 p-0 d-flex justify-content-center align-items-center"
                            style="--bs-form-switch-width: 3.5em; --bs-form-switch-height: 2em;">
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
    <script src="<?= BASE_URL ?>assets/js/formValidation.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>

</body>

</html>