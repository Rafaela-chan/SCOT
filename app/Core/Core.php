<?php
	Class Core
	{
		public function __construct()
		{

		}

		public function start($urlGet)
		{	
			$funcao = 'index';
			//explode('/', $urlGet['pagina']);
			if(isset($urlGet['acao'])){
				$acao = $urlGet['acao'];
			} else {
				$acao = null;
			}

			if (isset($urlGet['pagina'])){
				$controller = ucfirst($urlGet['pagina'].'Controller');
			} else {
				$controller = 'HomeController';
			}

			if (!class_exists($controller)){
				$controller = 'ErroController';
			}

			call_user_func_array(array(new $controller, $funcao), array($acao));
			//var_dump($urlGet);
		}
	}
?>