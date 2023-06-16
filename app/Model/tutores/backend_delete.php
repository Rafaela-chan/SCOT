<?php
$id_tutor = $_POST['id_tutor'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM lista_tutor WHERE `lista_tutor`.`id_tutor` = $id_tutor; DELETE FROM tutor WHERE `tutor`.`id_tutor` = $id_tutor";
  $conn->exec($sql);
  echo "<script> alert('tutor deletado.'); window.location.href='../../../tutores/listar';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); 
  //echo "<script> alert('Tente novamente!'); window.location.href='../../../tutores/listar';</script>";
}

$conn = null;

?>
