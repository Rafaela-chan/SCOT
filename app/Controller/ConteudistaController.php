<?php
	
		Class ConteudistaController
		{

			public function index($acao)
			{
                try{
                    $this->testeAcao($acao);
                } catch(Exception $e) {
                    header('Location: ?pagina=erro');
                }   
			}

            private function testeAcao($acao)
            {
                if($acao == 'cadastrar'){
                    $listarconteudista = file_get_contents('app/View/cadastrarConteudista.html');
                    echo $listarconteudista;
                    return true;
                }

                throw new Exception('erro');
            }

		}