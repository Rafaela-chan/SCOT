<?php
$id_conteudista = $_POST['id_conteudista'];
$id_curso = $_POST['id_curso'];

echo $id_curso;
echo $id_conteudista;

$servername = "localhost";
$username = "	iead";
$password = "I3aD_2021*";
$dbname = "conteudistas";

if($id_conteudista != null && $id_curso != null){  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO lista_conteudista (id_conteudista, id_curso)
    VALUES ($id_conteudista, $id_curso)";
    $conn->exec($sql);
    //echo "New record created successfully";
    echo "<script> alert('Conteudista vinculado!'); window.location.href='../../view/conteudistas/vincular.php';</script>";
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Tente novamente!'); window.location.href='../../view/conteudistas/vincular.php';</script>";
  }}else{
    echo "<script> alert('Selecione um conteudista e um curso!'); window.location.href='../../view/conteudistas/vincular.php';</script>";
  }

$conn = null; 

?>