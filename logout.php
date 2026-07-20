<?php 
    // inicia a sessão
    session_start();

    //apaga a sessão
    session_unset();

    //destroi a sessão
    session_destroy();

    //importando a url
    require_once __DIR__ . "/conf/url.php";

    //mandando para o arquivo de login
    header("location:" . BASE_URL . "login.php");
    exit();
?>