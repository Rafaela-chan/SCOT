function dropOm() {
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropOm' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_om').append('<option value="' + data.id_om[i] + '">' + data.nome_om[i] + '</option>');
            }
        }
    });
}

function dropConteudista() {
    $.ajax({
        type: 'GET',
        url: '../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropConteudista' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_conteudista]').append('<option value="' + data.id_conteudista[i] + '">' + data.nome_completo[i] + '</option>');
            }
        }
    });
}

function dropTutor() {
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropTutor' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_tutor]').append('<option value="' + data.id_tutor[i] + '">' + data.nome_completo[i] + '</option>');
            }
        }
    });
}

function listaConteudistas(id_conteudista) {
    $('select[name=om_conteudista]').empty();
    $('select[name=om_conteudista]').append('<option id = "id_om" class="id_om" value="" name="nome_om"></option>');
    $('select[name=curso_conteudista]').empty();
    $('select[name=curso_conteudista]').append('<option id = "id_curso" class="id_curso" value="" name="nome_curso"></option>');
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            id_conteudista: id_conteudista,
            acao: 'listaConteudistas' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var nome_om = document.getElementsByClassName("id_om");
            var curso_conteudista = document.getElementsByClassName("curso_conteudista");
            var nome_conteudista = document.getElementsByClassName("nome_conteudista");
            var cpf_conteudista = document.getElementsByClassName("cpf_conteudista");
            var id_conteudista = document.getElementsByClassName("id_conteudista");
            var i;
            for (i = 0; i < nome_conteudista.length; i++) {
                nome_conteudista[i].value = data.nome_completo[0];
            }
            for (i = 0; i < cpf_conteudista.length; i++) {
                cpf_conteudista[i].value = data.cpf[0];
            }
            for (i = 0; i < id_conteudista.length; i++) {
                id_conteudista[i].value = data.id_conteudista[0];
            }
            for (i = 0; i < nome_om.length; i++) {
                nome_om[i].value = data.id_om[0];
                $('option[name=nome_om]').empty();
                $('option[name=nome_om]').append(data.nome_om[0]);
            }
            for (i = 0; i < curso_conteudista.length; i++) {
                curso_conteudista[i].value = data.id_curso[0];
                $('option[name=nome_curso]').empty();
                $('option[name=nome_curso]').append(data.nome_curso[0]);
                console.log(curso_conteudista[i]);
            }
        }
    });
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropOm' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            
            var conteudo = document.getElementById("id_om").value;
            for (i = 0; i < data.qtd; i++) {
                if (data.id_om[i] != conteudo) {
                    $('select[name=om_conteudista]').append('<option value="' + data.id_om[i] + '">' + data.nome_om[i] + '</option>');
                }
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropCursos' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var conteudo = document.getElementById("id_curso").value;
            for (i = 0; i < data.qtd; i++) {
                if (data.id_curso[i] != conteudo) {
                    $('select[name=curso_conteudista]').append('<option value="' + data.id_curso[i] + '">' + data.nome_curso[i] + '</option>');
                }
            }
        }
    });

}

function dropCursos() {
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropCursos' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_curso]').append('<option value="' + data.id_curso[i] + '">' + data.nome_curso[i] + '</option>');
            }
        }
    });
}

function dropAcesso() {
    $.ajax({
        type: 'GET',
        url: '../../../../SGCOTE/app/Model/webservice.php',
        data: {
            acao: 'dropAcesso' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_acesso').append('<option value="' + data.id_acesso[i] + '">' + data.nome_acesso[i] + '</option>');
            }
        }
    });
}

function tableConteudista() {
    $('#tableConteudistas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../../SGCOTE/app/Model/conteudistas/backend_lista.php",
            "type": "POST"
        },

    });
}

$(document).ready(function () {
    dropOm();
    dropCursos();
    dropConteudista();
    dropTutor();
    dropAcesso();

});