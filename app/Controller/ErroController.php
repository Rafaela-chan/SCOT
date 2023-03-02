<?php
	
		Class ErroController
		{

			public function index()
			{
				$erro = file_get_contents('app/View/erro.html');
				echo $erro;
			}
		}