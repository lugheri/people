<div class="row">
    <div class="col">
        <div class="btn btn-sm btn-outline-secondary" onClick="buscarVagaCandidato('<?= $idVaga?>',1)">
            <i class="fas fa-users"></i> Buscar Candidatos 
        </div>
        <div class="btn btn-sm btn-outline-secondary" onClick="fonteVaga('<?= $idVaga?>')">
            <i class="fas fa-link"></i> Fontes de pesquisa
        </div>
        <a href="<?= LINK?>vagas/cadVaga_inclusao/<?= base64_encode($idVaga.':editar')?>" target="blank" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-edit"></i> Alterar Vaga
        </a>
        <div class="btn btn-sm btn-outline-secondary" onClick="clonarVaga('<?= $idVaga?>')">
            <i class="fas fa-clone"></i> Clonar
        </div>
        <div class="btn btn-sm btn-outline-secondary" onClick="dadosCliente('<?= $infoVaga['idCliente']?>')">
            <i class="fas fa-id-card"></i> Dados do Cliente
        </div>
        <a class="btn btn-sm btn-outline-secondary" target="blank" href="#">
            <i class="fas fa-print"></i> Imprimir
        </a>
    </div>
</div>
<fieldset class="border p-2">
    <legend class="w-auto">Dados da Vaga</legend>  
    <div class="row">
        <div class="col">
            <label>Status</label>
            <input type="text" disabled value="<?= $this->nomeStatus($infoVaga['status'])?>" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Tipo de Vaga</label>
            <input type="text" disabled value="<?= $this->nomeTipoVaga($infoVaga['tipoVaga'])?>" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Vaga</label>
            <input type="text" disabled value="<?= $infoVaga['id'].' '.$infoVaga['titulo']?>" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Data de Cadastro</label>
            <input type="text" disabled value="<?= date('d/m/Y', strtotime($infoVaga['dataCadastro']))?>" class="form-control form-control-sm"/>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Cliente</label>
            <input type="text" disabled value="<?= $this->nomeCliente($infoVaga['idCliente'])?>" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Requisitante da Vaga</label>
            <input type="text" disabled value="" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Filial</label>
            <input type="text" disabled value="" class="form-control form-control-sm"/>
        </div>        
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <label>Nº de vagas</label>
                    <input type="text" disabled value="<?= $infoVaga['numeroVagas']?>" class="form-control form-control-sm"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Função</label>
                    <input type="text" disabled value="<?= $this->nomeFuncao($infoVaga['funcao'])?>" class="form-control form-control-sm"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Hierarquia</label>
                    <input type="text" disabled value="<?= $this->nomeHierarquia($infoVaga['hierarquia'])?>" class="form-control form-control-sm"/>
                    </div>
                </div>
            </div>
        <div class="col">
            <label>Selecionadores</label>
            <div class="card">
                <div class="card-body text-center" style="max-height:200px">
                    <?php 
                    if(empty($selecionadores)){?>
                        <p class="h5 text-muted"><i class="fas fa-user-alt-slash"></i></p>
                        <small class="text-muted">Nenhum selecionador foi designado para esta vaga</small>
                        <?php 
                    }else{
                        foreach($selecionadores as $s):?>
                            <div class="btn btn-block btn-info">
                                <i class="fas fa-clipboard-check"></i> <?= $s['nome']?>
                            </div>
                            <?php
                        endforeach;
                    }?>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto">Requisitos Profissionais</legend>  
    <div class="row">
        <div class="col">
            <label>Escolaridade</label>
            <input type="text" disabled value="<?= $this->nomeEscolaridade($requisitosVaga['escolaridade'])?>" class="form-control form-control-sm"/>
        </div>
        <div class="col-2">
            <label>PcD</label>
            <input type="text" disabled value="<?php if(empty($requisitosVaga['pcd'])){ echo "Não";}else{ echo "Sim";} ?>" class="form-control form-control-sm"/>
        </div>
        <div class="col-4">
            <label>Sexo</label>
            <input type="text" disabled value="<?= $this->nomeSexo($requisitosVaga['sexo'])?>" class="form-control form-control-sm"/>
        </div>
    </div>
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto">Local de Trabalho</legend>  
    <div class="row">
        <div class="col-4">
            <label>Cidade</label>
            <input type="text" disabled value="<?= $localVaga['cidade']?>" class="form-control form-control-sm"/>
        </div>
        <div class="col-2">
            <label>Estado</label>
            <input type="text" disabled value="<?= $localVaga['estado']?>" class="form-control form-control-sm"/>
        </div>       
    </div>
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto">Salário Contratação</legend>  
    <div class="row">
        <div class="col-2">
            <label>Omitir Forma</label>
            <input type="text" disabled value="<?php if(empty($requisitosVaga['omitirFormaContSite'])){ echo "Não";}else{ echo "Sim";}?>" class="form-control form-control-sm"/>
        </div>
        <div class="col-2">
            <label>Omitir Salário</label>
            <input type="text" disabled value="<?php if(empty($requisitosVaga['omitirSalarioSite'])){ echo "Não";}else{ echo "Sim";}?>" class="form-control form-control-sm"/>
        </div>     
        <div class="col">
            <label>Tempo de Contrato</label>
            <input type="text" disabled value="<?= $contratacaoVaga['tempoContrato']?> Dias" class="form-control form-control-sm"/>
        </div>  
        <div class="col">
            <label>Formas de Contratação</label>
            <input type="text" disabled value="<?= $this->nomeCliente($contratacaoVaga['formaContratacao'])?>" class="form-control form-control-sm"/>
        </div>         
    </div>
    <div class="row">
        <div class="col">
            <label>Taxas</label>        
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th>Contratação</th>
                        <th>Taxa</th>
                        <th>Encargo</th>
                        <th>Tributo</th>
                        <th>Prazo</th>
                    </tr>
                </tHead>
                <tBody>
                    <tr>
                        <td colspan="5">Nenhuma taxa cadastrada</td>
                    </tr>
                </tBody>
            </table>  
        </div> 
    </div>
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto">Datas das Entrevistas</legend>
    <div class="row">
        <div class="col-4">
            <label>Encaminhar</label>
            <input type="text" disabled value="<?= $encaminhamentosVaga['encaminhar']?>" class="form-control form-control-sm"/>
        </div>
        <div class="col">
            <label>Endereço Encaminhamento</label>
            <input type="text" disabled value="<?= $encaminhamentosVaga['endereco']?>" class="form-control form-control-sm"/>
        </div>         
    </div>
    <div class="row">
        <div class="col">
            <label>Taxas</label>        
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Local</th>
                        <th>Contato</th>
                    </tr>
                </tHead>
                <tBody>
                    <tr>
                        <td colspan="4">Nenhuma entrevista cadastrada</td>
                    </tr>
                </tBody>
            </table>  
        </div> 
    </div>  
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto">Características das vaga</legend>  
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <label>Confidencial</label>
                    <input type="text" disabled value="<?php if(empty($caracteristicasVaga['confidencial'])){ echo "Não";}else{ echo "Sim";}?>" class="form-control form-control-sm"/>
                </div>
                <div class="col">
                    <label>Urgente</label>
                    <input type="text" disabled value="<?php if(empty($caracteristicasVaga['urgente'])){ echo "Não";}else{ echo "Sim";}?>" class="form-control form-control-sm"/>
                </div>
            </div>    
            <div class="row">        
                <div class="col">
                    <label>Funcionário</label>
                    <input type="text" disabled value="" class="form-control form-control-sm"/>
                </div>
                <div class="col">
                    <label>Data de Exibição</label>
                    <input type="text" disabled value="<?= date('d/m/Y', strtotime($caracteristicasVaga['dataExibicao']))?>" class="form-control form-control-sm"/>
                </div>
            </div>
        </div>
        <div class="col">
            <label>Usuários que visualizam a vaga</label>
            <div class="card">
                <div class="card-body text-center" style="max-height:200px">
                    <?php 
                    if(empty($usuariosHabilitados)){?>
                        <p class="h5 text-muted"><i class="fas fa-user-alt-slash"></i></p>
                        <small class="text-muted">Nenhum usuario foi designado para esta vaga</small>
                        <?php 
                    }else{
                        foreach($usuariosHabilitados as $s):?>
                            <div class="btn btn-block btn-info">
                                <i class="fas fa-clipboard-check"></i> <?= $s['nome']?>
                            </div>
                            <?php
                        endforeach;
                    }?>
                </div>
            </div>
        </div>
    </div>
</fieldset>

