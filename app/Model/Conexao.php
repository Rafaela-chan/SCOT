<?php 
session_start();
abstract class Conexao{
//FUNÇÃO RESPONSÁVEL POR CONECTAR COM O BD
	public function __construct(){
		require_once 'Config.php';
		try {
		    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //Retorna a conexão estabelecida
			/*echo "Success";*/
		    return $this->conn = $conn;
		}
		catch(PDOException $e){
		    return $this->conn . "<br>" . $e->getMessage();//Retorna o erro de conexão se houver
		}
	}

    protected function closeConexao(){
        if($this->conn != null){        	
        	$this->conn = null;
        }
    }	
}
?>