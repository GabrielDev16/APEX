<!-- inclui o banco de dados no projeto -->
<?php 
    require_once __DIR__ . "/../conf/db.php";

    //recebe os dados que vem do fomrulario
    $titulo = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $meta = $_POST['meta'];
    

    //comando sql que faz a inserção de itens na tabela
    $sql = "INSERT INTO habitos (titulo, descricao ,meta_mensal) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("si",$titulo, $descricao ,$meta);

    $stmt->execute();

    header("location: ../pages/rotina.php");
?>  