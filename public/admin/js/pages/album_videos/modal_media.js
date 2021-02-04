$(document).ready(function () {
    (function dropifyInit() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('.dropify-event').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
    })();

    $('.btn#btnCancel').on('click', function (e) {
        e.preventDefault();
        swal({
            title: 'Tem certeza?',
            text: "Suas modificações não serão salvas",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Sim, continuar',
            cancelButtonText: 'Não',
            buttonsStyling: false
        }).then(function () {
            setTimeout(() => {
                window.location = '/admin/dashboard';
            }, 300);
        });
    });

    $('.btn#btn-save-modal').on('click', function (e) {
        e.preventDefault();

        var form = $('#modal_media_form');
        var action = form.attr('action');
        var formData = new FormData(form[0]);

        // ajax
        $.ajax({
            type: "post",
            url: action,
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                status = (typeof data['status'] !== 'undefined') ? data['status'] : 'error';
                message = (typeof data['message'] !== 'undefined') ? data['message'] : 'Erro ao executar ação. Contactar suporte';
                redirect = (typeof data['redirect'] !== 'undefined') ? data['redirect'] : false;

                switch (status) {
                    case 'ok':
                        swal({
                            title: "Feito!",
                            text: "Ação executada com sucesso",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-success",
                            type: "success"
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                addMediaToBox(data.item_obj.id, data.item_html);
                            }
                        });
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
            },
            contentType: false,
            processData: false
        });

        return true;
    });

    videoInputEvent($('.video-input'));
    videoInputFormat($('.video-input'), true);
});

function addMediaToBox(id, item_html) {
    newMediaItem(id);
    $items = $(item_html);
    $('.album-grid').append($items).masonry('appended', $items);
    removeNoMedia();
    $('#newVideoModal .video-input').val('');
    $('#newVideoModal .video-box').html('');
    $("#newVideoModal").modal('hide');

    setTimeout(function () {
        setupMansoryGrid('.album-grid', '.album-grid-item');
    }, 300)
}


function videoInputEvent(input) {
    $(input).on('keyup', function () {
        videoInputFormat(input);
    });
}

function videoInputFormat(input, first) {
    var first = (typeof first !== 'undefined') ? first : false;
    var videobox = $(input).closest('.modal-body').find('.video-box');
    var old_value = $(input).attr('old-value');
    var value = $(input).val();
    $(input).attr('old-value', value);

    if (value !== old_value || first) {
        var html = '';
        var code = getVideoCode(value);
        if (value.indexOf('vimeo.com') > 0) {
            html = `
                <iframe
                        src="https://player.vimeo.com/video/${code}"
                        width="640"
                        height="360"
                        frameborder="0"
                        allow="autoplay; fullscreen"
                        allowfullscreen>
                </iframe>
            `;
        } else if (value.indexOf('youtu') > 0) {
            html = `
                <iframe
                        width="560"
                        height="315"
                        src="https://www.youtube.com/embed/${code}"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            `;
        } else {
            html = '<p style="color: #f00; display: block;"><strong>* Digite um link válido</strong></p>';
        }

        videobox.html(html);
    }
}

function getVideoCode(link) {
    if (link.indexOf('vimeo.com') > 0) {
        var code = link.substring(link.lastIndexOf('/') + 1);
    } else if (link.indexOf('youtu') > 0) {
        var code = link.substring(link.lastIndexOf('/') + 1);
        code = code.replace('watch?v=','');
    } else {
        return null;
    }

    return code;
}




