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
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente_taxas/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Taxas">
                        <i class="fas fa-hand-holding-usd"></i> Taxas
                    </a>
                </li>
            </ul>    
        </div>
        <div class="card-body">
            <div class="row" id='taxas'>
                <div class="col">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Taxas</legend>
                        <div class="btn btn-outline-info btn-sm btn-block" onClick="incluirTaxa('taxa','<?= $idCliente?>')">
                            <i class="fas fa-plus-circle"></i> Incluir Taxa
                        </div>
                        <br/>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <tHead class="thead-warning">
                                <tr>
                                    <th><small>Contratação</small></th>
                                    <th><small>Taxa</small></th>
                                    <th><small>Encargo</small></th>
                                    <th><small>Tributo</small></th>
                                    <th><small>Prazo</small></th>
                                    <th style="width:50px"></th>
                                </tr>
                            </tHead>
                            <tBody>
                                <?php if(empty($taxas)){?>
                                    <tr>
                                        <td colspan="6">Nenhuma taxa cadastrada</td>
                                    </tr>
                                    <?php
                                }else{
                                    foreach($taxas as $t):?>
                                        <tr>
                                            <td><small><?= $t['contratacao']?></small></td>
                                            <?php 
                                            if($t['valorTaxaTipo']=="%"){
                                                $valorTaxa=$t['valorTaxa'].' '.$t['valorTaxaTipo'];
                                            }else{
                                                $valorTaxa=$t['valorTaxaTipo'].' '.$t['valorTaxa'];
                                            }?>
                                            <td><small><?= $valorTaxa?></small></td>
                                            <?php 
                                            if($t['encargoTipo']=="%"){
                                                $encargo=$t['encargo'].' '.$t['encargoTipo'];
                                            }else{
                                                $encargo=$t['encargoTipo'].' '.$t['encargo'];
                                            }?>
                                            <td><small><?= $encargo?></small></td>
                                            <?php 
                                            if($t['tributoTipo']=="%"){
                                                $tributo=$t['tributo'].' '.$t['tributoTipo'];
                                            }else{
                                                $tributo=$t['tributoTipo'].' '.$t['tributo'];
                                            }?>
                                            <td><small><?= $tributo?></small></td>
                                            <td><small><?= $t['prazo']?></small></td>
                                            <td style="width:50px">
                                                <div class="btn btn-light btn-sm" title="Remove Taxa" onClick="removeTaxaCliente('<?= $idCliente?>','<?= $t['id']?>')">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                }?>
                            </tBody>
                        </table>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Taxas Especiais</legend>
                        <div class="btn btn-outline-info btn-sm btn-block" onClick="incluirTaxa('especial','<?= $idCliente?>')">
                            <i class="fas fa-plus-circle"></i> Incluir Taxa Especial
                        </div>
                        <br/>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <tHead class="thead-warning">
                                <tr>
                                    <th><small>Contratação</small></th>
                                    <th><small>Taxa</small></th>
                                    <th><small>Valor</small></th>
                                    <th style="width:50px"></th>
                                </tr>
                            </tHead>
                            <tBody>
                                <?php if(empty($taxasEspeciais)){?>
                                    <tr>
                                        <td colspan="6">Nenhuma taxa especial cadastrada</td>
                                    </tr>
                                    <?php
                                }else{
                                    foreach($taxasEspeciais as $tE):?>
                                        <tr>
                                            <td><small><?= $tE['contratacao']?></small></td>
                                            <td><small><?= $tE['taxaEspecial']?></small></td>
                                            <?php 
                                            if($tE['valorTaxaTipo']=="%"){
                                               $valorTaxa=$tE['valorTaxa'].' '.$tE['valorTaxaTipo'];
                                            }else{
                                                $valorTaxa=$tE['valorTaxaTipo'].' '.$tE['valorTaxa'];
                                            }?>
                                            <td><small><?= $valorTaxa?></small></td>
                                            <td style="width:50px">
                                                <div class="btn btn-light btn-sm" title="Remove Taxa Especial" onClick="removeTaxaCliente('<?= $idCliente?>','<?= $tE['id']?>')">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                }?>
                            </tBody>
                        </table>
                    </fieldset>
                </div>
            </div>  
            <br/>
            <div class="row">
                <div class="col">
                    <label for="observacao">Observação</label>
                    <textarea name="observacao" id="observacao" class="form-control" style="min-height:200px" onBlur="gravaObsTaxaCliente(this.value,'<?= $idCliente?>')"><?= $infoFaturamento['observacaoTaxa']?></textarea>                    
                </div>
            </div>        
        </div>
        <div class="card-footer text-right bg-white">
            <a href="<?= LINK.'clientes/editarCliente_faturamento/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                <i class="fas fa-backward"></i> Anterior 
            </a>
            <a href="<?= LINK.'clientes/listarClientes'?>" class="btn btn-outline-success">
                <i class="fas fa-save"></i> Salvar
            </a>
        </div>
    </div>
</div>