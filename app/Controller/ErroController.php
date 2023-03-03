<?php
	
		Class ErroController
		{

			public function index($acao)
			{
				$erro = file_get_contents('app/View/erro.html');
				echo $erro;
			}
		}