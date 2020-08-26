<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Benefícios do Vagas</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formBeneficioVaga">
            <div class="row">
                <div class="col-12">
                    <label for="beneficio">Benefício</label>
                    <input type="text" name="beneficio" id="beneficio" required class="form-control"/>    
                </div>
                <div class="col-3">
                    <label for="tipo">Tipo</label>
                    <select type="text" name="tipo" id="tipo" required class="form-control">
                        <option value="">Selecione</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Alimentação">Alimentação</option>
                        <option value="Saúde">Saúde</option>
                        <option value="Outros">Outros</option>
                    </select>       
                </div>
                <div class="col-3">
                    <label for="complemento">Complemento</label>
                    <select type="text" name="complemento" id="complemento" required class="form-control">
                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>  
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:30px" onClick="addBeneficioVaga()">
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
                            <tr onClick="editarBeneficioVaga('<?= $lb['id']?>')">
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