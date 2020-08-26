<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Editar Benefício do Cliente</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formBeneficioVaga">
            <input type="hidden" name="idBeneficio" id="idBeneficio" value="<?= $infoBeneficio['id']?>" required class="form-control"/> 
            <div class="row">
                <div class="col-12">
                    <label for="beneficio">Benefício</label>
                    <input type="text" name="beneficio" id="beneficio" value="<?= $infoBeneficio['beneficio']?>" required class="form-control"/>    
                </div>
                <div class="col-3">
                    <label for="tipo">Tipo</label>
                    <select type="text" name="tipo" id="tipo" required class="form-control">
                        <option value="">Selecione</option>
                        <option <?php if($infoBeneficio['tipo']=="Transporte"){ echo "selected";}?> value="Transporte">Transporte</option>
                        <option <?php if($infoBeneficio['tipo']=="Alimentação"){ echo "selected";}?> value="Alimentação">Alimentação</option>
                        <option <?php if($infoBeneficio['tipo']=="Saúde"){ echo "selected";}?> value="Saúde">Saúde</option>
                        <option <?php if($infoBeneficio['tipo']=="Outros"){ echo "selected";}?> value="Outros">Outros</option>
                    </select>       
                </div>
                <div class="col-3">
                    <label for="complemento">Complemento</label>
                    <select type="text" name="complemento" id="complemento" required class="form-control">
                        <option value="">Selecione</option>
                        <option <?php if($infoBeneficio['complemento']==1){ echo "selected";}?> value="1">Sim</option>
                        <option <?php if($infoBeneficio['complemento']==0){ echo "selected";}?> value="0">Não</option>
                    </select>  
                </div>
               
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:30px" onClick="salvaBeneficioVaga()">
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
                            <th>Beneficío</th>
                            <th>Tipo</th>
                            <th>Complemento</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarBeneficiosVagas)){?>
                            <tr>
                                <td colspan="4">Nenhum benefícios cadastrado</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarBeneficiosVagas as $lb):?>
                            <tr <?php if($infoBeneficio['id']==$lb['id']){ echo 'class="bg-warning"';}?> onClick="editarBeneficioVaga('<?= $lb['id']?>')">
                            <td><?= $lb['beneficio']?></td>
                                <td><?= $lb['tipo'];?></td>
                                <td><?php if($lb['complemento']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delBeneficioVaga('<?= $lb['id']?>')">
                                        <i class="fas fa-trash text-danger" title="Remover Benefício"></i>
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