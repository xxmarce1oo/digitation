<!-- conexão com o bd usando php -->


<?php
    $server = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "usuarios_game";

    try{
        $conexao = new PDO("mysql:host=$server; dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $conexao = null;
    }
?>