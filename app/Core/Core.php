<?php
	Class Core
	{
		public function __construct()
		{

		}

		public function start($urlGet)
		{	
			$funcao = 'index';
			if(isset($urlGet['url'])){
				$url = explode('/', $urlGet['url']);
			}
			
			if(isset($url)){
				$controller = ucfirst($url[0].'Controller');
				//var_dump($controller);
				if(isset($url[1])){
					$acao = $url[1];
				}else{
					$acao = null;
				}
			} else {
				$controller = 'HomeController';
				$acao = null;
			}

			if (!class_exists($controller)){
				//var_dump($controller);
				$controller = 'ErroController';
				$acao = null;
			}

			call_user_func_array(array(new $controller, $funcao), array($acao));
		}
	}
?>