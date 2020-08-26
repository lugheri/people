<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Origem do Cliente</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formOrigemCliente">
            <div class="row">
                <div class="col-8">
                    <label for="origem">Origem</label>
                    <input type="text" name="origem" id="origem" required class="form-control"/>    
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:30px" onClick="addOrigemCliente()">
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
                            <th>Origem</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarOrigensClientes)){?>
                            <tr>
                                <td colspan="3">Nenhuma origem cadastrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarOrigensClientes as $lo):?>
                            <tr>
                                <td><?= $lo['origem']?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delOrigemCliente('<?= $lo['id']?>')">
                                        <i class="fas fa-trash text-danger" title="removerOrigem"></i>
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