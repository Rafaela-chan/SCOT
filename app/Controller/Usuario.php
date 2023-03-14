<?php

class Usuario{
    private $idUsuario;
    private $nomeCompleto;
    private $posto;
    private $idAcesso;
    private $idTipo;
    private $cpf;
    private $saram;
    private $nomeGuerra;
    private $patente;
    private $om;
    private $acess;

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

    public function getSaram(){
        return $this->saram;
    }

    public function getNomeGuerra(){
        return $this->nomeGuerra;
    }

    public function getPatente(){
        return $this->patente;
    }

    public function getOM(){
        return $this->om;
    }
    
    public function getAcess(){
        return $this->acess;
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

    public function setSaram($param){
        $this->saram = $param;
    }
    
    public function setNomeGuerra($param){
        $this->nomeGuerra = $param;
    }

    public function setPatente($param){
        $this->patente = $param;
    }

    public function setOM($param){
        $this->om = $param;
    }
    public function setAcess($param){
		$this->acess = $param;
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
                $dados = file_get_contents('users.json');
                $dadosJson = json_decode($dados);
                foreach($dadosJson->users as $usuario){
                    if(($usuario->cpf) == $user){
                        $this->setIdAcesso($usuario->idAcess);
                        $this->setAcess($usuario->acess);
                        $this->setCPF(($result['cpf']));
                        $this->setSaram(($result['saram']));
                        $this->setNomeCompleto(($result['nomeCompleto']));
                        $this->setNomeGuerra(($result['nomeGuerra']));
                        $this->setPatente(($result['patente']));
                        $this->setOM(($result['om']));
                        return true;
                    }
                }
                if($this->getIdAcesso() == NULL){
                    echo "<script> alert('você é chatu'); </script>";
                }
                
            }else{
                $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Usuário ou senha incorretos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";                
                header("Location: ../../../../SCOT/login.php");
            }
            
        }catch(Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deslogar(){
        session_destroy();
        session_start();
        $_SESSION['mensagem'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">Deslogado com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        header("Location: ../../../../SCOT/login.php");
    }

    public function verificarLogin(){
        if(isset($_SESSION['logado'])){
            $loginTeste = $_SESSION['logado'];
            return true;
            if($loginTeste == null || $loginTeste == false){
                $_SESSION['mensagem'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">É necessário logar para acessar o sistema!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                return false;
            }
        }else{
           header("Location: ../../../../SCOT/login.php");
        }
    }

    public function atualizar($cpf, $nomeCompleto, $nomeGuerra, $posto, $saram){
        
    }



}

session_start();

?>