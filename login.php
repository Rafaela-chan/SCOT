<?php
session_start();
if (isset($_GET['deslogar'])) {
    session_destroy();
    session_start();
    $_SESSION['mensagem'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">Deslogado com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

//$_SESSION['mensagem'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Usuário ou senha<strong>incorretos! </strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
$template = file_get_contents('app/View/login.html');

if (isset($_SESSION['mensagem'])) {
    $saida = $_SESSION['mensagem'];
    $tplPronto = str_replace('{{mensagem}}', $saida, $template);
} else {
    $saida = '';
    $tplPronto = str_replace('{{mensagem}}', $saida, $template);
}

echo $tplPronto;
session_destroy();