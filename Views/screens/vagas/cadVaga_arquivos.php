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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_arquivos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Arquivos">
                            <i class="fas fa-paperclip"></i> Arquivos
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
                <div class="row">
                    <div class="col">
                        <h6 class="card-title text-muted"><i class="fas fa-paperclip"></i> Enviar Arquivo</h6>
                    </div>
                    <div class="col text-right">
                        <div class="btn btn-info" onClick="importadorArquivo_vaga('<?= $idVaga ?>')">
                            <i class="fas fa-cloud-upload-alt"></i> Importar Arquivo
                        </div>
                    </div>
                </div>
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body" id='tblArquivos'>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Nome do Arquivo</th>
                                                <th>Tipo</th>
                                                <th colspan="2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(empty($arquivosVaga)){?>
                                                <tr>
                                                    <td colspan='4'>Nenhum arquivo anexado</td>
                                                </tr>
                                                <?php    
                                            }else{
                                                foreach($arquivosVaga AS $a):?>
                                                    <tr>
                                                        <td><?= $a['nome'].' - '.$a['descricao']?></td>
                                                        <td><?= $a['tipo']?></td>
                                                        <td style="width:50px">
                                                            <a class="btn btn-outline-info" href="<?=  BASE_URL.$a['arquivo']?>" target="_blank" title="Abrir/Baixar">
                                                                <i class="fas fa-folder-open"></i>
                                                            </a>
                                                        </td>
                                                        <td style="width:50px">
                                                            <div class="btn btn-light" title="Excluir"
                                                                onClick="removerArquivo('<?= $idVaga?>','<?= $a['id']?>','<?= $a['arquivo']?>')">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                endforeach;
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_encaminhamentos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
