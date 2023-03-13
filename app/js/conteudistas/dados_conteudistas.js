function dropOm() {
    $.ajax({
        type: 'GET',
        url: '../app/Model/webservice.php',
        data: {
            acao: 'dropOm' //Envia esse dado como GET para o webservice 
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            for (i = 0; i < data.qtd; i++) {
                $('select[name=id_om').append('<option value="' + data.id_om[i] + '">' + data.nome_om[i] + '</option>');
            }
        }
    });
}

$(document).ready(function () {
    dropOm();
});