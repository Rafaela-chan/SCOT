<?php
$nome_curso = $_POST['nome_curso'];
$data_inicio = $_POST['data_inicio'];
$data=date("Ymd", strtotime($data_inicio));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conteudistas";


if($nome_curso != null){  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO curso (nome_curso, data_inicio)
    VALUES ('$nome_curso', $data)";
    $conn->exec($sql);
    //echo "New record created successfully";
    echo "<script> alert('Curso Cadastrado.'); window.location.href='../../../conteudistas/curso';</script>";
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Tente novamente!'); window.location.href='../../../conteudistas/curso';</script>";
  }}else{
    echo "<script> alert('Insira o nome do curso!'); window.location.href='../../../conteudistas/curso;</script>";
  }
  

$conn = null; 

?>