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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_conhecimento/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Conhecimento">
                            <i class="fas fa-brain"></i> Conhecimento
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
                <h6 class="card-title text-muted"><i class="fas fa-language"></i> Idiomas</h6>
                <div class="container">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Informática</legend>  
                        <div class="row">
                            <div class="col-6">
                                <label for="areaInformatica">Área de Conhecimento</label>
                                <select name="areaInformatica" id="areaInformatica" class="form-control">
                                    <option value=""></option>
                                    <?php foreach($listaAreasInformatica as $ai):?>
                                        <option value="<?= $ai['id']?>"><?= $ai['area']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>   
                            <div class="col-4">
                                <label for="nivelInformatica">Nível</label>
                                <select name="nivelInformatica" id="nivelInformatica" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="basico">Básico</option>
                                    <option value="intermediario">Intermediário</option>
                                    <option value="avancado">Avançado</option>
                                </select>
                            </div> 
                            <div class="col">
                                <br/>
                                <div class="btn btn-outline-success btn-block" onClick="adicionarAreaInformatica('<?= $idVaga?>')">
                                    <i class="fas fa-plus"></i> Incluir
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id='tblAreasInformatica'>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Área de Conhecimento</th>
                                                    <th>Nível</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(empty($areasInformatica)){?>
                                                    <tr>
                                                        <td colspan='3'>Nenhuma área requerida</td>
                                                    </tr>
                                                    <?php
                                                }else{
                                                    foreach($areasInformatica as $area):?>
                                                        <tr>
                                                            <td><?= $area['area']?></td>
                                                            <td><?= $area['nivel']?></td>
                                                            <td style="width:50px">
                                                                <div class="btn btn-light" title="Excluir"
                                                                     onClick="removerAreaInformatica('<?= $idVaga?>','<?= $area['id']?>')">
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
                    </fieldset>  

                    <fieldset class="border p-2">
                        <legend class="w-auto"> Idiomas</legend>
                        <div class="row">
                            <div class="col-6">
                                <label for="idioma">Idioma</label>
                                <select name="idioma" id="idioma" class="form-control">
                                    <option value=""></option>
                                    <?php foreach($listaIdioma as $li):?>
                                        <option value="<?= $li['id']?>"><?= $li['idioma']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>   
                            <div class="col-4">
                                <label for="nivel">Nível</label>
                                <select name="nivel" id="nivel" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="avancado">Avançado</option>
                                    <option value="basico">Básico</option>
                                    <option value="fluente">Fluente</option>
                                    <option value="intermediario">Intermediário</option>
                                    <option value="tecnico">Técnico</option>
                                </select>
                            </div> 
                            <div class="col">
                                <br/>
                                <div class="btn btn-outline-success btn-block" onClick="addIdiomas('<?= $idVaga?>')">
                                    <i class="fas fa-plus"></i> Incluir
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id='tblIdiomas'>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Idioma</th>
                                                    <th>Nível</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(empty($idiomaVaga)){?>
                                                    <tr>
                                                        <td colspan='3'>Nenhum idioma selecionado</td>
                                                    </tr>
                                                    <?php
                                                }else{
                                                    foreach($idiomaVaga as $idm):?>
                                                        <tr>
                                                            <td><?= $idm['idioma']?></td>
                                                            <td><?= $idm['nivel']?></td>
                                                            <td style="width:50px">
                                                                <div class="btn btn-light" title="Excluir"
                                                                    onClick="removerIdiomas('<?= $idVaga?>','<?= $idm['id']?>')">
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
                    </fieldset> 
                    
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_local/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_contratacao/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
