<?php
	
		Class AdicionarController
		{

			public function index($acao)
			{
				$adicionar = file_get_contents('app/View/adicionar.html');
				echo $adicionar;
			}
		}