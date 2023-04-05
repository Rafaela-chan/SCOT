<?php
$id_conteudista = $_POST['id_conteudista'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM conteudista WHERE `conteudista`.`id_conteudista` = $id_conteudista";
  $conn->exec($sql);
  echo "<script> alert('Conteudista deletado.'); window.location.href='../../../conteudistas/listar';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage(); 
  //echo "<script> alert('Tente novamente!'); window.location.href='../../../conteudistas/listar';</script>";
}

$conn = null;

?>
