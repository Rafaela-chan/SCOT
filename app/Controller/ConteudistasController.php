<?php
	
		Class ConteudistasController
		{
			public function index($acao)
			{
                try{
                    $this->testeAcao($acao);
                } catch(Exception $e) {
                    header('Location: /SGCOTE/erro/');
                }   
			}

            private function testeAcao($acao)
            {
                $div = '<h1 class="h3 mb-2 text-gray-800">Conteudistas</h1><hr>';
                if($acao == 'cadastrar'){
                    $conteudo = file_get_contents('app/View/cadastrarConteudista.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'curso'){
                    $conteudo = file_get_contents('app/View/cadastrarCurso.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'vincular'){
                    $conteudo = file_get_contents('app/View/vincularConteudistas.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                } elseif($acao == 'listar'){
                    $conteudo = file_get_contents('app/View/listarConteudistas.html');
                    $tplPronto = str_replace('{{div}}' ,$div , $conteudo);
                    echo $tplPronto;
                    return true;
                }

                throw new Exception('erro');
            }

		}