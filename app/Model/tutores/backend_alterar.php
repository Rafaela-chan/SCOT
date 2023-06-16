<?php
$cpf_tutor = $_POST['cpf_tutor'];
$nome_tutor = $_POST['nome_tutor'];
$id_tutor = $_POST['id_tutor'];
$id_curso = $_POST['curso_tutor'];
$id_om = $_POST['om_tutor'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  //echo ($cpf_tutor.' '.$nome_tutor.' '.$id_tutor.' '.$id_curso);
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE `tutor` SET `nome_completo` = '$nome_tutor', `cpf` = '$cpf_tutor', `id_om` = '$id_om' WHERE `tutor`.`id_tutor` = '$id_tutor'; UPDATE `lista_tutor` SET `id_curso` = '$id_curso' WHERE `lista_tutor`.`id_tutor` = $id_tutor AND `lista_tutor`.`id_curso` = $id_curso;";
  $conn->exec($sql);
  echo "<script> alert('Tutor atualizado.'); window.location.href='../../../tutores/listar';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); 
  //echo "<script> alert('Tente novamente!'); window.location.href='../../../tutores/listar';</script>";
}

$conn = null;
?>
