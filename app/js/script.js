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
        }
        
    });
}

$(document).ready(function () {
    dropOm();
    dropCursos();
    dropConteudista();
    dropTutor();
    dropAcesso();
    tableConteudista();
    
});