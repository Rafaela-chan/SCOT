<?php
$nome_usuario = $_POST['nome_usuario'];
$cpf1 = $_POST['cpf'];
$id_acesso = $_POST['id_acesso'];

$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

if($nome_usuario != null){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $cpf = str_replace(array('.','-','/'), "", $cpf1);
        //retirando a mascara do CPF

        $sql = "INSERT INTO `usuario` (`cpf`, `id_acesso`, `nome_usuario`) 
        VALUES ('$cpf1','$id_acesso','$nome_usuario')";
        $conn->exec($sql);

        //echo "New record created successfully";
        echo "<script> alert('Usuário Cadastrado.'); window.location.href='../../users'</script>";
    } catch(PDOException $e) {
      $_SESSION["mensagem"] = "<div class='alert alert-warning' role='alert'>
      Erro no cadastro! Tente novamente.
    </div>";
      header("Location: ../../adicionar"); 
      }
}else{
  echo "<script> alert('Insira um nome!'); window.location.href='../../adicionar';</script>";
}

$conn = null;
?>
