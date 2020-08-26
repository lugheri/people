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
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente/<?= base64_encode($idCliente.':edicao')?>">
                        <i class="fas fa-home"></i> Principal
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
                    <a class="nav-link" href="<?= LINK?>clientes/editarCliente_taxas/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Taxas">
                        <i class="fas fa-hand-holding-usd"></i>
                    </a>
                </li>
            </ul>    
        </div>
        <div class="card-body">
            <fieldset class="border p-2">
                <legend class="w-auto">Dados do Cliente</legend>
                <div class="row">
                    <div class="col-3 text-center text-muted" id="alteraLogotipo">
                        <form method="post" id="formLogo" enctype="multipart/form-data">
                            <input type="hidden" name="idCliente" value="<?= $idCliente?>"/>   
                            <input type='file' style="display:none" name='arquivo' id='arquivo' required class='form-control' onChange="alteraLogotipo()"/>
                            <br/>
                            <?php 
                            $logoEmpresa=$this->logoEmpresa($idCliente);
                            if(empty($logoEmpresa)){?>
                                <div class="btn btn-foto btn-outline-primary btn-sm"  onClick="document.getElementById('arquivo').click()">
                                    <p class="h1"><i class="fas fa-camera"></i></p>
                                    Logotipo <br/>da empresa
                                </div>
                                <?php 
                            }else{?>
                                <div class="btn fotoPerfil" onClick="document.getElementById('arquivo').click()" style="background-color:#fff;background-image: url('<?=BASE_URL.$logoEmpresa['arquivo']?>')"></div>
                                <br/><small>Clique na imagem para alterar o logo.</small>
                                <?php
                            }?>
                            <br/>
                            <small class="text-muted">Tipos de arquivos aceitos:'png','jpeg','jpg','gif'</small>
                        </form>
                    </div>
                <form method="post" id="formCliente">
                    <input type="hidden" name="idCliente" id="idCliente" value="<?= $idCliente?>" class="form-control"/>
                        <div class="col">
                            <div class="row">
                                <div class="col-3">
                                    <label for="cod">Cód.</label>
                                    <input type="text" id="cod" value="<?= $idCliente?>" disabled class="form-control"/>
                                </div>
                                <div class="col-12">
                                    <label for="razao">Razão Social</label>
                                    <input type="text" name="razao" id="razao" value="<?= $dadosCliente['razaoSocial']?>" required class="form-control"/>
                                </div>
                                <div class="col-12">
                                    <label for="nome">Nome Fantasia</label>
                                    <input type="text" name="nome" id="nome" value="<?= $dadosCliente['nome']?>" required class="form-control"/>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" maxlength="18" class="form-control"
                                   value="<?= $dadosCliente['cnpj']?>"
                                   onblur="ValidarCNPJ(formCliente.cnpj)"
                                   onkeypress="MascaraCNPJ(formCliente.cnpj)"/>
                            <small style="display:none;" class="form-text text-danger" id="alertaCNPJ">
                                <i class="fas fa-times"></i> CNPJ Inválido
                            </small>
                        </div>
                        <div class="col">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" maxlength="14" class="form-control"
                                   value="<?= $dadosCliente['cpf']?>"
                                   onblur="ValidarCPF(formCliente.cpf)"
                                   onkeypress="MascaraCPF(formCliente.cpf)"/>
                            <small style="display:none;" class="form-text text-danger" id="alertaCPF">
                                <i class="fas fa-times"></i> Cpf Inválido
                            </small>
                        </div>
                        <div class="col">
                            <label for="ie">Ins.Estadual</label>
                            <input type="text" name="ie" id="ie" class="form-control" value="<?= $dadosCliente['inscricaoEstadual']?>"/>
                        </div>
                        <div class="col">
                            <label for="im">Ins.Municipal</label>
                            <input type="text" name="im" id="im" class="form-control" value="<?= $dadosCliente['inscricaoMunicipal']?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cnpj">Ramo</label>
                            <select name="ramo" id="ramo" class="form-control">
                                <option value="">Selecione...</option>
                                <?php 
                                if(!empty($listarRamosClientes)){
                                    foreach($listarRamosClientes as $lr):?>]
                                    <option <?php if($dadosCliente['ramo']==$lr['ramo']){ echo "selected";}?> value="<?= $lr['ramo']?>"><?= $lr['ramo']?></option>
                                    <?php 
                                    endforeach;
                                }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="porte">Porte</label>
                            <select name="porte" id="porte" class="form-control">
                                <option value="">Selecione...</option>]
                                <option <?php if($dadosCliente['porte']=="M"){ echo "selected";}?> value="M">Médio</option>
                                <option <?php if($dadosCliente['porte']=="P"){ echo "selected";}?> value="P">Pequeno</option>
                                <option <?php if($dadosCliente['porte']=="G"){ echo "selected";}?> value="G">Grande</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="site">Site</label>
                            <input type="text" name="site" id="site" value="<?= $dadosCliente['site']?>" class="form-control"/>
                        </div>
                        <div class="col-2">
                            <label for="qtdFunc">Qtd Funcionários</label>
                            <input type="number" min="0" step="1" name="qtdFunc" id="qtdFunc" value="<?= $dadosCliente['qtdFuncionarios']?>" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="gpoCli">Grupo de Cliente</label>
                            <select name="gpoCli" id="gpoCli" class="form-control">
                                <option value="0">Selecione...</option>
                                <?php 
                                if(!empty($listarGruposClientes)){
                                    foreach($listarGruposClientes as $lg):?>]
                                    <option <?php if($dadosCliente['gpoCliente']==$lg['nome']){ echo "selected";}?> value="<?= $lg['nome']?>"><?= $lg['nome']?></option>
                                    <?php 
                                    endforeach;
                                }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="origem">Origem</label>
                            <select name="origem" id="origem" class="form-control">
                                <option value="">Selecione...</option>
                                <?php 
                                if(!empty($listarOrigensClientes)){
                                    foreach($listarOrigensClientes as $lg):?>]
                                    <option <?php if($dadosCliente['origem']==$lg['origem']){ echo "selected";}?> value="<?= $lg['origem']?>"><?= $lg['origem']?></option>
                                    <?php 
                                    endforeach;
                                }?>
                            </select>
                        </div>
                    </div>    
                </fieldset>
                <br/>
                
                <fieldset class="border p-2">
                    <legend class="w-auto">Telefones</legend>

                    <div class="row">
                        <div class="col-1">
                            <label for="ddd">DDD</label>
                            <input type="text" name="ddd" id="ddd" maxlength="2" class="form-control"
                                   onkeypress="MascaraDDD(formCliente.ddd)"/>
                        </div>
                        <div class="col">
                            <label for="numero">Número</label>
                            <input type="text" name="numero" id="numero" maxlength="10" class="form-control"
                                    onkeypress="MascaraTEL(formCliente.numero)"/>
                        </div>
                        <div class="col-2">
                            <label for="ramal">Ramal</label>
                            <input type="text" name="ramal" id="ramal" class="form-control"/>
                        </div>
                        <div class="col">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Nenhum">Nenhum</option>
                                <option value="Direto">Direto</option>
                                <option value="Residencial">Residencial</option>
                                <option value="Celular">Celular</option>
                                <option value="Recado">Recado</option>
                                <option value="Comercial">Comercial</option>
                                <option value="PABX">PABX</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <br/>
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="principal">
                                <label style="font-size:1rem" class="custom-control-label" for="principal">
                                    Principal
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="contato">Contato</label>
                            <input type="text" name="contato" id="contato" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <br/>
                            <div class="btn btn-info btn-block" onClick="addTelefoneCliente('<?= $idCliente?>')">
                                <i class="fas fa-plus"></i> Adicionar telefone
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
                        <div class="card-body" id='telefones'>
                            <table class="table table-sm table-striped table-hover table-bordered">
                                <tHead class="thead-warning">
                                    <tr>
                                        <th>DDD</th>
                                        <th>Número</th>
                                        <th>Ramal</th>
                                        <th>Tipo</th>
                                        <th>Principal</th>
                                        <th>Contato</th>
                                        <th style="width:50px"></th>
                                    </tr>
                                </tHead>
                                <tBody>
                                    <?php 
                                    if(empty($telefones)){?>
                                        <tr>
                                            <td colspan="7">Nenhum telefone cadastrado</td>
                                        </tr>
                                        <?php
                                    }else{
                                        foreach($telefones as $t):?>
                                            <tr>
                                                <td><?=$t['ddd']?></td>
                                                <td><?=$t['numero']?></td>
                                                <td><?=$t['ramal']?></td>
                                                <td><?=$t['tipo']?></td>
                                                <td><?php if($t['principal']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                                <td><?=$t['contato']?></td>
                                                <td style="width:50px">
                                                    <div class="btn btn-sm btn-light" title="Remover Telefone" onClick="removerTelefone('<?= $idCliente?>','<?= $t['id']?>')">
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

                <fieldset class="border p-2">
                    <legend class="w-auto">Gerenciar Cliente</legend>
                    <div class="row">
                        <div class="col-2">
                            <label for="statusCliente">Status</label>
                            <select name="statusCliente" id="statusCliente" class="form-control">
                                <option value="">Selecione</option>
                                <?php 
                                if(!empty($listarStatusClientes)){
                                    foreach($listarStatusClientes as $ls):?>]
                                    <option <?php if($dadosCliente['statusCliente']==$ls['status']){ echo "selected";}?> value="<?= $ls['status']?>"><?= $ls['status']?></option>
                                    <?php 
                                    endforeach;
                                }?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="respSelecao">Resp. Seleção</label>
                            <select name="respSelecao" id="respSelecao" class="form-control">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="filial">Filial</label>
                            <select name="filial" id="filial" class="form-control">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <label for="classificacao">Classificação</label>
                            <select name="classificacao" id="classificacao" class="form-control">
                                <option value="">Selecione</option>
                                <option <?php if($dadosCliente['classificacao']=="A"){ echo "selected";}?>  value="A">A</option>
                                <option <?php if($dadosCliente['classificacao']=="B"){ echo "selected";}?>  value="B">B</option>
                                <option <?php if($dadosCliente['classificacao']=="C"){ echo "selected";}?>  value="C">C</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="respComercial">Resp. Comercial</label>
                            <select name="respComercial" id="respComercial" class="form-control">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="celula">Célula</label>
                            <select name="celula" id="celula" class="form-control">
                                <option value="0">Selecione</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <br/>
                <fieldset class="border p-2">
                    <legend class="w-auto">Benefícios</legend>
                    <div class="row" id='beneficiosCliente'>
                    <?php if(empty($listarBeneficiosVaga)){?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p class="h5 text-muted">Nenhum Benefício disponível</p>
                                </div>
                            </div>
                        </div>    
                        <?php
                    }else{
                        foreach($listarBeneficiosVaga as $b):?>
                            <div class="col-6">
                           
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <?php 
                                        $valor=$this->checkBeneficio($b['id'],$idCliente);
                                        if(empty($valor)){?>
                                            <div class="col-2">
                                                <div class="btn btn-sm btn-outline-light btn-block" style='cursor:pointer' onClick="addBeneficioCliente('<?= $idCliente?>','<?= $b['id']?>')">
                                                    <i class="far fa-square text-secondary"></i>
                                                </div>
                                            </div>
                                            <div class="col text-left">
                                                <?= $b['beneficio']?>
                                            </div>
                                            <div class="col">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="valor">R$</span>
                                                    </div>
                                                    <input type="text" name='valor' id='valor' disabled class="form-control"/>
                                                </div>
                                            </div>
                                            <?php                                        
                                        }else{?>
                                            <div class="col-2">
                                                <div class="btn btn-sm btn-success btn-block" style='cursor:pointer' onClick="delBeneficioCliente('<?= $idCliente?>','<?= $b['id']?>')">
                                                    <i class="far fa-check-square"></i>
                                                </div>
                                            </div>
                                            <div class="col text-left">
                                                <?= $b['beneficio']?>
                                            </div>
                                            <div class="col">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="valor">R$</span>
                                                    </div>
                                                    <input type="text" name='valor' id='valor_<?= $b['id']?>' value="<?= $valor['valor']?>" class="form-control"
                                                           onInput="mascaraValor('valor_<?= $b['id']?>')" onBlur="gravaValorBeneficio(this.value,'<?= $idCliente?>','<?= $b['id']?>')"/>
                                                </div>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php
                        endforeach;
                    }?>
                    </div>
                    



                </fieldset>
                <br/>
                <fieldset class="border p-2">
                    <legend class="w-auto">Formas de Contratação</legend>
                    <div class="row" id="formasCliente">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h6">Formas de Contratação Disponíveis</p>
                                </div>
                                <div class="card-body text-center">
                                    <?php if(empty($listarFormasContratacao)){?>
                                        <small class="text-muted">Nenhuma forma disponível</small>
                                        <?php
                                    }else{?>
                                        <small class="text-muted">Clique para adicionar</small>
                                        <?php
                                        foreach($listarFormasContratacao as $f):
                                            if(empty($this->checkFormaContratacao($f['id'],$idCliente))){?>
                                                <div class="btn btn-outline-info btn-block" onClick="addFormaContratacaoCli('<?= $idCliente?>','<?= $f['id']?>')">
                                                    <?= $f['forma']?>
                                                    <i class="fas fa-arrow-alt-circle-right" style="float:right;margin-top:5px"></i>
                                                </div>
                                            <?php 
                                            }
                                        endforeach;
                                    }?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h6">Formas de Contratação Selecionadas</p>
                                </div>    
                                <div class="card-body text-center">
                                <?php if(empty($formasContratacaoSelecionadas)){?>
                                        <small class="text-muted">Nenhuma forma selecionada</small>
                                        <?php
                                    }else{?>
                                        <small class="text-muted">Clique para remover</small>
                                        <?php
                                        foreach($formasContratacaoSelecionadas as $f):?>
                                            <div class="btn btn-success btn-block" onClick="delFormaContratacaoCli('<?= $idCliente?>','<?= $f['id']?>')">
                                                <?= $f['forma']?>
                                                <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i>
                                            </div>
                                        <?php 
                                        endforeach;
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                            <br/>
                <div class="row">
                    <div class="col">
                        <label for="condicoes">Condições de encaminhamento para todas as vagas</label>
                        <textarea name="condicoes" id="condicoes" class="form-control" style="min-height:250px"><?= $dadosCliente['condicoesEncVaga']?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="observacoes">Observações do Cliente</label>
                        <textarea name="observacoes" id="observacoes" class="form-control" style="min-height:250px"><?= $dadosCliente['observacoes']?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right bg-white">
                <button type="submit" class="btn btn-outline-info" onClick="gravaDadosCliente()">
                    Próximo <i class="fas fa-forward"></i>
                </button>
            </div>
        </form>
    </div>
</div>