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
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_local/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Local">
                            <i class="fas fa-map-marker-alt"></i>
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
                    <!--<li class="nav-item">
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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Características">
                            <i class="fas fa-info-circle"></i> Características
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted"><i class="fas fa-info-circle"></i> Características da Vaga</h6>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="vaga">Vaga:</label>
                            <select name="vaga" id="vaga" class="form-control" 
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','vaga',this.value)">
                                <option <?php if($caracteristicasVaga['vaga']=="acrescimo"){ echo "selected";}?> value="acrescimo">
                                    Acréscimo
                                </option>
                                <option <?php if($caracteristicasVaga['vaga']=="substituicao"){ echo "selected";}?> value="substituicao">
                                    Substituição
                                </option>                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="exibirSite">Exibir no Site:</label>
                            <select name="exibirSite" id="exibirSite" class="form-control" 
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','exibirSite',this.value)">
                                <option <?php if($caracteristicasVaga['exibirSite']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($caracteristicasVaga['exibirSite']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="candidatarSite">Candidatar-se pelo Site:</label>
                            <select name="candidatarSite" id="candidatarSite" class="form-control" 
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','candidatarSite',this.value)">
                                <option <?php if($caracteristicasVaga['candidatarSite']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($caracteristicasVaga['candidatarSite']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="confidencial">Confidencial:</label>
                            <select name="confidencial" id="confidencial" class="form-control" 
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','confidencial',this.value),
                                              setaPermissoesConfidencial('<?= $idVaga?>')">
                                              <option value="0">Selecione</option>
                                <option <?php if($caracteristicasVaga['confidencial']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($caracteristicasVaga['confidencial']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    <div id='usuarios_confidencial'>
                        <?php
                        require_once 'usuarios_confidencial.php';?>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="urgente">Urgente:</label>
                            <select name="urgente" id="urgente" class="form-control" 
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','urgente',this.value)">
                                <option <?php if($caracteristicasVaga['urgente']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($caracteristicasVaga['urgente']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="dataExibicao">Data de Exibição <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="" aria-hidden="true" data-original-title="Data que o sistema começará a exibir a vaga no site para o candidato."></i></label>
                            <input type="date" name="dataExibicao" id="dataExibicao" class="form-control"  value="<?=$caracteristicasVaga['dataExibicao'];?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','dataExibicao',this.value)"/>
                        </div>
                     
                        <div class="col">
                            <label for="dataExpiracao">Data de Expiração <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="" aria-hidden="true" data-original-title="Data que o sistema deixará de exibir a vaga no site para o candidato."></i></label>
                            <input type="date" name="dataExpiracao" id="dataExpiracao" class="form-control"  value="<?=$caracteristicasVaga['dataExpiracao'];?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','dataExpiracao',this.value)"/>
                        </div>
                     
                        <div class="col">
                            <label for="prazoAtendimento">Prazo de Atendimento</label>
                            <input type="date" name="prazoAtendimento" id="prazoAtendimento" class="form-control"  value="<?=$caracteristicasVaga['dataExpiracao'];?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_caracteristica','prazoAtendimento',this.value)"/>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-10 offset-1" id='tblEtapas'>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <small>Etapas do processo seletivo disponíveis</small>
                                        </div>
                                        <div class="card-body" style="height:250px; overflow:auto">
                                            <?php foreach($listarEtapas as $e):
                                                if($this->verificaEtapa($idVaga,$e['id'])==false){?>
                                                    <div class="btn btn-secondary btn-block" 
                                                        onClick="editaEtapas('<?= $idVaga?>','<?= $e['id']?>','add')"
                                                        title="Clique para Adicionar">
                                                        <?= $e['nome']?>
                                                        <i class="fas fa-arrow-alt-circle-right" style="float:right;margin-top:5px"></i>
                                                    </div>
                                                    <?php
                                                } 
                                            endforeach;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <small>Etapas do processo seletivo Atribuidas</small>
                                        </div>
                                        <div class="card-body" style="height:250px; overflow:auto">
                                            <?php foreach($etapasSelecionadas as $s):?>
                                                <div class="btn btn-success btn-block" 
                                                     onClick="editaEtapas('<?= $idVaga?>','<?= $s['idEtapa']?>','del')"
                                                     title="Clique para Remover">
                                                     <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i> <?= $s['nome']?>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <small class="text-info"><i class="fas fa-info-circle"></i> As etapas adicionais servem para consulta do selecionador, e mais etapas podem ser adicionadas no módulo de configurações/vagas/etapas do processo seletivo.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_arquivos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <div class="btn btn-outline-success" onClick="concluirVaga('<?= $idVaga ?>','confirmacao')">
                    <i class="fas fa-save"></i> Gravar
                </div>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
