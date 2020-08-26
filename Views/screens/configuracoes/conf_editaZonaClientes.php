<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Editar Zona</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
       
        <form method="post" id="formZonaCliente">
            <input type="hidden" name="idZona" id="idZona" value="<?= $infoZona['id']?>" required class="form-control"/>    
          
            <div class="row">
                <div class="col">
                    <label for="descricao">descricao.</label>
                    <input type="text" name="descricao" id="descricao" value="<?= $infoZona['descricao']?>" required class="form-control"/>    
                </div>
            </div>
            <div class="row">    
                <div class="col-5">
                    <label for="estado">Estado</label>
                    <select type="text" name="estado" id="estado" required class="form-control">
                        <option value="">Selecione...</option>
                        <option <?php if($infoZona['estado']=="AP"){ echo "selected";}?> value="AP">Amapá (AP)</option>
                        <option <?php if($infoZona['estado']=="AC"){ echo "selected";}?> value="AC">Acre (AC)</option>
                        <option <?php if($infoZona['estado']=="AP"){ echo "selected";}?> value="AP">Amapá (AP)</option>
                        <option <?php if($infoZona['estado']=="AL"){ echo "selected";}?> value="AL">Alagoas (AL)</option>
                        <option <?php if($infoZona['estado']=="AM"){ echo "selected";}?> value="AM">Amazonas (AM)</option>
                        <option <?php if($infoZona['estado']=="BA"){ echo "selected";}?> value="BA">Bahia (BA)</option>
                        <option <?php if($infoZona['estado']=="CE"){ echo "selected";}?> value="CE">Ceará (CE)</option>
                        <option <?php if($infoZona['estado']=="DF"){ echo "selected";}?> value="DF">Distrito Federal (DF)</option>
                        <option <?php if($infoZona['estado']=="ES"){ echo "selected";}?> value="ES">Espírito Santo (ES)</option>
                        <option <?php if($infoZona['estado']=="GO"){ echo "selected";}?> value="GO">Goiás (GO)</option>
                        <option <?php if($infoZona['estado']=="MA"){ echo "selected";}?> value="MA">Maranhão (MA)</option>
                        <option <?php if($infoZona['estado']=="MT"){ echo "selected";}?> value="MT">Mato Grosso (MT)</option>
                        <option <?php if($infoZona['estado']=="MS"){ echo "selected";}?> value="MS">Mato Grosso do Sul (MS)</option>
                        <option <?php if($infoZona['estado']=="MG"){ echo "selected";}?> value="MG">Minas Gerais (MG)</option>
                        <option <?php if($infoZona['estado']=="PA"){ echo "selected";}?> value="PA">Pará (PA)</option>
                        <option <?php if($infoZona['estado']=="PB"){ echo "selected";}?> value="PB">Paraíba (PB)</option>
                        <option <?php if($infoZona['estado']=="PR"){ echo "selected";}?> value="PR">Paraná (PR)</option>
                        <option <?php if($infoZona['estado']=="PE"){ echo "selected";}?> value="PE">Pernambuco (PE)</option>
                        <option <?php if($infoZona['estado']=="PI"){ echo "selected";}?> value="PI">Piauí (PI)</option>
                        <option <?php if($infoZona['estado']=="RJ"){ echo "selected";}?> value="RJ">Rio de Janeiro (RJ)</option>
                        <option <?php if($infoZona['estado']=="RN"){ echo "selected";}?> value="RN">Rio Grande do Norte (RN)</option>
                        <option <?php if($infoZona['estado']=="RS"){ echo "selected";}?> value="RS">Rio Grande do Sul (RS)</option>
                        <option <?php if($infoZona['estado']=="RO"){ echo "selected";}?> value="RO">Rondônia (RO)</option>
                        <option <?php if($infoZona['estado']=="RR"){ echo "selected";}?> value="RR">Roraima (RR)</option>
                        <option <?php if($infoZona['estado']=="SC"){ echo "selected";}?> value="SC">Santa Catarina (SC)</option>
                        <option <?php if($infoZona['estado']=="SP"){ echo "selected";}?> value="SP">São Paulo (SP)</option>
                        <option <?php if($infoZona['estado']=="SE"){ echo "selected";}?> value="SE">Sergipe (SE)</option>
                        <option <?php if($infoZona['estado']=="TO"){ echo "selected";}?> value="TO">Tocantins (TO)</option>
                    </select>       
                </div>
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="<?= $infoZona['cidade']?>" required class="form-control"/>  
                </div>
            </div>

            <?php 
            if(empty($faixaCeps)){?>
                <div class="row">
                    <div class="col">
                        <label for="cepInicio">Faixa de Cep Inicial</label>
                        <input type="text" name="cepInicio[]" id="cepInicio" value='vazio' required class="form-control"/>
                    </div>
                    <div class="col">
                        <label for="cepFinal">Faixa de Cep Final</label>
                        <input type="text" name="cepFinal[]" id="cepFinal" required class="form-control"/>
                    </div>
                </div>
                <?php
            }else{
                $i=0;
                foreach($faixaCeps as $fc):
                    if($i==0){?>
                        <div class="row">
                            <div class="col">
                                <label for="cepInicio">Faixa de Cep Inicial</label>
                                <input type="text" name="cepInicio[]" id="cepInicio" value="<?= $fc['CepInicio']?>" required class="form-control"/>
                            </div>
                            <div class="col">
                                <label for="cepFinal">Faixa de Cep Final</label>
                                <input type="text" name="cepFinal[]" id="cepFinal" value="<?= $fc['CepFinal']?>" required class="form-control"/>
                            </div>
                        </div>
                        <?php 
                    }else{?>
                        <div class="row" id="faixa_<?= $fc['id']?>">
                            <div class="col">
                                <label for="cepInicio">Faixa de Cep Inicial</label>
                                <input type="text" name="cepInicio[]" id="cepInicio" value="<?= $fc['CepInicio']?>" required class="form-control"/>
                            </div>
                            <div class="col">
                                <label for="cepFinal">Faixa de Cep Final</label>
                                <input type="text" name="cepFinal[]" id="cepFinal" value="<?= $fc['CepFinal']?>" required class="form-control"/>
                            </div>
                            <div class="col-1 text-right">
                                <div class="btn btn-outline-light" style="margin-top:30px" title="Remover esta faixa de Cep" onClick="removerFaixaCep('faixa_<?= $fc['id']?>')">
                                    <i class="fas fa-trash text-danger"></i>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ++$i;
                endforeach;
            }?>

            <div id='faixaCep'>
                <div class="row">    
                    <div class="col">
                        <div class="btn btn-outline-info btn-sm btn-block" style="margin-top:5px" onClick="addFaixaCep('faixaCep')">
                            Adicionar Faixa de Cep
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">    
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:15px" onClick="salvaZonaCliente()">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                </div>
            </div>
        </form>
        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-sm table-bordered table-hover table-striped">
                    <tHead class="thead-warning">
                        <tr>
                            <th>Descrição</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Qtd Intervi.</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarZonasClientes)){?>
                            <tr>
                                <td colspan="5">Nenhuma zona cadastrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarZonasClientes as $lz):?>
                            <tr <?php if (!empty($infoZona['id']) && $infoZona['id']==$lz['id']){ echo "class='bg-warning'";}?> onClick="editarZona('<?= $lz['id']?>')">
                                <td><?= $lz['descricao']?></td>
                                <td><?= $lz['cidade']?></td>
                                <td><?= $lz['estado']?></td>
                                <td><?= $this->qtdFaixaCeps($lz['id'])?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delZonaCliente('<?= $lz['id']?>')">
                                        <i class="fas fa-trash text-danger" title="remover zona"></i>
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
    </div>
    <div class="modal-footer">
        <div class="btn btn-secondary" data-dismiss="modal">
            Fechar
        </div>
    </div>
</div>