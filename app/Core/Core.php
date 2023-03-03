<?php
	Class Core
	{
		public function start($urlGet)
		{	
			$funcao = 'index';
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
		}
	}
?>