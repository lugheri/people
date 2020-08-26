<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Zonas</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
       
        <form method="post" id="formZonaCliente">
            <div class="row">
                <div class="col">
                    <label for="descricao">descricao.</label>
                    <input type="text" name="descricao" id="descricao" required class="form-control"/>    
                </div>
            </div>
            <div class="row">    
                <div class="col-5">
                    <label for="estado">Estado</label>
                    <select type="text" name="estado" id="estado" required class="form-control">
                        <option value="">Selecione...</option>
                        <option value="AC">Acre (AC)</option>
                        <option value="AP">Amapá (AP)</option>
                        <option value="AP">Amapá (AP)</option>
                        <option value="AL">Alagoas (AL)</option>
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
                <div class="col">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" required class="form-control"/>  
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cepInicio">Faixa de Cep Inicial</label>
                    <input type="text" name="cepInicio[]" id="cepInicio" required class="form-control"/>
                </div>
                <div class="col">
                    <label for="cepFinal">Faixa de Cep Final</label>
                    <input type="text" name="cepFinal[]" id="cepFinal" required class="form-control"/>
                </div>
            </div>
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
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:15px" onClick="addZonaCliente()">
                        <i class="fas fa-plus-circle"></i> Incluir
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
                            <tr <?php if (!empty($idZona) && $idZona==$lz['id']){ echo "class='bg-warning'";}?> onClick="editarZona('<?= $lz['id']?>')">
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