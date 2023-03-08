<?php
	
	Class PerfilController
	{
		public function index($acao)
		{
			$perfil = file_get_contents('app/View/perfil.html');
			echo $perfil;
			
		}
	}
?>
