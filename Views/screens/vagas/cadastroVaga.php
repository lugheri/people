<p class="h5 text-secondary"><i class="fas fa-briefcase text-info"></i> Cadastro de Vaga</p>
<div class='row'>
    <div class="col">
        <div class="card card-ficha">            
            <div class="card-header">
        
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_inclusao/<?= base64_encode($idVaga.':edicao')?>">
                            <i class="fas fa-plus"></i> Inclusão
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
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Características">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted"><i class="fas fa-plus"></i> Inclusão da Vaga</h6>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="cliente">Cliente</label>
                            <select name="cliente" id="cliente" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','idCliente',this.value),
                                             setaRequisitante(this.value)">
                                <option value="">Selecione uma empresa</option>
                                <?php foreach($listaClientes as $cli):?>
                                    <option <?php if($infoVaga['idCliente']==$cli['id']){ echo "selected";}?> value="<?= $cli['id']?>">
                                        <?= $cli['nome']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $infoVaga['titulo']?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','titulo',this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tituloEmail">Título do Email <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="O título do email pode se informado nesse campo, quando um candidato é encaminhado ao cliente por email."></i></label>
                            <input type="text" name="tituloEmail" id="tituloEmail" class="form-control" value="<?= $infoVaga['tituloEmail']?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','tituloEmail',this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="status">Status <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
                            <select name="status" id="status" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','status',this.value)">
                                <option value=""></option>
                                <?php foreach($listaStatus as $st):?>
                                    <option <?php if($infoVaga['status']==$st['id']){ echo "selected";}?> value="<?= $st['id']?>">
                                        <?= $st['status']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tipoVaga">Tipo Vaga <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
                            <select name="tipoVaga" id="tipoVaga" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','tipoVaga',this.value)">
                                <option value=""></option>
                                <?php foreach($listarTipoVaga as $tv):?>
                                    <option <?php if($infoVaga['tipoVaga']==$tv['id']){ echo "selected";}?> value="<?= $tv['id']?>">
                                        <?= $tv['tipoVaga']?>
                                    </option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="numeroVagas">Número de Vagas</label>
                            <input type="number" name="numeroVagas" id="numeroVagas" step="1" min="1" class="form-control"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','numeroVagas',this.value)"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="funcao">Função <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
                            <select name="funcao" id="funcao" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','funcao',this.value),setaEspecialidade(this.value)">
                                <option value=""></option>                                
                                <?php foreach($listarFuncao as $fnc):?>
                                    <option <?php if($infoVaga['funcao']==$fnc['id']){ echo "selected";}?> value="<?= $fnc['id']?>">
                                        <?= $fnc['funcao']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id='especialidades'>
                            <label for="especialidade">Especialidade <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
                            <select name="especialidade" id="especialidade" class="form-control" disabled
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','especialidade',this.value)">
                                <option value="">Selecione uma função para habilitar as funcionalidades</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="hierarquia">Hierarquia</label>
                            <select name="hierarquia" id="hierarquia" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','hierarquia',this.value)">
                                <option value=""></option>                                
                                <?php foreach($listarHierarquia as $h):?>
                                    <option <?php if($infoVaga['hierarquia']==$h['id']){ echo "selected";}?> value="<?= $h['id']?>">
                                        <?= $h['hierarquia']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id='requisitante'>
                            <label for="requisitante">Requisitante <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
                            <select name="requisitante" id="requisitante" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','requisitante',this.value)">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id='filial'>
                            <label for="filialResponsavel">Filial Responsavel</label>
                            <select name="filialResponsavel" id="filialResponsavel" class="form-control"
                                    onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','filialResponsavel',this.value)">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-10 offset-1" id='tblSelecionadores'>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <small>Selecionadores disponíveis</small>
                                        </div>
                                        <div class="card-body" style="height:250px; overflow:auto">
                                            <?php foreach($listarUsuarios as $u):
                                                if($this->verificaSelecionador($idVaga,$u['id'])==false){?>
                                                    <div class="btn btn-secondary btn-block" 
                                                        onClick="editaSelecionador('<?= $idVaga?>','<?= $u['id']?>','add')"
                                                        title="Clique para Adicionar">
                                                        <?= $u['nome']?>
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
                                            <small>Selecionadores responsáveis</small>
                                        </div>
                                        <div class="card-body" style="height:250px; overflow:auto">
                                            <?php foreach($selecionadores as $s):?>
                                                <div class="btn btn-success btn-block" 
                                                     onClick="editaSelecionador('<?= $idVaga?>','<?= $s['idSelecionador']?>','del')"
                                                     title="Clique para Remover">
                                                     <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i> <?= $s['nome']?>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_requisitos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
