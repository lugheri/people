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
                    <a class="nav-link active" href="<?= LINK?>clientes/editarCliente_faturamento/<?= base64_encode($idCliente.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Faturamento">
                        <i class="fas fa-cash-register"></i> Faturamento
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
            <form method="POST" id="formFaturamento">   
                <input type="hidden" name="idCliente" id="idCliente" value="<?= $idCliente?>" class="form-control"/>    
                <div class="row">
                    <div class="col">
                        <fieldset class="border p-2">
                            <legend class="w-auto">Informações Gerais</legend>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="DSR" id="DSR"
                                         <?php if($infoFaturamento['DSR']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="DSR">
                                            Calcular D.S.R. Sobre Hora Extra
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="HE_Salario" id="HE_Salario"
                                         <?php if($infoFaturamento['HE_Salario']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="HE_Salario">
                                            Calcular Média de H.E. S/ 13º Salário
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="HE_Ferias" id="HE_Ferias"
                                         <?php if($infoFaturamento['HE_Ferias']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="HE_Ferias">
                                            Calcular Média de H.E. S/ Férias
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="beneficiosFatura" id="beneficiosFatura"
                                         <?php if($infoFaturamento['beneficiosFatura']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="beneficiosFatura">
                                            Deduzir Benefícios da Fatura
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="repassarDespesasAdm" id="repassarDespesasAdm"
                                         <?php if($infoFaturamento['repassarDespesasAdm']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="repassarDespesasAdm">
                                            Repassar Despesas Administrativas
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
                   
                    <div class="col">
                        <fieldset class="border p-2">
                            <legend class="w-auto">Guias</legend>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="IR" id="IR"
                                        <?php if($infoFaturamento['IR']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="IR">
                                            IR
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="FGTS" id="FGTS"
                                        <?php if($infoFaturamento['FGTS']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="FGTS">
                                            FGTS
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name="INSS" id="INSS"
                                        <?php if($infoFaturamento['INSS']==1){echo "checked";}?>>
                                        <label style="font-size:1rem" class="custom-control-label" for="INSS">
                                            INSS
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col">
                                    <label for="outros">Outros</label>
                                    <input type="text" name="outros" id="outros" value="<?= $infoFaturamento['Outros']?>" class="form-control"/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>    
               
                <br/>
                <fieldset class="border p-2">
                    <legend class="w-auto">Pagamento</legend>
                    <div class="row">
                        <div class="col-4">
                            <label for="salario">Salário</label>
                            <select name="salario" id="salario" class="form-control">
                                <option value="">Selecione...</option>
                                <option <?php if($infoFaturamento['salario']=='Dia'){echo "selected";}?> value="Dia">Dia</option>
                                <option <?php if($infoFaturamento['salario']=='Dia'){echo "selected";}?> value="Hora">Hora</option>
                                <option <?php if($infoFaturamento['salario']=='Dia'){echo "selected";}?> value="Mês">Mês</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="vale">Vale %</label>
                            <input type="text" name="vale" id="vale" value="<?= $infoFaturamento['vale']?>" class="form-control"
                                    onkeypress="MascaraDecimal(formFaturamento.vale)"/> 
                        </div>
                        <div class="col">
                            <label for="cargaHoraria">Carga Horária</label>
                            <input type="text" name="cargaHoraria" id="cargaHoraria" value="<?= $infoFaturamento['cargaHoraria']?>" class="form-control"
                                   onkeypress="mascaraInteiro(cargaHoraria)"/> 
                        </div>
                        <div class="col">
                            <label for="diaPag">Dia Pagto</label>
                            <input type="number" min="1" max="31" step="1" name="diaPag" id="diaPag" value="<?= $infoFaturamento['diaPagamento']?>" class="form-control"/> 
                        </div>
                        <div class="col">
                            <label for="diaVale">Dia Vale</label>
                            <input type="number" min="1" max="31" step="1" name="diaVale" id="diaVale" value="<?= $infoFaturamento['diaVale']?>" class="form-control"/> 
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="forma">Forma</label>
                            <select name="forma" id="forma" class="form-control">
                                <option value="">Selecione...</option>
                                <option <?php if($infoFaturamento['forma']=='Cartão'){echo "selected";}?> value="Cartão">Cartão</option>
                                <option <?php if($infoFaturamento['forma']=='Cheque'){echo "selected";}?> value="Cheque">Cheque</option>
                                <option <?php if($infoFaturamento['forma']=='Dinheiro'){echo "selected";}?> value="Dinheiro">Dinheiro</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="devolucao">Devolução</label>
                            <select name="devolucao" id="devolucao" class="form-control">
                                <option value="">Selecione...</option>
                                <option <?php if($infoFaturamento['devolucao']=='Cartão'){echo "selected";}?> value="Cartão">Cartão</option>
                                <option <?php if($infoFaturamento['devolucao']=='Cheque'){echo "selected";}?> value="Cheque">Cheque</option>
                                <option <?php if($infoFaturamento['devolucao']=='Dinheiro'){echo "selected";}?> value="Dinheiro">Dinheiro</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="tributos">Tributos</label>
                            <select name="tributos" id="tributos" class="form-control">
                                <option value="">Selecione...</option>
                                <option <?php if($infoFaturamento['tributos']=='Inclusos'){echo "selected";}?> value="Inclusos">Inclusos</option>
                                <option <?php if($infoFaturamento['tributos']=='Não Inclusos'){echo "selected";}?> value="Não Inclusos">Não Inclusos</option>
                            </select>
                        </div>                       
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="periculosidade">Periculosidade</label>
                            <input type="text" name="periculosidade" value="<?= $infoFaturamento['periculosidade']?>" id="periculosidade" class="form-control"
                                   onkeypress="MascaraDecimal(formFaturamento.periculosidade)"/> 
                        </div>
                        <div class="col">
                            <label for="insalubridade">Insalubridade</label>
                            <input type="text" name="insalubridade" value="<?= $infoFaturamento['insalubridade']?>" id="insalubridade" class="form-control"
                                   onkeypress="MascaraDecimal(formFaturamento.insalubridade)"/> 
                        </div>
                        <div class="col">
                            <label for="SAT">SAT</label>
                            <input type="text" name="SAT" id="SAT" value="<?= $infoFaturamento['sat']?>" class="form-control"
                                   onkeypress="MascaraDecimal(formFaturamento.SAT)"/> 
                        </div>                  
                    </div>
                    
                    
                </fieldset>
                <br/>
                <div class="row">
                    <div class="col-4">
                        <fieldset class="border p-2">
                            <legend class="w-auto">Serviços</legend>
                                <?php 
                                if(empty($servicos)){
                                    echo "Nenhum serviço disponível";
                                }else{
                                    foreach($servicos as $s):?>
                                        <div class='row'>
                                            <div class="col">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" name="<?= $s['servico']?>" id="<?= $s['servico']?>"
                                                           onClick="inclusaoServicoCliente(this.checked,'<?= $idCliente?>','<?= $s['id']?>')"
                                                           <?php if($this->checkServicoCliente($idCliente,$s['id'])==true){ echo "checked";}?>
                                                           >
                                                    <label style="font-size:1rem" class="custom-control-label" for="<?= $s['servico']?>">
                                                        <?= $s['servico']?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    endforeach;
                                }?>                    
                        </fieldset>
                    </div>
                    <div class="col">  
                        <fieldset class="border p-2">
                            <legend class="w-auto">Informações Adicionais</legend>
                            <label for="informacoes">Informações</label>
                            <textarea name="informacoes" id="informacoes" class="form-control" style="min-height:200px"><?= $infoFaturamento['informacoesAdicionais']?></textarea>                    
                        </fieldset>
                    </div>
                </div>        
                <br/>
                <div class="row">
                    <div class="col" id="salvarFaturamento">
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="btn btn-success" onClick="salvaFaturamentoCliente()">
                            <i class="fas fa-save"></i> Salvar Faturamento
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-right bg-white">
            <a href="<?= LINK.'clientes/editarCliente_arquivos/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                <i class="fas fa-backward"></i> Anterior 
            </a>
            <a href="<?= LINK.'clientes/editarCliente_taxas/'.base64_encode($idCliente.':editaCliente')?>" class="btn btn-outline-info">
                Próximo <i class="fas fa-forward"></i>
            </a>
        </div>
    </div>
</div>