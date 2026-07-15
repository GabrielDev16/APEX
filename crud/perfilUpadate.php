<?php 
    // inportndo o bd
    include __DIR__ ."/../conf/db.php";

    // captura os dados do formulario
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // consulta sql
    $sql = "UPDATE perfil2
            SET nome = '$nome' , email = '$email'
            WHERE id =1";
    

    if(mysqli_query($conn , $sql)){
        header("location: ../pages/perfil.php");
        
    }
    else{
        echo"erro " . mysqli_error($conn);
    }

?>