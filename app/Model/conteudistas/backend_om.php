<?php
$nome_om = $_POST['nome_om'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "conteudistas";

if($nome_om != null){
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO om (nome_om)
  VALUES ('$nome_om')";
  $conn->exec($sql);
  //echo "New record created successfully";
  echo "<script> alert('OM Cadastrada.'); window.location.href='../../../conteudistas/cadastrar'</script>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "<script> alert('Tente novamente!'); window.location.href='../../../conteudistas/cadastrar.php';</script>";
}
}else{
  echo "<script> alert('Insira um nome!'); window.location.href='../../../conteudistas/cadastrar.php';</script>";
}

$conn = null;
?>
