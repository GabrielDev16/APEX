<!-- arquivo de login do php para o usuario acessar o sistema-->

<!-- implementação do base url para evitar erro de lunks -->
<?php
require_once __DIR__ . '/conf/url.php';

require_once __DIR__ . '/conf/db.php';
?>
<!doctype html>
<html lang="PT-br">

<!-- head da página index -->
<?php
$title = "Login"; // variavel do titulo da página 
include __DIR__ . "/includes/header.php"; // include que puxa o cabeçalho da página
?>
<!-- fim do head-->

<body>



    <!-- inicio do conteudo principal da página -->
    <div class="container-fluid py-4">

        <!-- div que vai conter o fomrulario de login -->
        <div class="d-flex flex-column justify-content-center min-vh-100 align-items-center">
            <div class="card shadow border-0 login-card">
                <div class="card-body d-flex justify-content-center flex-column" style=" width: 400px">

                    <!-- logo do sistema -->
                    <img class="text-center m-3" src="/assets/img/Logo APEX.png" alt="Logo do Sistema">

                    <!-- formulario de login -->
                    <form method="post" action="<?= BASE_URL ?>crud/login_valida.php">
                        <div class="mb-3" >
                            <label 
                            for="email" 
                            class="form-label">Email:</label>
                            <input 
                            type="email" 
                            class="form-control" 
                            name="email" 
                            id="email" 
                            aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">mensagem de erro</div>
                        </div>
                        <div class="mb-3">
                            <label 
                            for="senha" 
                            class="form-label">Senha:</label>
                            <input 
                            type="password" 
                            class="form-control" 
                            name="senha" 
                            id="senha">
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <!-- script de personalização da página -->
    <script src="<?= BASE_URL ?>assets/js/modoescuro.js"></script>

</body>

</html>