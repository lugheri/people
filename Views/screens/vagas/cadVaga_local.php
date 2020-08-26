<p class="h5 text-secondary"><i class="fas fa-briefcase text-info"></i> Cadastro de Vaga</p>
<div class='row'>
    <div class="col">
        <div class="card card-ficha">            
            <div class="card-header">        
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_inclusao/<?= base64_encode($idVaga.':edicao')?>">
                            <i class="fas fa-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_requisitos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Requisitos">
                            <i class="fas fa-tasks"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_local/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Local">
                            <i class="fas fa-map-marker-alt"></i> Local
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_conhecimento/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Conhecimento">
                            <i class="fas fa-brain"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_contratacao/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Contratação">
                            <i class="fas fa-handshake"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_entrevistas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Entrevistas">
                            <i class="fas fa-file-signature"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_encaminhamentos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Encaminhamentos">
                            <i class="fas fa-exchange-alt"></i>
                        </a>
                    </li>
                   <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_email/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_arquivos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Arquivos">
                            <i class="fas fa-paperclip"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Características">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted"><i class="fas fa-map-marker-alt"></i> Local de Trabalho</h6>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="bairro">Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $localVaga['bairro']?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_local','bairro',this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $localVaga['cidade']?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_local','cidade',this.value)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_local','estado',this.value)">
                                <option value=""></option>
                                <option <?php if($localVaga['estado']=='AC'){ echo "selected";}?>  value="AC">Acre (AC)</option>
                                <option <?php if($localVaga['estado']=='AL'){ echo "selected";}?> value="AL">Alagoas (AL)</option>
                                <option <?php if($localVaga['estado']=='AP'){ echo "selected";}?> value="AP">Amapá (AP)</option>
                                <option <?php if($localVaga['estado']=='AM'){ echo "selected";}?> value="AM">Amazonas (AM)</option>
                                <option <?php if($localVaga['estado']=='BA'){ echo "selected";}?> value="BA">Bahia (BA)</option>
                                <option <?php if($localVaga['estado']=='CE'){ echo "selected";}?> value="CE">Ceará (CE)</option>
                                <option <?php if($localVaga['estado']=='DF'){ echo "selected";}?> value="DF">Distrito Federal (DF)</option>
                                <option <?php if($localVaga['estado']=='ES'){ echo "selected";}?> value="ES">Espírito Santo (ES)</option>
                                <option <?php if($localVaga['estado']=='GO'){ echo "selected";}?> value="GO">Goiás (GO)</option>
                                <option <?php if($localVaga['estado']=='MA'){ echo "selected";}?> value="MA">Maranhão (MA)</option>
                                <option <?php if($localVaga['estado']=='MT'){ echo "selected";}?> value="MT">Mato Grosso (MT)</option>
                                <option <?php if($localVaga['estado']=='MS'){ echo "selected";}?> value="MS">Mato Grosso do Sul (MS)</option>
                                <option <?php if($localVaga['estado']=='MG'){ echo "selected";}?> value="MG">Minas Gerais (MG)</option>
                                <option <?php if($localVaga['estado']=='PA'){ echo "selected";}?> value="PA">Pará (PA)</option>
                                <option <?php if($localVaga['estado']=='PB'){ echo "selected";}?> value="PB">Paraíba (PB)</option>
                                <option <?php if($localVaga['estado']=='PR'){ echo "selected";}?> value="PR">Paraná (PR)</option>
                                <option <?php if($localVaga['estado']=='PE'){ echo "selected";}?> value="PE">Pernambuco (PE)</option>
                                <option <?php if($localVaga['estado']=='PI'){ echo "selected";}?> value="PI">Piauí (PI)</option>
                                <option <?php if($localVaga['estado']=='RJ'){ echo "selected";}?> value="RJ">Rio de Janeiro (RJ)</option>
                                <option <?php if($localVaga['estado']=='RN'){ echo "selected";}?> value="RN">Rio Grande do Norte (RN)</option>
                                <option <?php if($localVaga['estado']=='RS'){ echo "selected";}?> value="RS">Rio Grande do Sul (RS)</option>
                                <option <?php if($localVaga['estado']=='RO'){ echo "selected";}?> value="RO">Rondônia (RO)</option>
                                <option <?php if($localVaga['estado']=='RR'){ echo "selected";}?> value="RR">Roraima (RR)</option>
                                <option <?php if($localVaga['estado']=='SC'){ echo "selected";}?> value="SC">Santa Catarina (SC)</option>
                                <option <?php if($localVaga['estado']=='SP'){ echo "selected";}?> value="SP">São Paulo (SP)</option>
                                <option <?php if($localVaga['estado']=='SE'){ echo "selected";}?> value="SE">Sergipe (SE)</option>
                                <option <?php if($localVaga['estado']=='TO'){ echo "selected";}?> value="TO">Tocantins (TO)</option>
                            </select>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col">
                            <label for="horarioDeTrabalho">Horário de Trabalho</label>
                            <textarea name="horarioDeTrabalho" id="horarioDeTrabalho" class="form-control" 
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_local','horarioDeTrabalho',this.value)"><?= $localVaga['horarioDeTrabalho']?></textarea>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_requisitos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_idiomas/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
