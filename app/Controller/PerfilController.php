<?php

	Class PerfilController
	{
		public function index($acao)
		{
			$perfil = file_get_contents('app/View/perfil.html');
			/*$user = new Usuario;
			if(isset($_SESSION['logar'])){
    			$user = $_SESSION['user'];
   				$pass = $_SESSION['pass'];
   				$user->logar($user, $pass);
				$cpf = $user->getCPF();
				$patente = $user->getPatente();
				$nomeCompleto = $user->getNomeCompleto();
				$nomeGuerra = $user->getNomeGuerra();
				$om = $user->getOM();
				$saram = $user->getSaram();
			}

			$perfilPronto = str_replace('{{cpf}}', $cpf, $perfil);*/
			echo $perfil;
		}
	}
?>
