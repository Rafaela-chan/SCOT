
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

$(document).ready(function () {
    listarConteudistas();
})

