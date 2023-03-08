<?php
	
	Class PerfilController
	{
		public function index($acao)
		{
			session_destroy();
			header('Location: SCOT/login.php');
			
		}
	}
?>
