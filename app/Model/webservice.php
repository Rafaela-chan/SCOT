<?php

define('DB_NAME', "SGCOTE");
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "I3aD_2021*");


try{
	$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}

if($_GET['acao'] == 'dropConteudista'){
$sql = $pdo->prepare("SELECT * FROM conteudista ORDER BY nome_completo");
$sql->execute();
$n = 0;
$retorno['qtd'] = $sql->rowCount();
while($ln = $sql->fetchObject()){
	$retorno['id_conteudista'][$n] = $ln->id_conteudista;
	$retorno['nome_completo'][$n]   = $ln->nome_completo;
	$n++;
}
$sql = '';	
}

if($_GET['acao'] == 'dropTutor'){
	$sql = $pdo->prepare("SELECT * FROM tutor ORDER BY nome_completo");
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['id_tutor'][$n] = $ln->id_tutor;
		$retorno['nome_completo'][$n]   = $ln->nome_completo;
		$n++;
	}
	$sql = '';	
	}

if($_GET['acao'] == 'dropCursos'){
$sql = $pdo->prepare("SELECT * FROM curso ORDER BY nome_curso");
$sql->execute();
$n = 0;
$retorno['qtd'] = $sql->rowCount();
while($ln = $sql->fetchObject()){
	$retorno['id_curso'][$n] = $ln->id_curso;
	$retorno['nome_curso'][$n]   = $ln->nome_curso;
	$n++;
}
$sql = '';	
}
if($_GET['acao'] == 'dropOm'){
$sql = $pdo->prepare("SELECT * FROM om ORDER BY nome_om");
$sql->execute();
$n = 0;
$retorno['qtd'] = $sql->rowCount();
while($ln = $sql->fetchObject()){
	$retorno['id_om'][$n] = $ln->id_om;
	$retorno['nome_om'][$n]   = $ln->nome_om;
	$n++;
}
$sql = '';	
}

if($_GET['acao'] == 'listaConteudistas'){
	$sql = $pdo->prepare("SELECT conteudista.id_conteudista, conteudista.nome_completo, conteudista.cpf, lista_conteudista.id_curso, curso.nome_curso, conteudista.id_om, om.nome_om FROM conteudista LEFT JOIN lista_conteudista ON conteudista.id_conteudista = lista_conteudista.id_conteudista LEFT JOIN curso ON lista_conteudista.id_curso = curso.id_curso LEFT JOIN om ON conteudista.id_om = om.id_om WHERE conteudista.id_conteudista = ".$_GET['id_conteudista']);
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['id_conteudista'][$n] = $ln->id_conteudista;
		$retorno['nome_completo'][$n] = $ln->nome_completo;
		$retorno['cpf'][$n] = $ln->cpf;		
		$retorno['id_curso'][$n] = $ln->id_curso;
		$retorno['nome_curso'][$n] = $ln->nome_curso;
		$retorno['id_om'][$n] = $ln->id_om;
		$retorno['nome_om'][$n] = $ln->nome_om;
		$n++;
	}
	$sql = '';	
}

if($_GET['acao'] == 'listaUsuarios'){
	$sql = $pdo->prepare("SELECT usuario.id_usuario, usuario.nome_usuario, usuario.cpf, usuario.id_acesso, acesso.nome_acesso FROM usuario LEFT JOIN acesso ON usuario.id_acesso = acesso.id_acesso WHERE usuario.id_usuario = ".$_GET['id_usuario']);
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['id_usuario'][$n] = $ln->id_usuario;
		$retorno['nome_usuario'][$n] = $ln->nome_usuario;
		$retorno['cpf'][$n] = $ln->cpf;		
		$retorno['id_acesso'][$n] = $ln->id_acesso;
		$retorno['nome_acesso'][$n] = $ln->nome_acesso;
		$n++;
	}
	$sql = '';	
}

if($_GET['acao'] == 'dropAcesso'){
	$sql = $pdo->prepare("SELECT * FROM acesso ORDER BY id_acesso");
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['id_acesso'][$n] = $ln->id_acesso;
		$retorno['nome_acesso'][$n]   = $ln->nome_acesso;
		$n++;
	}
	$sql = '';	
}

if($_GET['acao'] == 'listarConteudistas'){
	$n = 0;
	$sql = $pdo->prepare("SELECT conteudista.id_conteudista, conteudista.nome_completo, conteudista.cpf, lista_conteudista.id_curso, curso.nome_curso, om.nome_om FROM conteudista LEFT JOIN lista_conteudista ON conteudista.id_conteudista = lista_conteudista.id_conteudista LEFT JOIN curso ON lista_conteudista.id_curso = curso.id_curso LEFT JOIN om ON conteudista.id_om = om.id_om ORDER BY nome_completo");
	$sql->execute();
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
	$retorno['nome_completo'][$n] = $ln->nome_completo;
	$retorno['cpf'][$n] = $ln->cpf;
	$retorno['nome_om'][$n] = $ln->nome_om;
	$retorno['nome_curso'][$n] = $ln->nome_curso;
	$n++;
	}
	$sql = '';	
}

if($_GET['acao'] == 'listaCurso'){
	$id_conteudista = $_GET['id_conteudista'];
	$sql = $pdo->prepare("SELECT curso.nome_curso FROM curso LEFT JOIN lista_conteudista ON lista_conteudista.id_curso = curso.id_curso WHERE lista_conteudista.id_conteudista = $id_conteudista ORDER BY nome_curso");
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['nome_curso'][$n] = $ln->nome_curso;
		$n++;
	}
		$sql = '';	
}




die(json_encode($retorno));

?>