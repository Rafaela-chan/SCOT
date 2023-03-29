<?php
	
		Class HomeController
		{
			public function index($acao)
			{
				$home = file_get_contents('app/View/home.html');
				echo $home;

			}
		}