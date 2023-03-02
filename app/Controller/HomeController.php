<?php
	
		Class HomeController
		{
			public function index()
			{
				$home = file_get_contents('app/View/home.html');
				echo $home;
			}
		}