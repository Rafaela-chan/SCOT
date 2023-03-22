<?php
	
		Class TutoresController
		{
			public function index($acao)
			{
                try{
                    $this->testeAcao($acao);
                } catch(Exception $e) {
                    header('Location: /SCOT/erro/');
                }   
			}

            private function testeAcao($acao)
            {
                $div = '<h1 class="h3 mb-2 text-gray-800">Tutores</h1><hr>';
                if($acao == 'cadastrar'){
                    $conteudo = file_get_contents('app/View/cadastrarTutores.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'curso'){
                    $conteudo = file_get_contents('app/View/cadastrarCurso.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'vincular'){
                    $conteudo = file_get_contents('app/View/vincularTutores.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'listar'){
                    $conteudo = file_get_contents('app/View/listarTutores.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                }

                throw new Exception('erro');
            }

		}