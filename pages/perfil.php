<!-- implementação do base url para evitar erro de lunks -->
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
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM perfil2 WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$id]);
                        
                        ?>

                        <?php while($user_data =  $stmt->fetch(PDO::FETCH_ASSOC)){?>
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
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" value="<?= $user_data['senha_hash'] ?>"
                                    name="senha">
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
                        <?php } ?>

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

                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM perfil2 WHERE id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$id]);
                            ?>


                            <?php while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                                <img src="<?= BASE_URL ?>uploads/<?= $user_data['img'] ?>" class="img-fluid object-fit-cover rounded"
                                    alt="Foto de perfil">

                            <?php }; ?>
                        </div>
                    </div>

                    <div class=" col-md-8 ">
                        <?php
                        //banco de dados
                        require_once __DIR__ . "/../conf/db.php";

                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM perfil2 WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$id]);
                        ?>

                        <!-- laço de repetição -->
                        <?php while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

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

        <!-- linha de sair da conta -->
        <!-- linha que ativa o modo escuro -->
        <div class="row mt-4">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-md-10">
                        <h2>Logout</h2>
                        <p>O logout permite que você encerre sua sessão com segurança, protegendo seus dados e evitando acessos não autorizados à sua conta. É uma ação rápida que garante que ninguém mais use seu usuário após você sair do sistema, especialmente em computadores compartilhados ou dispositivos públicos. Use sempre o logout ao finalizar suas atividades para manter sua experiência mais segura e controlada.</p>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <div class="form-check form-switch m-0 p-0 d-flex justify-content-center align-items-center"
                            style="--bs-form-switch-width: 3.5em; --bs-form-switch-height: 2em;">
                            <a class="btn btn-outline-danger w-100" href="<?= BASE_URL ?>logout.php" id="toggleTheme">Sair</a>
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
    <script type="module" src="<?= BASE_URL ?>assets/js/perfilValidation.js"></script>
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>

</body>

</html>