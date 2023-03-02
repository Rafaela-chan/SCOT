<?php

class Usuario{
    private $idUsuario;
    private $nomeCompleto;
    private $posto;
    private $idAcesso;
    private $idTipo;
    private $cpf;

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getNomeCompleto(){
        return $this->nomeCompleto;
    }

    public function getPosto(){
        return $this->posto;
    }

    public function getIdAcesso(){
        return $this->idAcesso;
    }

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function getCPF(){
        return $this->cpf;
    }
    
    public function setIdUsuario($param){
        $this->idUsuario = $param;
    }

    public function setNomeCompleto($param){
        $this->nomeCompleto = $param;
    }

    public function setPosto($param){
        $this->posto = $param;
    }

    public function setIdAcesso($param){
        $this->idAcesso = $param;
    }

    public function setIdTipo($param){
        $this->idTipo = $param;
    }

    public function setCPF($param){
        $this->cpf = $param;
    }

    
    public function logar($user,$pass){
        try{
            $url_path = 'http://apps.gapls.intraer/scati/resource/v1/ldap';
            $data = http_build_query(array(
                                        'login' => $user, 
                                        'senha' => $pass
            ));
                                    
            $options = array('http' => array(
                                        'method' => "POST",
                                        'header' =>
                                            "Content-Type: application/x-www-form-urlencoded",
                                        'content' => $data
                                    ));

            $stream = stream_context_create($options);
            $result = json_decode((file_get_contents($url_path, false, $stream)), true);
            //var_dump($result);
            if($result['valid']){
                foreach($result as $v) {
                    $this->setNomeCompleto(($v['nomeCompleto']));
                    
                }

                header("Location: ../../");
            }
    
                                    

        }catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deslogar(){
        session_destroy();
        echo "<script> alert('Você deslogou.'); window.location.href='../../../../iead-conteudistas/sistemas/login.php';</script>";
    }
    public function verificarLogin(){
        $loginTeste = $_SESSION['logado'];
        if($loginTeste == false){
            echo "<script> alert('É necessário logar para acessar o sistema.'); window.location.href='../../../../sistema/login.php';</script>";
        }
    }

    public function atualizar($cpf, $nomeCompleto, $nomeGuerra, $posto, $saram){
        
    }
}

/*
if($_GET['acao']=='logar'){
    $leandro = new Usuario;
    $leandro->logar('15570391606', 'iead');
}
if($_GET['acao']=='logar2'){
    $leandro = new Usuario;
    $leandro->logar('15570391606', 'iesfsad');
}
*/
session_start();
if(isset($_POST['submit'])){
    $usuario = new Usuario;
    $user = $_POST['user'];
    //$pass = sha1($_POST['password']);
    $pass = $_POST['password'];
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    $log = $usuario->logar($user,$pass);
    if($log){
        $_SESSION['logado'] = true;
        header('Location: sistema/');
    }
}
?>