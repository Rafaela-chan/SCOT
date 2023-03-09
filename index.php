<?php

require_once 'app/Core/Core.php';

require_once 'app/Controller/Usuario.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/ConteudistasController.php';
require_once 'app/Controller/PerfilController.php';
require_once 'app/Controller/DeslogarController.php';

$template = file_get_contents('app/Template1/estrutura.html');
$usuario = new Usuario;


ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

if(isset($_POST['submit'])){
    $_SESSION['mensagem'] = "teste";
    $templateLogin = file_get_contents('app/View/login.html');
    $login = str_replace('{{mensagem}}', $_SESSION['mensagem'] , $templateLogin);
    if($_SESSION['logado'] == false){
        echo $login;
    }
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

$nomeGuerra = $usuario->getNomeGuerra();
$patente = $usuario->getPatente();
$nomeCompleto = $usuario->getNomeCompleto();
$om = $usuario->getOM();
$saram = $usuario->getSaram();
$cpf = $usuario->getCPF();

if(isset($_GET['url'])){    
    if($_GET['url'] == 'perfil'){
        $saidaPronto = str_replace(array(
            '{{cpf}}', '{{nome_completo}}',  '{{nome_guerra}}', '{{om}}', '{{saram}}'
        ),
        array(
            $cpf, $nomeCompleto, $nomeGuerra, $om, $saram
        ),
        $saida
        );

        $tplPronto = str_replace(array(
            '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
        ),
        array( 
            $saidaPronto, $patente, $nomeGuerra
        ), $template);
    }else{
        $tplPronto = str_replace(array(
            '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
        ),
        array( 
            $saida, $patente, $nomeGuerra
        ), $template);
        
    }
}else{
    $tplPronto = str_replace(array(
        '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
    ),
    array( 
        $saida, $patente, $nomeGuerra
    ), $template);
    
} ;

echo $tplPronto;


