<?php
  session_start();

  if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
    $nome = $_SESSION["usuario"][0];
  } else {
    echo "<script>window.location = 'login.php'</script>";
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>game digitação</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="container">
    <h1>Digitation Game</h1>
    <p>Digite a palavra a seguir: </p>
    <div id="displayPalavra"></div>

    <input type="text" id="campoInput" placeholder="Digite aqui">
    <button id="restart-button">Reiniciar</button>

    <p id="pontuacaoAtual"></p>

    <div id="ranking"> Ranking usuários:
      <?php include 'ranking.php'; ?> <!--pega os cinco melhores jogadores e mostra em formato de lista -->
      <?php if (!empty($usuarios)) : ?>
        <ol>
          <?php
            $contador = 0;
            foreach ($usuarios as $usuario) :
              if ($contador < 5) :
          ?>
              <li><?php echo $usuario; ?></li>
          <?php
            endif;
            $contador++;
        endforeach;
        ?>
        </ol>
      <?php else : ?>
        <p>Não há pontuações registradas no momento.</p>
    <?php endif; ?>
  </div>
  
  <a href="logout.php">Sair</a>
  <script src="script.js"></script>
</body>
</html>
