<!-- salva a pontuação do usuario atraves da sua sessao no arquivo txt -->

<?php
    session_start();

    if (isset($_POST['pontuacao'])) {
        $pontuacao = $_POST['pontuacao'];

        $nomeUsuario = $_SESSION['usuario'][0];

        $arquivoPontuacoes = 'pontuacoes.txt';

        $pontuacaoFormatada = $nomeUsuario . ' - ' . $pontuacao . PHP_EOL;

        $file = fopen($arquivoPontuacoes, 'a');

        fwrite($file, $pontuacaoFormatada);

        fclose($file);

        echo "Pontuação salva com sucesso!";
        } else {
        echo "Erro ao salvar a pontuação!";
    }
?>
