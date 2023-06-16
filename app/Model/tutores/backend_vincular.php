<?php
$id_tutor = $_POST['id_tutor'];
$id_curso = $_POST['id_curso'];

echo $id_curso;
echo $id_tutor;

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

if($id_tutor != null && $id_curso != null){  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO lista_tutor (id_tutor, id_curso)
    VALUES ($id_tutor, $id_curso)";
    $conn->exec($sql);
    //echo "New record created successfully";
    echo "<script> alert('tutor vinculado!'); window.location.href='../../../tutores/vincular';</script>";
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Tente novamente!'); window.location.href='../../../tutores/vincular';</script>";
  }}else{
    echo "<script> alert('Selecione um tutor e um curso!'); window.location.href='../../../tutores/vincular';</script>";
  }

$conn = null; 

?>