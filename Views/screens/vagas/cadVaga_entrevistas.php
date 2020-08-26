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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_entrevistas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Entrevistas">
                            <i class="fas fa-file-signature"></i> Entrevistas
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
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Características">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted"><i class="fas fa-file-signature"></i> Datas das Entrevistas</h6>
                <div class="container">
                    <form method="post" id="form">
                    <input type="hidden" required name="idVaga" id="idVaga" value="<?= $idVaga?>" class="form-control">
                    <div class="row">
                        <div class="col-3">
                            <label for="data">Data</label>
                            <input type="date" required name="dia" id="dia" class="form-control">
                        </div>  
                        <div class="col-2">
                            <label for="hora">Hora</label>
                            <input type="time" required name="hora" id="hora" class="form-control">
                        </div>    
                        <div class="col-4">
                            <label for="local">Local</label>
                            <input name="local" id="local" class="form-control">
                        </div> 
                        <div class="col-3">
                            <label for="contato">Contato</label>
                            <select name="contato" id="contato" class="form-control">
                                <option value="">Selecione</option>
                                <?php foreach($contatos as $c):?>
                                    <option value="<?= $c['id']?>"><?= $c['nome']?></option>
                                <?php endforeach;?>
                            </select>          
                        </div> 
                    </div>
                    <br/>
                    <div class="row">    
                        <div class="col">
                            <button type="submit" class="btn btn-outline-success btn-block" onClick="addEntrevista()">
                                <i class="fas fa-plus"></i> Incluir
                            </button>
                        </div>
                    </div>
                    </form>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body" id='tblEntrevista'>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-warning">
                                            <tr>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Local</th>
                                                <th>Contato</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(empty($entrevistasVaga)){?>
                                                <tr>
                                                    <td colspan='5'>Nenhuma entrevista agendendada</td>
                                                </tr>
                                            <?php
                                            }else{
                                                foreach($entrevistasVaga as $e):?>
                                                    <tr>
                                                        <td><?= date('d/m/Y', strtotime($e['data']))?></td>
                                                        <td><?= $e['hora']?></td>
                                                        <td><?= $e['local']?></td>
                                                        <td><?= $this->nomeContato($e['contato'])?></td>
                                                        <td style="width:50px">
                                                                <div class="btn btn-light" title="Excluir"
                                                                    onClick="removerEntrevista('<?= $idVaga?>','<?= $e['id']?>')">
                                                                    <i class="fas fa-trash text-danger"></i>
                                                                </div>
                                                            </td>
                                                    </tr>
                                                <?php endforeach;
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <br/>
                <legend class="w-auto">Encaminhamento</legend>  
                <div class="row">
                    <div class="col">
                        <label for="encaminhar">Encaminhar</label>
                        <select name="encaminhar" id="encaminhar" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_encaminhamentos','encaminhar',this.value)">
                            <option <?php if($encaminhamentosVaga['encaminhar']=='curriculo'){ echo "selected";}?> value="curriculo">
                                Currículo
                            </option>
                            <option <?php if($encaminhamentosVaga['encaminhar']=='candidato'){ echo "selected";}?> value="candidato">
                                Candidato (Carta de Encaminhamento)
                            </option>
                        </select>
                    </div>
                
                    <div class="col">
                        <label for="endereco">Endereço de Encaminhamento</label>
                        <select name="endereco" id="endereco" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_encaminhamentos','endereco',this.value)">
                            <option value="">Selecione</option>
                            <?php foreach($enderecos as $e):?>
                                <option <?php if($encaminhamentosVaga['endereco']==$e['id']){echo "selected";}?> value="<?= $e['id']?>">
                                    <?= $e['logradouro'].', '.$e['numero'].' '.$e['bairro'].' - '.$e['cidade'].'-'.$e['estado']?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_contratacao/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_encaminhamentos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
