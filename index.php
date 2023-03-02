<?php

require_once 'app/Core/Core.php';
require_once 'app/Controller/Usuario.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';

$template = file_get_contents('app/Template1/estrutura.html');

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace(
	array('{{area_dinamica}}',"$saida", $template),
);

$tplPronto = str_replace(array('{{area_dinamica}}', '{{patente}}', '{{nomeGuerra}}'), array("$saida", ""), $template;

echo $tplPronto;
