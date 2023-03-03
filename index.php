<?php

require_once 'app/Core/Core.php';
require_once 'app/Controller/Usuario.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/ConteudistaController.php';

session_start();
$usuario = new Usuario;
if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $log = $usuario->logar($user,$pass);
    if($log){
        $_SESSION['logado'] = true;
        header('Location: sistema/');
    }
}

$template = file_get_contents('app/Template1/estrutura.html');

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();
$patente = 'IECE TWO';
$nomeGuerra = $usuario->getNomeGuerra();
//$tplPronto = str_replace('{{area_dinamica}}',"$saida", $template);

 $tplPronto = str_replace(array(
	'{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
),
 array( 
	$saida, $patente, $nomeGuerra
 ), $template)
;
echo $tplPronto;


