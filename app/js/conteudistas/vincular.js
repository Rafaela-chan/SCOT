function dropConteudista() {
    $.ajax({
      type: 'GET',
      url: '../app/Model/webservice.php',
      data: {
        acao: 'dropConteudista' //Envia esse dado como GET para o webservice 
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        for (i = 0; i < data.qtd; i++) {
          $('select[name=id_conteudista]').append('<option value="' + data.id_conteudista[i] + '">' + data.nome_completo[i] + '</option>');
        }
      }
    });
  }

  function dropCursos() {
    $.ajax({
      type: 'GET',
      url: '../app/Model/webservice.php',
      data: {
        acao: 'dropCursos' //Envia esse dado como GET para o webservice 
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        for (i = 0; i < data.qtd; i++) {
          $('select[name=id_curso]').append('<option value="' + data.id_curso[i] + '">' + data.nome_curso[i] + '</option>');
        }
      }
    });
  }

  $(document).ready(function() {
    dropConteudista();
    dropCursos();
  });