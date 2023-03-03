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
           
            /*$result = array(
                        'cpf' => "15570391606",
                        'saram' => "7401957",
                        'nomeCompleto' => "Leandro Lucas Domingos",
                        'nomeGuerra' => "Leandro Lucas",
                        'patente' => "S2",
                        'om' => "CIAAR"
            );*/
  
            //var_dump($result);
            if($result['valid']){
                $this->setCPF(($result['cpf']));
                $this->setSaram(($result['saram']));
                $this->setNomeCompleto(($result['nomeCompleto']));
                $this->setNomeGuerra(($result['nomeGuerra']));
                $this->setPatente(($result['patente']));
                $this->setSaram(($result['om']));
                    
            }
            header("Location: ?pagina=home");
            
        }catch(Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deslogar(){
        session_destroy();
        echo "<script> alert('Você deslogou.'); window.location.href='../../../../iead-conteudistas/sistemas/login.php';</script>";
    }
    /*public function verificarLogin(){
        $loginTeste = $_SESSION['logado'];
        if($loginTeste == false){
            echo "<script> alert('É necessário logar para acessar o sistema.'); window.location.href='../../../../sistema/login.php';</script>";
        }
    }*/

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
?>