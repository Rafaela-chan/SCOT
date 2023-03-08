<?php

require_once 'app/Core/Core.php';

require_once 'app/Controller/Usuario.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/ConteudistasController.php';

$usuario = new Usuario;

if(isset($_POST['submit'])){
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['pass'] = $_POST['password'];
    $_SESSION['logar'] = true;
}

if(isset($_SESSION['logar'])){
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $_SESSION['logado'] = true;
    $usuario->logar($user, $pass);
}

$usuario->verificarLogin();


$template = file_get_contents('app/Template1/estrutura.html');

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();
$patente = $usuario->getPatente();
$nomeGuerra = $usuario->getNomeGuerra();
 $tplPronto = str_replace(array(
	'{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
),
 array( 
	$saida, $patente, $nomeGuerra
 ), $template)
;
echo $tplPronto;


