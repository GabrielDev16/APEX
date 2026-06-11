<!-- inclui o banco de dados no projeto -->
<?php 
    require_once __DIR__ . "/../conf/db.php";

    //recebe os dados que vem do fomrulario
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];

    //comando sql que faz a inserção de itens na tabela
    $sql = "INSERT INTO usuarios (nome, apelido) VALUES ('$nome', '$apelido')";

    //executa o cadastro
    if(mysqli_query($conn, $sql)){
        header("location: ../pages/rotina.php"); //verifica se o cadastro está certo, se estiver ele envia pro arquivo rotina e morre aqui
        exit;
    }
    else{
        echo "erro" . mysqli_error($conn);
        //se estiver dando erro ele exibe aqui
    }
?>