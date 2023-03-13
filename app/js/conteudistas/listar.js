function listarConteudistas() {
    $.ajax({
        type: 'GET',
        url: '../app/Model/webservice.php',
        data: {
            acao: 'listarConteudistas' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('tbody[name=bode]').append('<tr><td>' + data.nome_completo[i] + '</td> <td>' + data.nome_om[i] + '</td><td>' + data.nome_curso[i] + '</td></tr>');
            }
            return true;
        }
    });
}

async function execute(){
    await listarConteudistas();
    $('#dataTable').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    })
}

$(document).ready(function () {
    execute();
    /*$('#dataTable').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    } );*/
});