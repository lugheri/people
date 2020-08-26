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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_requisitos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Requisitos">
                            <i class="fas fa-tasks"></i> Requisitos
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
                <h6 class="card-title text-muted"><i class="fas fa-tasks"></i> Requisitos Profissionais</h6>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="escolaridade">Escolaridade</label>
                            <select name="escolaridade" id="escolaridade" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','escolaridade',this.value)">
                                <option value=""></option>
                                <?php foreach($listaEscolaridade as $esc):?>
                                    <option <?php if($requisitosVaga['escolaridade']==$esc['id']){ echo "selected";}?> value="<?= $esc['id']?>">
                                        <?= $esc['escolaridade']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="curso">Curso</label>
                            <input type="text" name="curso" id="curso" class="form-control" value="<?= $requisitosVaga['curso']?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','curso',this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="requisitosProfissionais">Requisitos Profissionais</label>
                            <textarea name="requisitosProfissionais" style="min-height:300px" id="requisitosProfissionais" class="form-control" 
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','requisitosProfissionais',this.value)"><?= $requisitosVaga['requisitosProfissionais']?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="idade_De">Idade De:</label>
                            <input type="text" name="idade_De" id="idade_De" class="form-control" value="<?= $requisitosVaga['idade_De']?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','idade_De',this.value)">
                        </div>
                        <div class="col-2">
                            <label for="idade_Ate">Até:</label>
                            <input type="text" name="idade_Ate" id="idade_Ate" class="form-control" value="<?= $requisitosVaga['idade_Ate']?>"
                                   onInput="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','idade_Ate',this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_requisitos','sexo',this.value)">
                                <option value=""></option>
                                <?php foreach($listaSexo as $sex):?>
                                    <option <?php if($requisitosVaga['sexo']==$sex['id']){ echo "selected";}?> value="<?= $sex['id']?>">
                                        <?= $sex['sexo']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>   
                    <br/>  
                                
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_inclusao/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_local/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
