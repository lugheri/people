<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Editar Célula</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formCelulaUsuario">
            <input type="hidden" name="idCelula" id="idCelula" value="<?= $infoCelula['id']?>" required class="form-control"/> 
            <div class="row">
                <div class="col-8">
                    <label for="celula">Célula</label>
                    <input type="text" name="celula" id="celula" value="<?= $infoCelula['celula']?>" required class="form-control"/>    
                </div>
                
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:30px" onClick="salvaCelulaUsuario()">
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
                            <th>Célula</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarCelulasUsuarios)){?>
                            <tr>
                                <td colspan="2">Nenhuma célula cadastrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarCelulasUsuarios as $c):?>
                            <tr <?php if($infoCelula['id']==$c['id']){ echo 'class="bg-warning"';}?> onClick="editarCelulaUsuario('<?= $c['id']?>')">
                                <td><?= $c['celula']?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delCelulaUsuario('<?= $c['id']?>')">
                                        <i class="fas fa-trash text-danger" title="Remover Célula"></i>
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