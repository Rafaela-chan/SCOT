<?php
define('DB_NAME', "conteudistas");
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");

try {
  $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'ERROR: ' . $e->getMessage();
}


if (isset($_POST['input'])) {
  $input = $_POST['input'];
  $sql = $pdo->prepare("SELECT conteudista.id_conteudista, conteudista.nome_completo, conteudista.cpf, lista_conteudista.id_curso, curso.nome_curso, om.nome_om FROM conteudista LEFT JOIN lista_conteudista ON conteudista.id_conteudista = lista_conteudista.id_conteudista LEFT JOIN curso ON lista_conteudista.id_curso = curso.id_curso LEFT JOIN om ON conteudista.id_om = om.id_om WHERE nome_completo LIKE '{$input}%' OR cpf LIKE '{$input}%' OR nome_guerra LIKE '{$input}%' OR nome_curso LIKE '{$input}%' OR nome_om LIKE '{$input}%'");
  $sql->execute();
  $n = 0;
  $retorno['qtd'] = $sql->rowCount();
  if ($retorno['qtd'] > 0) {
?>
    <script>
      $('div[name=tabelaNova]').empty();
    </script>
    <div class="col">
      <div class="modal fade" id="meuModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <form method="post" action="../../model/backend_om.php">
                <p>Lista de Cursos</p>
                <div name="exibir"></div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div name="tabelaPesquisa">
      <table class="table table-bordered table-striped mt-4">
        <thead name="tabelaCompleta">
          <tr>
            <th>Nome</th>
            <th>OM</th>
            <th>Curso</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($ln = $sql->fetchObject()) {
            $retorno['nome_completo'][$n] = $ln->nome_completo;
            $retorno['nome_om'][$n] = $ln->nome_om;
            $retorno['nome_curso'][$n] = $ln->nome_curso;
          ?>
            <tr>
              <td><?php echo $retorno['nome_completo'][$n]; ?></td>
              <td><?php echo $retorno['nome_om'][$n]; ?></td>
              <td><?php echo $retorno['nome_curso'][$n]; ?></td>
            </tr>

          <?php
            $n++;
          }

          ?>
        </tbody>
      </table>
    </div>
<?php
  $sql = '';	
  } else {
    echo "<h6 class='text-danger text-center mt-3'> Não encontrado</h6>";
  }
}

$conn = null;
?>