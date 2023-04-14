<?php
	
		Class UsersController
		{

			public function index($acao)
			{
				$users = file_get_contents('app/View/users.html');
				echo $users;
			}
		}