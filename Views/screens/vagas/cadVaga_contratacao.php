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
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_contratacao/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Contratação">
                            <i class="fas fa-handshake"></i> Contratação
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
                    <!-- <li class="nav-item">
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
                <h6 class="card-title text-muted"><i class="fas fa-handshake"></i> Contratação</h6>
                <div class="container">
                    <legend class="w-auto">Salário / Bolsa Auxílio</legend> 
                    <div class="row">                        
                        <div class="col-4">
                            <label for="salario_De">Piso salárial</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="salario_De-addon1">R$</span>
                                </div>
                                <input type="text" name="salario_De" id="salario_De" class="form-control" value="<?= $contratacaoVaga['salario_De']?>"
                                       onInput="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','salario_De',this.value)">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="salario_Ate">Teto salárial</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="salario_De-addon1">R$</span>
                                </div>
                                <input type="text" name="salario_Ate" id="salario_Ate" class="form-control" value="<?= $contratacaoVaga['salario_Ate']?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','salario_Ate',this.value)">
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="periodoSalario">Por:</label>
                            <select name="periodoSalario" id="periodoSalario" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','periodoSalario',this.value)">
                                <option <?php if($contratacaoVaga['periodoSalario']=="mes"){ echo "selected";}?> value="mes">
                                    Mês
                                </option>
                                <option <?php if($contratacaoVaga['periodoSalario']=="dia"){ echo "selected";}?> value="dia">
                                    Dia
                                </option>
                                <option <?php if($contratacaoVaga['periodoSalario']=="hora"){ echo "selected";}?> value="hora">
                                    Hora
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        <label for="omitirSalarioSite">Omitir salário no site:</label>
                            <select name="omitirSalarioSite" id="omitirSalarioSite" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','omitirSalarioSite',this.value)">
                                <option <?php if($contratacaoVaga['omitirSalarioSite']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($contratacaoVaga['omitirSalarioSite']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="formaContratacao">Forma de Contratação:</label>
                            <select name="formaContratacao" id="formaContratacao" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','formaContratacao',this.value)">
                                <option value=""></option>
                                <?php foreach($formaContratacao as $fc):?>
                                    <option <?php if($contratacaoVaga['formaContratacao']==$fc['id']){ echo "selected";}?> value="<?= $fc['id']?>">
                                        <?= $fc['forma']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        <label for="omitirFormaContSite">Omitir forma contratação no site:</label>
                            <select name="omitirFormaContSite" id="omitirFormaContSite" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','omitirFormaContSite',this.value)">
                                <option <?php if($contratacaoVaga['omitirFormaContSite']=="1"){ echo "selected";}?> value="1">
                                    Sim
                                </option>
                                <option <?php if($contratacaoVaga['omitirFormaContSite']=="0"){ echo "selected";}?> value="0">
                                    Não
                                </option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="tempoContrato">Tempo de Contrato <small class="text-danger">(Tempo em dias)</small></label>
                            <input type="number" step="1" min="0" name="tempoContrato" id="tempoContrato" class="form-control" value="<?= $contratacaoVaga['tempoContrato']?>"
                                    onInput="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','tempoContrato',this.value)">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-4">
                        <label for="formaPagto">Forma de Pagamento:</label>
                            <select name="formaPagto" id="formaPagto" class="form-control" 
                                   onChange="gravaCampoVaga('<?= $idVaga?>','vagas_contratacao','formaPagto',this.value)">
                                <option <?php if($contratacaoVaga['formaPagto']==""){ echo "selected";}?> value="">
                                    Indiferente..
                                </option>
                                <option <?php if($contratacaoVaga['formaPagto']=="cartao"){ echo "selected";}?> value="cartao">
                                    Cartão
                                </option>
                                <option <?php if($contratacaoVaga['formaPagto']=="cheque"){ echo "selected";}?> value="cheque">
                                    Cheque
                                </option>
                                <option <?php if($contratacaoVaga['formaPagto']=="dinheiro"){ echo "selected";}?> value="dinheiro">
                                    Dinheiro
                                </option>                                
                            </select>
                        </div>
                    </div>-->
                    <br/>  
                    <fieldset class="border p-2">
                        <form id='formBeneficios'>
                            <input type="hidden" name="idVaga" id="idVaga" value="<?= $idVaga ?>"/>
                            <legend class="w-auto">Benefícios</legend>  
                            <div class="row">
                                <div class="col-6">
                                    <label for="beneficio">Benefício</label>
                                    <select name="beneficio" id="beneficio" class="form-control">
                                        <option value=""></option>
                                        <?php foreach($listaBeneficios as $b):?>
                                            <option value="<?= $b['id']?>">
                                                <?= $b['beneficio']?>
                                            </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>   
                                <div class="col-4">
                                    <label for="valor">Valor</label>
                                    <input name="valor" id="valor" class="form-control" onkeypress="MascaraDecimal(formBeneficios.valor)">
                                </div> 
                                <div class="col">
                                    <br/>
                                    <button type="submit" class="btn btn-outline-success btn-block" onClick="addBeneficio()">
                                        <i class="fas fa-plus"></i> Incluir
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body" id='tbl_beneficios'>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Benefício</th>
                                                    <th>Valor</th>
                                                    <th style="height:50px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(empty($beneficios)){?>
                                                    <tr>   
                                                        <td colspan='3'>Nenhum benefício cadastrado</td>
                                                    </tr>
                                                    <?php
                                                }else{
                                                    foreach($beneficios as $b):?>
                                                        <tr>
                                                            <td><?= $b['beneficio']?></td>
                                                            <td><?= $b['valor']?></td>
                                                            <td style="height:50px">
                                                                <div class="btn btn-sm btn-outline-light" onClick="removerBeneficioVaga('<?= $idVaga ?>','<?= $b['id'] ?>')">
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
                    </fieldset>   

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_idiomas/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_entrevistas/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
