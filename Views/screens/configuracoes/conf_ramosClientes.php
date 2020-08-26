<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Ramos dos Clientes</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formRamoCliente">
            <div class="row">
                <div class="col-8">
                    <label for="ramo">Ramo</label>
                    <input type="text" name="ramo" id="ramo" required class="form-control"/>    
                </div>
               
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:30px" onClick="addRamoCliente()">
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
                            <th>Ramo</th>
                            <th>Padrão</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarRamosClientes)){?>
                            <tr>
                                <td colspan="3">Nenhum ramo cadastrado</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarRamosClientes as $lr):?>
                            <tr onClick="editarRamoCliente('<?= $lr['id']?>')">
                                <td><?= $lr['ramo']?></td>
                                <td><?php if($lr['default']==1){ echo "Sim";}else{ echo "Não";}?></td>
                                <td style="width:50px">
                                    <?php if($lr['default']==0){?>
                                        <div class="btn btn-outline-light" onClick="delRamoCliente('<?= $lr['id']?>')">
                                            <i class="fas fa-trash text-danger" title="remover Ramo"></i>
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