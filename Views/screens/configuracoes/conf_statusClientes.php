<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Status do Cliente</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formStatusCliente">
            <div class="row">
                <div class="col-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" required class="form-control"/>    
                </div>
                <div class="col">
                    <label for="tipo">Tipo</label>
                    <select type="text" name="tipo" id="tipo" required class="form-control">
                        <option value="">Selecione</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>    
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:30px" onClick="addStatusCliente()">
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
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Padrão</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarStatusClientes)){?>
                            <tr>
                                <td colspan="3">Nenhum status cadastrado</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarStatusClientes as $ls):?>
                            <tr>
                                <td><?= $ls['status']?></td>
                                <td><?php if($ls['tipo']==1){ echo "Ativo";}else{ echo "Inativo";}?></td>
                                <td><?php if($ls['default']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                <td style="width:50px">
                                    <?php if($ls['default']==0){?>
                                        <div class="btn btn-outline-light" onClick="delStatusCliente('<?= $ls['id']?>')">
                                            <i class="fas fa-trash text-danger" title="removerStatus"></i>
                                        </div>
                                        <?php 
                                    }?>
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