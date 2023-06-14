<?php

require_once 'app/Core/Core.php';

require_once 'app/Controller/LoginController.php';
require_once 'app/Controller/Usuario.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/ConteudistasController.php';
require_once 'app/Controller/PerfilController.php';
require_once 'app/Controller/DeslogarController.php';
require_once 'app/Controller/TutoresController.php';
require_once 'app/Controller/AdicionarController.php';
require_once 'app/Controller/UsersController.php';

$template = file_get_contents('app/Template1/estrutura.html');
$usuario = new Usuario;


ob_start();
$core = new Core;
$core->start($_GET);

$saida = ob_get_contents();
ob_end_clean();

if (isset($_POST['submit'])) {
    $_SESSION['user'] = str_replace(array('.','-','/'), "", $_POST['user']);
    $_SESSION['pass'] = $_POST['password'];
    $_SESSION['logar'] = true;
}

if (isset($_SESSION['logar'])) {
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $usuario->logar($user, $pass);
}


$usuario->verificarLogin();

$nomeGuerra = $usuario->getNomeGuerra();
$patente = $usuario->getPatente();
$nomeCompleto = $usuario->getNomeCompleto();
$om = $usuario->getOM();
$saram = $usuario->getSaram();
$cpf = $usuario->getCPF();
$idAcesso = $usuario->getIdAcesso();

if (isset($_GET['url'])) {
    if ($_GET['url'] == 'perfil') {
        $cpfHide = $cpf[9] . $cpf[10];

        $saidaPronto = str_replace(
            array(
                '{{cpf}}', '{{nome_completo}}',  '{{nome_guerra}}', '{{om}}', '{{saram}}'
            ),
            array(
                $cpfHide, $nomeCompleto, $nomeGuerra, $om, $saram
            ),
            $saida
        );

        $tplPronto = str_replace(
            array(
                '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
            ),
            array(
                $saidaPronto, $patente, $nomeGuerra
            ),
            $template
        );
    } else {
        $tplPronto = str_replace(
            array(
                '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
            ),
            array(
                $saida, $patente, $nomeGuerra
            ),
            $template
        );
    }
} else {
    $tplPronto = str_replace(
        array(
            '{{area_dinamica}}', '{{patente}}', '{{nome_guerra}}'
        ),
        array(
            $saida, $patente, $nomeGuerra
        ),
        $template
    );
};
echo $tplPronto;


if ($idAcesso == 3) {
?>
    <script>
        var x = document.getElementsByClassName("admin");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = 'none';
        }
        $('#tableConteudistas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/SGCOTE/app/Model/conteudistas/backend_lista.php",
                "type": "POST",
            },
            "columnDefs": [{
                targets: [3],
                visible: false
            }]
        });
    </script>
<?php
} elseif ($idAcesso == 1) {
?>
    <script>
        $('#tableConteudistas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/SGCOTE/app/Model/conteudistas/backend_lista.php",
                "type": "POST",
            },
            "columnDefs": [{
                targets: '_all',
                visible: true
            }]
        });
        $('#tableTutores').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/SGCOTE/app/Model/tutores/backend_lista.php",
                "type": "POST",
            },
            "columnDefs": [{
                targets: '_all',
                visible: true
            }]
        });
        $('#tableUsuarios').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/SGCOTE/app/Model/backend_users.php",
                "type": "POST",
            },
            /*"columnDefs": [{
                targets: '_all',
                visible: true
            }],*/
            "columnDefs": [{
                "targets": [2],
                "visible": true,
                "searchable": false,
                "render": function(data, type, row) {
        return "***.***.***-" + data.substring(9,11);
      },
    }]
        });
    </script>
<?php
}
