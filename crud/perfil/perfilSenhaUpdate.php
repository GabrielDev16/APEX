<?php 
    

    // captura os dados do formulario
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    //coleta o alt da imagem
    $fotoPerfil = basename($_FILES['imagem']['name']);

    //variavel de destino da imagem, onde ela vai ficar guardada
    $destino = __DIR__ . "/../uploads/" . $fotoPerfil;

    //verificação se a imagem foi enviada corretamente para a pasta de destino
    if(!move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){
        die("falha ao salvar essa imagem de perfil");
    }

    // consulta sql
    $conn->query("UPDATE perfil2
            SET nome = '$nome' , email = '$email' , img = '$fotoPerfil'
            WHERE id =1");
    
    //manda para a pagina de perfil novamente
    header("location: ../pages/perfil.php")
?>