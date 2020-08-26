<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="h5 text-secondary"><i class="fas fa-user-edit text-info" aria-hidden="true"></i> Edição de Cliente</p>
        </div>
    </div>

    <div class="card card-ficha">            
        <div class="card-header">        
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Principal">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_enderecos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Endereços">
                        <i class="fas fa-map-marked-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_contatos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Contatos">
                        <i class="fas fa-address-book"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente_arquivos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Arquivos">
                        <i class="fas fa-paperclip"></i> Arquivos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_faturamento/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Faturamento">
                        <i class="fas fa-cash-register"></i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_taxas/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Taxas">
                        <i class="fas fa-hand-holding-usd"></i>
                    </a>
                </li>
            </ul>    
        </div>
        <div class="card-body">
       
            <fieldset class="border p-2">
                <legend class="w-auto">Arquivos</legend>
                <form id="formArquivo" method="POST" enctype="multipart/form-data">
                    <input type='hidden' name='idCliente' id='idCliente' value="<?=$idCliente?>" required class='form-control'/>
                    <div class="row">
                        <div class="col">
                            <label for="arquivo">Arquivo</label>
                            <input type='file' name='arquivo' id='arquivo' required class='form-control'/>
                        </div>
                        <div class="col">
                            <label for="nome">Nome</label>
                            <input type='text' name='nome' id='nome' required class='form-control'/>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-info btn-block" style="margin-top:30px" onClick="enviaArquivoCliente()">
                                <i class="fas fa-upload"></i> Enviar
                            </button>
                        </div>
                    </div>
                </form>
                <br/>
                <div class="card">
                    <div class="card-body" id='arquivos'>
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <tHead class="thead-warning">
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </tHead>
                            <tBody>
                                <?php 
                                if(empty($arquivos)){?>
                                    <tr>
                                        <td colspan="5">Nenhum arquivo importado</td>
                                    </tr>
                                    <?php
                                }else{
                                    foreach($arquivos as $a):?>
                                        <tr>
                                            <td><?=$a['nome']?></td>
                                            <td><?=$a['tipo']?></td>
                                            <td style="width:50px">
                                                <div class="btn btn-sm btn-light" title="Remover Arquivo" onClick="delArquivo('<?= $idCliente?>','<?= $a['id']?>')">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                }?>
                            </tBody>
                        </table>
                    </div>
                </div>        
            </fieldset>
            <br/>
        </div>
        <div class="card-footer text-right bg-white">
            <a href="<?= LINK.'clientes/editarCliente_contatos/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                <i class="fas fa-backward"></i> Anterior 
            </a>
            <a href="<?= LINK.'clientes/editarCliente_faturamento/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                Próximo <i class="fas fa-forward"></i>
            </a>
        </div>
    </div>
</div>