<!-- lê o arquivo ranking.txt e ordena os usuarios de forma decrescente de pontuações,
se não houver pontuação, define o array como vazio -->

<?php
$ranking = file_get_contents("pontuacoes.txt");

if (!empty($ranking)) {
    $usuarios = explode("\n", $ranking);
    arsort($usuarios);
} else {
    $usuarios = [];
}
?>
