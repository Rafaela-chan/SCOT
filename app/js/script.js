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
   var id_om = 0;
   console.log(id_om);
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
            var a = document.getElementsByClassName("id_om");
            var b = document.getElementsByClassName("curso_conteudista");
            var x = document.getElementsByClassName("nome_conteudista");
            var y = document.getElementsByClassName("cpf_conteudista");
            var z = document.getElementsByClassName("id_conteudista");
            var i;
            for (i = 0; i < x.length; i++) {
            x[i].value = data.nome_completo[0];
            }
            for (i = 0; i < y.length; i++) {
                y[i].value = data.cpf[0];
            }
            for (i = 0; i < z.length; i++) {
                z[i].value = data.id_conteudista[0];
            }
            for (i = 0; i < a.length; i++) {
                a[i].value = data.id_om[0];
                $('option[name=nome_om]').empty();
                $('option[name=nome_om]').append(data.nome_om[0]);
            }
            for (i = 0; i < b.length; i++) {
                b[i].value = data.nome_curso[0];
                $('option[name=nome_curso]').empty();
                $('option[name=nome_curso]').append(data.nome_curso[0]);
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
            for (i = 0; i < data.qtd; i++) {
                $('select[name=om_conteudista]').append('<option value="' + data.id_om[i] + '">' + data.nome_om[i] + '</option>');
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