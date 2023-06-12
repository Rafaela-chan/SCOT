<?php
require_once __DIR__ . '/../model/conexao.php';
class Usuario extends Conexao
{
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

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function getPosto()
    {
        return $this->posto;
    }

    public function getIdAcesso()
    {
        return $this->idAcesso;
    }

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function getSaram()
    {
        return $this->saram;
    }

    public function getNomeGuerra()
    {
        return $this->nomeGuerra;
    }

    public function getPatente()
    {
        return $this->patente;
    }

    public function getOM()
    {
        return $this->om;
    }

    public function getAcess()
    {
        return $this->acess;
    }

    public function setIdUsuario($param)
    {
        $this->idUsuario = $param;
    }

    public function setNomeCompleto($param)
    {
        $this->nomeCompleto = $param;
    }

    public function setPosto($param)
    {
        $this->posto = $param;
    }

    public function setIdAcesso($param)
    {
        $this->idAcesso = $param;
    }

    public function setIdTipo($param)
    {
        $this->idTipo = $param;
    }

    public function setCPF($param)
    {
        $this->cpf = $param;
    }

    public function setSaram($param)
    {
        $this->saram = $param;
    }

    public function setNomeGuerra($param)
    {
        $this->nomeGuerra = $param;
    }

    public function setPatente($param)
    {
        $this->patente = $param;
    }

    public function setOM($param)
    {
        $this->om = $param;
    }
    public function setAcess($param)
    {
        $this->acess = $param;
    }
    public function logar($user, $pass)
    {
        try {
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

            if ($result['valid']) {
                $sql = $this->conn->prepare("SELECT * FROM usuario WHERE cpf = '$user'");
                $sql->execute();
                $valores = $sql->fetchAll();
                if ($valores != NULL) {
                    foreach ($valores as $k => $v) {
                        $this->setIdAcesso($v['id_acesso']);
                        $this->setCPF(($result['cpf']));
                        $this->setSaram(($result['saram']));
                        $this->setNomeCompleto(($result['nomeCompleto']));
                        $this->setNomeGuerra(($result['nomeGuerra']));
                        $this->setPatente(($result['patente']));
                        $this->setOM(($result['om']));
                        $_SESSION['logado'] = true;
                        return true;
                    }
                } else {
                    $_SESSION['mensagem'] = 2;
                    header("Location: ../../../../SGCOTE/deslogar");
                }
            }else {
                $_SESSION['mensagem'] = 1;
                header("Location: ../../../../SGCOTE/deslogar");
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function acess()
    {
        if (($this->getIdAcesso()) == 1) {
            echo '<script type="text/javascript">changeStyle();</script>';
        }
    }


    public function deslogar()
    {
        header("Location: ../../../../SGCOTE/login.php?deslogar");
    }

    public function verificarLogin()
    {
        if (isset($_SESSION['logado'])) {
            return true;
        } elseif ($_SESSION['mensagem'] == 1) {
            $_SESSION['mensagem'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Usuário ou senha <strong>incorretos!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("Location: ../../../../SGCOTE/login.php");
            return false;
        } elseif ($_SESSION['mensagem'] == 2) {
            $_SESSION['mensagem'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Solicite acesso ao <strong>IEAD!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("Location: ../../../../SGCOTE/login.php");
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">É necessário logar para acessar o sistema!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            header("Location: ../../../../SGCOTE/login.php");
            return false;
        }
        //$_SESSION['mensagem'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">É necessário logar para acessar o sistema!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        //header("Location: ../../../../SGCOTE/login.php");
    }
}
