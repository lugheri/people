<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Editar Especialidades</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formEspecialidadeVaga">
            <input type="hidden" name="idEspecialidade" id="idEspecialidade" value="<?= $infoEspecialidade['id']?>" />
            <div class="row">
                <div class="col-5">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade" id="especialidade"  value="<?= $infoEspecialidade['especialidade']?>" required class="form-control"/>    
                </div>
                <div class="col">
                    <label for="funcao">Função</label>
                    <select name="funcao" id="funcao" required class="form-control">
                        <option value="">Selecione</option>
                        <?php foreach($listarFuncoesVagas as $f):?>
                            <option <?php if($infoEspecialidade['idFuncao']==$f['id']){ echo "selected";}?> value="<?= $f['id']?>"><?= $f['funcao']?></option>
                        <?php endforeach;?>
                    </select>    
                </div>
               
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:30px" onClick="salvarEspecialidadeVaga()">
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
                            <th>Especialidade</th>
                            <th>Função</th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php     
                        if(empty($listarEspecialidadesVagas)){?>
                            <tr>
                                <td colspan="3">Nenhuma especialidade cadastrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarEspecialidadesVagas as $e):?>
                                <tr <?php if($infoEspecialidade['id']==$e['id']){ echo 'class="bg-warning"';}?> onClick="editarEspecialidadeVaga('<?= $e['id']?>')">
                                    <td><?= $e['especialidade']?></td>
                                    <td><?= $this->nomeFuncao($e['idFuncao'])?></td>
                                    <td style="width:50px">
                                        <div class="btn btn-outline-light" onClick="delEspecialidadeVaga('<?= $e['id']?>')">
                                            <i class="fas fa-trash text-danger" title="Remover Especialidade"></i>
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