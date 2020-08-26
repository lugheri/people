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
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente_enderecos/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Endereços">
                        <i class="fas fa-map-marked-alt"></i> Endereços
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
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_taxas/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Taxas">
                        <i class="fas fa-hand-holding-usd"></i>
                    </a>
                </li>
            </ul>    
        </div>
        <div class="card-body" id='editaEndereco'>
       
            <fieldset class="border p-2">
                <legend class="w-auto">Endereços</legend>
                <form method="post" id="formEndereco">
                    <input type="hidden" name="idCliente" id="idCliente" value="<?= $idCliente?>" class="form-control"/>
                    <div class="row">
                        <div class="col-2">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" maxlength="9" required class="form-control" 
                                onkeypress="MascaraCEP(formEndereco.cep)"/>
                        </div>
                        <div class="col">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro" required class="form-control"/>
                        </div>
                        <div class="col-1">
                            <label for="numero">Número</label>
                            <input type="text" name="numero" id="numero" required class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" required class="form-control"/>
                        </div>
                        <div class="col">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" required class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" required class="form-control">
                                <option value="">Selecione...</option>
                                <option value="AC">Acre (AC)</option>
                                <option value="AL">Alagoas (AL)</option>
                                <option value="AP">Amapá (AP)</option>
                                <option value="AM">Amazonas (AM)</option>
                                <option value="BA">Bahia (BA)</option>
                                <option value="CE">Ceará (CE)</option>
                                <option value="DF">Distrito Federal (DF)</option>
                                <option value="ES">Espírito Santo (ES)</option>
                                <option value="GO">Goiás (GO)</option>
                                <option value="MA">Maranhão (MA)</option>
                                <option value="MT">Mato Grosso (MT)</option>
                                <option value="MS">Mato Grosso do Sul (MS)</option>
                                <option value="MG">Minas Gerais (MG)</option>
                                <option value="PA">Pará (PA)</option>
                                <option value="PB">Paraíba (PB)</option>
                                <option value="PR">Paraná (PR)</option>
                                <option value="PE">Pernambuco (PE)</option>
                                <option value="PI">Piauí (PI)</option>
                                <option value="RJ">Rio de Janeiro (RJ)</option>
                                <option value="RN">Rio Grande do Norte (RN)</option>
                                <option value="RS">Rio Grande do Sul (RS)</option>
                                <option value="RO">Rondônia (RO)</option>
                                <option value="RR">Roraima (RR)</option>
                                <option value="SC">Santa Catarina (SC)</option>
                                <option value="SP">São Paulo (SP)</option>
                                <option value="SE">Sergipe (SE)</option>
                                <option value="TO">Tocantins (TO)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                                <div class="col">
                                    <label for="onibus">Ônibus</label>
                                    <input type="text" name="onibus" id="onibus" class="form-control" />
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-8">
                            
                            <div class="row">
                                <div class="col">
                                    <label for="referencia">Referência</label>
                                    <textarea type="text" name="referencia" id="referencia" class="form-control" style="min-height:200px"></textarea>
                                </div>
                            </div>
                        </div>    
                        <div class="col">
                            <br/>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="principal" id="principal">
                                        <label style="font-size:1rem" class="custom-control-label" for="principal">
                                            Endereço Principal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="faturamento" id="faturamento">
                                        <label style="font-size:1rem" class="custom-control-label" for="faturamento">
                                            Endereço de Faturamento
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success btn-block" onClick="addEndereco()">
                                        Adicionar Endereço
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
                <br/>
                <div class="card">
                    <div class="card-body" id='enderecos'>
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <tHead class="thead-warning">
                                <tr>
                                    <th>Endereço</th>
                                    <th>Nº</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Ônibus</th>
                                    <th>Principal</th>
                                    <th>Faturamento</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </tHead>
                            <tBody>
                                <?php 
                                if(empty($enderecoCliente)){?>
                                    <tr>
                                        <td colspan="8">Nenhum Endereço cadastrado</td>
                                    </tr>
                                    <?php
                                }else{
                                    foreach($enderecoCliente as $e):?>
                                        <tr>
                                            <td><?=$e['logradouro']?></td>
                                            <td><?=$e['numero']?></td>
                                            <td><?=$e['bairro']?></td>
                                            <td><?=$e['cidade'].'-'.$e['estado']?></td>
                                            <td><?=$e['onibus']?></td>
                                            <td><?php if($e['endPrincipal']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                            <td><?php if($e['endFaturamento']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                            <td style="width:50px">
                                                <div class="btn btn-sm btn-light" title="Remover Endereço" onClick="delEndereco('<?= $idCliente?>','<?= $e['id']?>')">
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
            <a href="<?= LINK.'clientes/editarCliente/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                <i class="fas fa-backward"></i> Anterior 
            </a>
            <a href="<?= LINK.'clientes/editarCliente_contatos/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                Próximo <i class="fas fa-forward"></i>
            </a>
        </div>
    </div>
</div>