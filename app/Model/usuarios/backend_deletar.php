<?php
$id_usuario = $_POST['id_usuario'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM usuario WHERE `usuario`.`id_usuario` = $id_usuario";
  $conn->exec($sql);
  echo "<script> alert('Usuário deletado.'); window.location.href='../../../users';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); 
  //echo "<script> alert('Tente novamente!'); window.location.href='../../../users';</script>";
}

$conn = null;

?>