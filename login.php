<?php
    require("conexao.php"); //usa o arquivo de conexao com o bd chamado conexao.php


    //verifica se os campos de email, senha e a conexao são diferentes de null, se sim, se conecta com o bd
    //inicia uma session para o usuario acessado
    if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $query->execute(array($_POST["email"], $_POST["senha"]));
        if ($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            
            session_start();
            $_SESSION["usuario"] = array($user["nome"]);

            echo "<script>window.location = 'index.php'</script>";
        }else{
            echo "<script>window.location = 'login.html'</script>";
        }
    }else {
        echo "<script>window.location = 'login.html'</script>";
    }

?>