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
        <span class="date" id="datePages"></span>

        <!-- exibir teste de tabela para mostrar os nomes que estão em uma tabela -->
        <?php 
            
            // 1. Corrigido o caminho (geralmente é __DIR__ para pegar a pasta atual antes de subir)
            require_once __DIR__ . "/../conf/db.php"; 
            
            $sql = "SELECT * FROM usuarios";
            $resultado = $conn->query($sql);
    ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Apelido</th>
                    
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