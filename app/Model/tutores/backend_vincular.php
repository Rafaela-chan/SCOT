<?php
$id_tutor = $_POST['id_tutor'];
$id_curso = $_POST['id_curso'];

echo $id_curso;
echo $id_tutor;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conteudistas";

if($id_conteudista != null && $id_curso != null){  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO lista_tutor (id_tutor, id_curso)
    VALUES ($id_tutor, $id_curso)";
    $conn->exec($sql);
    //echo "New record created successfully";
    echo "<script> alert('Tutor vinculado!'); window.location.href='../../view/tutores/vincular.php';</script>";
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Tente novamente!'); window.location.href='../../view/tutores/vincular.php';</script>";
  }}else{
    echo "<script> alert('Selecione um conteudista e um curso!'); window.location.href='../../view/tutores/vincular.php';</script>";
  }

$conn = null; 

?>