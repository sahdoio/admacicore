function exportPDF(button) {
    var url = $(button).data('href');

    $.ajax({
        type: "get",
        contentType: "application/json; charset=utf-8",
        url: url,
        success: function (data) {
            status = (typeof data['status'] !== 'undefined') ? data['status'] : 'error';
            message = (typeof data['message'] !== 'undefined') ? data['message'] : 'Erro ao executar ação. Contactar suporte';
            redirect = (typeof data['redirect'] !== 'undefined') ? data['redirect'] : false;

            switch (status) {
                case 'ok':
                    var stream = data.stream;
                    var dataURI = data.path;
                    let pdfWindow = window.open(dataURI);
                    break;
                case 'warning':
                    swal("Oops...", message, "warning");
                    break;
                case 'error':
                    swal("Oops...", message, "error");
                    break;
                default:
                    swal("Oops...", 'Sem resposta do servidor. Entre em contato com o suporte', "warning");
                    break;
            }
        },
        error: function (jqXHR, text, error) {
            swal("Oops...", '[' + error + ']: ' + 'Entre em contato com o suporte', "error");
        }
    });

    return true;
}