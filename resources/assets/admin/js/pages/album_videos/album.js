$(document).ready(function () {
    (function dropifyInit() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('.dropify-event').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
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
                window.location = '/admin/albums';
            }, 300);
        });
    });

    $('.btn#btnSave').on('click', function (e) {
        e.preventDefault();

        var form = $('#album_form');
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
                                setTimeout(() => {
                                    console.log('REDIRECT: ', redirect);
                                    if (redirect) {
                                        window.location = redirect;
                                    }
                                    else {
                                        window.location.reload(true);
                                    }
                                }, 300);
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

    $('.btn#buttonAdd').on('click', function () {
        $("#newImageModal").modal();
    });

    $('#btn-select-modal').on('click', function() {
        chooseType();
    });

    videoInputEvent($('.video-input'));
    videoInputFormat($('.video-input'), true);
});

$(window).on('load',function() {
    setupMansoryGrid('.album-grid','.album-grid-item');
    $(window).on('resize',function(e) {
        setupMansoryGrid('.album-grid','.album-grid-item');
    });
});

function setupMansoryGrid(grid, item) {
    var _grid = jQuery(grid);

    var _item = jQuery(item);
    var winWidth = _grid.width();

    if (screenMatch(401,800)) {
        width = winWidth/4;
        _item.css('width','calc(98%/4)');
    }
    else if (screenMatch(0,400)) {
        width = winWidth/3;
        _item.css('width','calc(98%/3)');
    }
    else {
        var width = winWidth/4;
        _item.css('width','calc(98%/4)');
    }

    _grid.masonry({
        itemSelector: item,
        columnWidth: width
    }).masonry();
}

function screenMatch(min_width, max_width) {
    var max_width = max_width || 100000;
    var min_width = min_width || 0;
    var max_check = window.matchMedia("(max-width: "+max_width+"px)").matches;
    var min_check = window.matchMedia("(min-width: "+min_width+"px)").matches;

    return max_check && min_check;
}

function deleteMediaItem(el) {
    media_item = $(el).closest('.album-grid-item');
    id = media_item.data('id');
    console.log('id', id);
    media_item.remove();
    html = '<input id="deleted_media" name="deleted_media[]" type="hidden" value="'+id+'">';
    $('#deleted_media_group').append(html);
    $('#new_media_group input[value='+id+']').remove();
    setupMansoryGrid('.album-grid','.album-grid-item');
}

function newMediaItem(id) {
    html = '<input id="new_media" name="new_media[]" type="hidden" value="'+id+'">';
    $('#new_media_group').append(html);
    $('#deleted_media_group input[value='+id+']').remove();
}

function removeNoMedia() {
    $('.no-media').remove();
}

