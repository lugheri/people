<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Tipos de Histórico do Cliente</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formHistoricoCliente">
            <div class="row">
                <div class="col-2">
                    <label for="cod">Cód.</label>
                    <input type="text" name="cod" id="cod" required class="form-control"/>    
                </div>
                <div class="col">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" required class="form-control"/>    
                </div>
                <div class="col-3">
                    <label for="visita">Visita</label>
                    <select type="text" name="visita" id="visita" required class="form-control">
                        <option value="">Selecione...</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>    
                </div>
            </div>
            <div class="row">    
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:15px" onClick="addHistoricoCliente()">
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
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Visita</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarHistoricosClientes)){?>
                            <tr>
                                <td colspan="4">Nenhum tipo de histórico cadastrado</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarHistoricosClientes as $lh):?>
                            <tr>
                                <td><?= $lh['cod']?></td>
                                <td><?= $lh['descricao']?></td>
                                <td><?= $lh['visita']?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delHistoricoCliente('<?= $lh['id']?>')">
                                        <i class="fas fa-trash text-danger" title="remover histórico"></i>
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