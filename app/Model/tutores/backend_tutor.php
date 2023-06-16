<?php
$cpf = $valor = str_replace(array('.','-','/','(',')'), "", $_POST['cpf']);
$nome_completo = $_POST['nome_completo'];
$nome_guerra = $_POST['nome_guerra'];
$id_om = $_POST['id_om'];
$telefone = str_replace(array('.','-','/','(',')', ' '), "", $_POST['telefone']);
$email = $_POST['email'];
$posto = $_POST['posto'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO tutor (cpf, nome_completo, nome_guerra, id_om, telefone, email, posto)
  VALUES ('$cpf', '$nome_completo', '$nome_guerra', $id_om, $telefone, '$email', '$posto')";
  $conn->exec($sql);
  echo "<script> alert('tutor Cadastrado.'); window.location.href='../../../tutores/cadastrar';</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "<script> alert('Tente novamente!'); window.location.href='../../../tutores/cadastrar';</script>";
}

$conn = null;

?>