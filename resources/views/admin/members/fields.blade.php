<div class="row">
    <div class="col-md-8 center">
        <div class="card pessoa">
            <div class="card-header">
                <div class="row section">
                    <h2 class="section-title col s12 m6">Sobre o Membro</h2>
                    @if(isset($member))
                        <div class="btn-group col s12 m6">
                            <div class="btn-box">
                                <a id="buttonMemberLicense" class="btn btn-success" href="{{ route('admin.license', $member->id) }}">
                                    Carteira de membro
                                </a>
                            </div>
                            <div class="btn-box">
                                <a id="buttonMemberLetter" class="btn btn-warning" href="{{ route('admin.letter', $member->id) }}">
                                    Carta de Recomendação
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <div class="group center">
                    <div class="form-group has-label">
                        <label>Imagem de Perfil</label>
                        <input type="file" id="input-file-max-fs" class="dropify" name="profile_image" data-max-file-size="10M" data-default-file="{{ isset($member->media) ? url($member->media->url) : '' }}"/>
                        <label>Maximum file upload size 10MB</label>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Nome
                        </label>
                        <input class="form-control" value="{{ $member->name ?? '' }}" name="name" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Sobrenome
                        </label>
                        <input class="form-control" value="{{ $member->lastname ?? '' }}" name="lastname" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Profissão
                        </label>
                        <input class="form-control" value="{{ $member->jobtitle ?? '' }}" name="jobtitle" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label select-wrapper">
                        <label>
                            Estado civil
                        </label>
                        <select id="civil-status-select" name="civil_status" class="selectpicker center" name="client_id" data-size="7" data-live-search="true" data-style="btn btn-primary btn-round" title="Selecionar">
                            <option value="">-</option>
                            <option value="1" {{ (isset($member) && $member->civil_status == 1) ? 'selected' : ''}}>
                                Solteiro(a)
                            </option>
                            <option value="2" {{ (isset($member) && $member->civil_status == 2) ? 'selected' : ''}}>
                                Casado(a)
                            </option>
                        </select>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            RG
                        </label>
                        <input class="form-control" value="{{ $member->rg ?? '' }}" name="rg" type="text" required="true" minlength="9" onkeyup="mascara('#######-#',this,event)"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            CPF
                        </label>
                        <input class="form-control" value="{{ $member->cpf ?? '' }}" name="cpf" type="text" required="true" minlength="14" onkeyup="mascara('###.###.###-##',this,event)"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Data de nascimento
                        </label>
                        <input class="form-control" value="{{ $member->birth_date ?? '' }}" name="birth_date" type="text" required="true" minlength="10" onkeyup="mascara('##/##/####',this,event)"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Nome do Pai
                        </label>
                        <input class="form-control" value="{{ $member->father_name ?? '' }}" name="father_name" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Nome da Mãe
                        </label>
                        <input class="form-control" value="{{ $member->mother_name ?? '' }}" name="mother_name" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Naturalidade
                        </label>
                        <input class="form-control" value="{{ $member->birth_city ?? '' }}" name="birth_city" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Nacionalidade
                        </label>
                        <input class="form-control" value="{{ $member->nationality ?? '' }}" name="nationality" type="text" required="true" minlength="2"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 center">
        <div class="card pessoa">
            <div class="card-header">
                <h4 class="card-title">Informações Institucionais</h4>
            </div>
            <div class="card-body">
                <div class="group center">
                    <div class="form-group has-label">
                        <label>
                            Função Ministerial
                        </label>
                        <input class="form-control" value="{{ $member->ministerial_function ?? '' }}" name="ministerial_function" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Data de batismo
                        </label>
                        <input class="form-control" value="{{ $member->baptism_date ?? '' }}" name="baptism_date" type="text" required="true" minlength="2" onkeyup="mascara('##/##/####',this,event)"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 center">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Endereço Residencial</h4>
            </div>
            <div class="card-body ">
                <div id="group-location" class="group center">
                    <div class="form-group has-label">
                        <label>
                            CEP
                        </label>
                        <input id="input_cep" value="{{ $member->address->cep ?? '' }}" class="form-control" name="cep" type="text" required="true" onkeyup="mascara('#####-###',this,event)" minlength="9" maxlength="9"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Rua
                        </label>
                        <input id="input_rua" value="{{ $member->address->street ?? '' }}" class="form-control" name="street" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Número
                        </label>
                        <input class="form-control" value="{{ $member->address->number ?? '' }}" name="number" type="text" required="true" minlength="1"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Bairro
                        </label>
                        <input id="input_bairro" value="{{ $member->address->district ?? '' }}" class="form-control" name="district" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            País
                        </label>
                        <input id="input_pais" value="{{ $member->address->country ?? '' }}" class="form-control" name="country" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Estado
                        </label>
                        <input id="input_estado" value="{{ $member->address->state ?? '' }}" class="form-control" name="state" type="text" required="true" minlength="2"/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Cidade
                        </label>
                        <input id="input_cidade" value="{{ $member->address->city ?? '' }}" class="form-control" name="city" type="text" required="true" minlength="2"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 center">
        <div class="card contact">
            <div class="card-header">
                <h4 class="card-title">Contatos</h4>
            </div>
            <div class="card-body">
                <div id="group_contacts" class="group center">
                    <div class="form-group has-label">
                        <label>
                            Celular
                        </label>
                        <input class="form-control" value="{{ $member->contact->cellphone ?? '' }}" name="cellphone" type="text" required="true" onkeyup="mascara('(##) #####-####',this,event)"  minlength='15' maxlength='15'/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            Telefone (Fixo)
                        </label>
                        <input class="form-control" value="{{ $member->contact->phone ?? '' }}" name="phone" type="text" required="true" onkeyup="mascara('(##) ####-####',this,event)"  minlength='14' maxlength='14'/>
                    </div>
                    <div class="form-group has-label">
                        <label>
                            E-mail
                        </label>
                        <input class="form-control" value="{{ $member->contact->email ?? '' }}" name="email" type="email" required="true"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-8 center">
        <div class="row">
            <div class="col-md-6">
                <button id="btn-cancel" class="btn btn-primary btn-round btn-danger">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                    Cancelar
                </button>
            </div>
            <div class="col-md-6">
                <button id="btn-save" class="btn btn-primary btn-round btn-save">
                    <i class="now-ui-icons ui-1_check"></i>
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>