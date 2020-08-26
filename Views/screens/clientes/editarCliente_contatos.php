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
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente_contatos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Contatos">
                        <i class="fas fa-address-book"></i> Contatos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_arquivos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Arquivos">
                        <i class="fas fa-paperclip"></i>
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
        <div class="card-body" id='editaEndereco'>
       
            <fieldset class="border p-2">
                <legend class="w-auto">Contatos</legend>
                
                <div class="btn btn-outline-info btn-block" onClick="novoContato('<?= $idCliente?>')">
                            <i class="fas fa-user-plus"></i> Adicionar Contato
                        </div><br/>
                <div class="card">
                    <div class="card-body" id='contatos'>
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <tHead class="thead-warning">
                                <tr>
                                    <th>Nome</th>
                                    <th>Aniversário</th>
                                    <th>E-mail</th>
                                    <th>Função</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </tHead>
                            <tBody>
                                <?php 
                                if(empty($contatosCliente)){?>
                                    <tr>
                                        <td colspan="5">Nenhum contato cadastrado</td>
                                    </tr>
                                    <?php
                                }else{
                                    foreach($contatosCliente as $c):?>
                                        <tr onClick="editaContato('<?= $idCliente?>','<?= $c['id']?>')">
                                            <td><?=$c['nome']?></td>
                                            <td><?=date('d/m', strtotime($c['nasc']))?></td>
                                            <td><?=$c['email']?></td>
                                            <td><?= $this->nomeFuncao($c['funcao'])?></td>
                                            <td style="width:50px">
                                                <div class="btn btn-sm btn-light" title="Remover Contato" onClick="delContato('<?= $idCliente?>','<?= $c['id']?>')">
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
            <a href="<?= LINK.'clientes/editarCliente_enderecos/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                <i class="fas fa-backward"></i> Anterior 
            </a>
            <a href="<?= LINK.'clientes/editarCliente_arquivos/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                Próximo <i class="fas fa-forward"></i>
            </a>
        </div>
    </div>
</div>