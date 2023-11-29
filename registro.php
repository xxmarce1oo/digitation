<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmPassword"];

    // Validação dos campos 
    
    if (empty($nome) || empty($email) || empty($senha) || empty($confirmarSenha)) {
        echo "Por favor, preencha todos os campos.";
    } elseif ($senha != $confirmarSenha) {
        echo "As senhas não coincidem.";
    } else {
        // Conexão com o bd
        $server = "localhost";
        $usuario = "root";
        $senhaBanco = "";
        $banco = "usuarios_game";

        try {
            $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senhaBanco);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificar se o usuário ou email já existem
            $consulta = $conexao->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = ? OR email = ?");
            $consulta->execute([$nome, $email]);

            if ($consulta->fetchColumn() > 0) {
                echo "Nome de usuário ou email já cadastrados.";
            } else {
                // Inserir o novo usuário na tabela
                $query = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
                $query->execute([$nome, $email, $senha]);

                echo "Usuário registrado com sucesso!";
            }
        } catch (PDOException $erro) {
            echo "Ocorreu um erro ao conectar ao banco de dados: " . $erro->getMessage();
        } finally {
            $conexao = null;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="registro.css">
    <script src="validacaoRegistro.js"></script>
</head>

<body>
    <div class="registro-container">
        <h1>Registro</h1>
        <form action="registro.php" method="post" onsubmit ="return validarRegistro();">
            <input type="text" placeholder="Nome de usuário" name="nome" required>
            <input type="email" placeholder="E-mail" name="email" required>
            <input type="password" placeholder="Senha" name="senha" required>
            <input type="password" placeholder="Confirmar senha" name="confirmPassword" required>
            <input type="submit" value="Registrar" id="button">
            <a href=login.php>Voltar</a>
        </form>
        
    </div>
</body>

</html>
