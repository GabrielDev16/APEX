<?php 
    // incia a sessão
    session_start();

    // puxando o banco de dados
    require_once __DIR__ . "/../conf/db.php";
    require_once __DIR__ . "/../conf/url.php";

    // verifica se o formulario foi enviado em methodo post
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        header("Location: login.php");
        exit();
    }

    // puxando as os campos do formulario de login 
    $emailLogin = $_POST['email'];
    $senhaLogin = $_POST['senha'];

    // procura na tabela todos os usuarios com esses dados
    $sql = "SELECT * FROM perfil2 WHERE email = ?";

    // prepera a consulta
    $stmt = $conn->prepare($sql); //$conn é a variavel de conexão

    //executa a consulta
    $stmt->execute(["$emailLogin"]);

    //traz o resultado a consulta
    $usuario = $stmt->fetch();

    //verifica se encontrou o usuario
    if($usuario && password_verify($senhaLogin, $usuario['senha_hash'])){

        //guarda as informações do usuario em uma sessão
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        //manda o usuario para a tela inicial do sistema
        header("Location:" . BASE_URL . "pages/dashboard.php");
        exit(); //encessa o if
    }
    // else de falha no usuario
    else{
        echo"Login incorreto";
    }

    


?>