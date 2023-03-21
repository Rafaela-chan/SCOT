<?php
$cpf = $_POST['cpf'];
$nome_completo = $_POST['nome_completo'];
$nome_guerra = $_POST['nome_guerra'];
$id_om = $_POST['id_om'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "conteudistas";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO conteudista (cpf, nome_completo, nome_guerra, id_om)
  VALUES ($cpf, '$nome_completo', '$nome_guerra', $id_om)";
  $conn->exec($sql);
  echo "<script> alert('Conteudista Cadastrado.'); window.location.href='../../../conteudistas/cadastrar';</script>";
} catch(PDOException $e) {
  //echo $sql . "<br>" . $e->getMessage();
  echo "<script> alert('Tente novamente!'); window.location.href='../../../conteudistas/cadastrar';</script>";
}

$conn = null;

?>