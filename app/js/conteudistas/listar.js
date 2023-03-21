
$(document).ready(function () {
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../app/Model/conteudistas/backend_lista.php",
            "type": "POST"
        }
    });
});
