@section('styles')
    @parent
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/letter/modal_edit_template.css"/>
@endsection

<!-- Modal -->
<div class="modal fade" id="modalEditTemplate" tabindex="-1" role="dialog" aria-labelledby="newImageModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Nome</label>
                        <input class="form-control" value="##nome##" readonly/>
                    </div>
                    <div class="col-md-4">
                        <label>Sobrenome</label>
                        <input class="form-control" value="##sobrenome##" readonly/>
                    </div>
                    <div class="col-md-4">
                        <label>Data de Nascimento</label>
                        <input class="form-control" value="##data_nascimento##" readonly/>
                    </div>
                    <div class="col-md-4">
                        <label>Rg</label>
                        <input class="form-control" value="##rg##" readonly/>
                    </div>
                    <div class="col-md-4">
                        <label>Cpf</label>
                        <input class="form-control" value="##cpf##" readonly/>
                    </div>
                    <div class="col-md-4">
                        <label>Cidade com Data</label>
                        <input class="form-control" value="##cidade_data##" readonly/>
                    </div>
                </div>
                <form id="modal_media_form" action="{{ route('admin.album_videos.create_video') }}" method="post">
                    <div class="row">
                        <div id="html" class='textarea-editor'>
                            {!! $member->letterTemplate->html or '' !!}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="btn-save-modal" type="button" class="btn btn-primary" onclick="modalEditTemplateSave(this, {{$letterTemplate->id}})">Salvar</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script src="/admin/cdn/jquery/jquery.validate.min.js"></script>
    <script src="/admin/cdn/mascara_js/mascara.min.js"></script>
    <script src="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/js/dropify.js"></script>

    <script type="text/javascript">
        setTimeout(function () {
            $('.textarea-editor').trumbowyg({
                toolbar: 'toolbar',
            });
        }, 500);

        function modalEditTemplateSave(el, letter_template_id) {
            var html = $(el).closest('.modal-content').find('#html').html();
            let formData = new FormData();
            formData.append('html', html);

            // ajax
            $.ajax({
                type: "post",
                url: '/admin/letter/template/update/' + letter_template_id,
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name    ="csrf-token"]').attr('content')
                },
                success: function (data) {
                    status = (typeof data['status'] !== 'undefined') ? data['status'] : 'error'
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
                                        } else {
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
        }
    </script>
@endsection