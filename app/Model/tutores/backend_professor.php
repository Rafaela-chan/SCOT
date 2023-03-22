<?php
$cpf = $_POST['cpf'];
$nome_completo = $_POST['nome_completo'];
$nome_guerra = $_POST['nome_guerra'];
$id_om = $_POST['id_om'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conteudistas";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO conteudista (cpf, nome_completo, nome_guerra, id_om)
  VALUES ($cpf, '$nome_completo', '$nome_guerra', $id_om)";
  $conn->exec($sql);
  echo "<script> alert('Tutor Cadastrado.'); window.location.href='../../../tutores/cadastrar';</script>";
} catch(PDOException $e) {
  //echo $sql . "<br>" . $e->getMessage();
  echo "<script> alert('Tente novamente!'); window.location.href='../../../tutores/cadastrar';</script>";
}

$conn = null;

?>