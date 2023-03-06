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
                    $conteudo = file_get_contents('app/View/cadastrarConteudista.html');
                    echo $conteudo;
                    return true;
                } elseif($acao == 'curso'){
                    $conteudo = file_get_contents('app/View/cadastrarCurso.html');
                    echo $conteudo;
                    return true;
                } elseif($acao == 'vincular'){
                    $conteudo = file_get_contents('app/View/vincularConteudistas.html');
                    echo $conteudo;
                    return true;
                } elseif($acao == 'listar'){
                    $conteudo = file_get_contents('app/View/listarConteudistas.html');
                    echo $conteudo;
                    return true;
                }

                throw new Exception('erro');
            }

		}