<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Configurar Especialidades</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formEspecialidadeVaga">
            <div class="row">
                <div class="col-5">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade" id="especialidade" required class="form-control"/>    
                </div>
                <div class="col">
                    <label for="funcao">Função</label>
                    <select name="funcao" id="funcao" required class="form-control">
                        <option value="">Selecione</option>
                        <?php foreach($listarFuncoesVagas as $f):?>
                            <option value="<?= $f['id']?>"><?= $f['funcao']?></option>
                        <?php endforeach;?>
                    </select>    
                </div>
               
                <div class="col">
                    <button type="submit" class="btn btn-outline-success btn-block" style="margin-top:30px" onClick="addEspecialidadeVaga()">
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
                                <tr onClick="editarEspecialidadeVaga('<?= $e['id']?>')">
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