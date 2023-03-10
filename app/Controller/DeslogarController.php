<?php
	
	Class DeslogarController
	{
		public function index($acao)
		{
			session_destroy();
			header('Location: login.php');
			
		}
	}
?>
