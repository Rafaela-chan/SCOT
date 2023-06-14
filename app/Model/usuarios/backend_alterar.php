<?php
$cpf_usuario = $_POST['cpf_usuario'];
$nome_usuario = $_POST['nome_usuario'];
$id_usuario = $_POST['id_usuario'];
$id_acesso = $_POST['acesso_usuario'];

/*
echo($cpf_usuario);
echo($nome_usuario);
echo($id_acesso);
*/

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  //echo ($cpf_conteudista.' '.$nome_conteudista.' '.$id_conteudista.' '.$id_curso);
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE `usuario` SET `nome_usuario` = '$nome_usuario', `cpf` = '$cpf_usuario', `id_acesso` = '$id_acesso' WHERE `usuario`.`id_usuario` = '$id_usuario';";
  $conn->exec($sql);
  echo "<script> alert('Usuario atualizado.'); window.location.href='../../../users';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); 
  //echo "<script> alert('Tente novamente!'); window.location.href='../../../users';</script>";
}

$conn = null;

?>