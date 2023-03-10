function listaCurso(id_conteudista) {
    $.ajax({
        type: 'GET',
        url: '../../model/webservice.php',
        data: {
            acao: 'listaCurso', //Envia esse dado como GET para o webservice 
            id_conteudista: id_conteudista
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('div[name=exibir]').empty();
            for (i = 0; i < data.qtd; i++) {
                $('div[name=exibir]').append('<p>' + data.nome_curso[i] + '</p>');
            }
        }
    });
}

function listarConteudistas() {
    $('div[name=tabelaPesquisa]').empty();
    $.ajax({
        type: 'GET',
        url: '../../model/webservice.php',
        data: {
            acao: 'listarConteudistas' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('div[name=tabelaNova]').empty();
            $('div[name=tabelaNova]').append('<table class="table table-bordered table-striped mt-4" name="tbode"><thead><tr><th>Nome</th><th>OM</th><th>Curso</th></tr></thead><tbody name="bode">');
            for (i = 0; i < data.qtd; i++) {
                $('tbody[name=bode]').append('<tr><td>' + data.nome_completo[i] + '</td> <td>' + data.nome_om[i] + '</td><td>' + data.nome_curso[i] + '</td></tr>');
            }
        }
    });
}

$(document).ready(function () {
    $("#busca").keyup(function () {
        var input = $(this).val();
        //alert(input);
        if (input != "") {
            $.ajax({
                url: "../../model/conteudistas/backend_lista.php",
                method: "POST",
                data: { input: input },
                success: function (data) {
                    $("#resultado").html(data);
                }
            });
        } else {
            $("#resultado").css("display", "block");
        }
    })
});