<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Formas de Contratação</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formFormaContratacaoVaga">
            <input type="hidden" name="idForma" id="idForma" value="<?= $infoForma['id']?>"/>
            <div class="row">
                <div class="col-8">
                    <label for="forma">Forma de Contratação</label>
                    <input type="text" name="forma" id="forma" value="<?= $infoForma['forma']?>" required class="form-control"/>    
                </div>
               
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:30px" onClick="salvarFormaContratacaoVaga()">
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
                            <th>Forma</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php     
                        if(empty($listarFormaContratacaoVagas)){?>
                            <tr>
                                <td colspan="2">Nenhuma forma de contratação cadastrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarFormaContratacaoVagas as $f):?>
                                <tr <?php if($infoForma['id']==$f['id']){ echo 'class="bg-warning"';}?> onClick="editarFormaContratacaoVaga('<?= $f['id']?>')">
                                    <td><?= $f['forma']?></td>
                                    <td style="width:50px">
                                        <div class="btn btn-outline-light" onClick="delFormaContratacaoVaga('<?= $f['id']?>')">
                                            <i class="fas fa-trash text-danger" title="Remover Forma"></i>
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