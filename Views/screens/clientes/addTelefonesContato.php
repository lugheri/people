<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-phone text-info"></i> Telefones do Contato</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formTelefoneContato">
            <input type="hidden" name="idContato" value="<?= $idContato?>" required class="form-control"/>        
            <div class="row">
                <div class="col-2">
                    <label for="ddd">DDD</label>
                    <input type="text" name="ddd" id="ddd" required class="form-control" maxlength="2"
                           onkeypress="MascaraDDD(formTelefoneContato.ddd)"/>
                </div>
                <div class="col">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" required class="form-control"  maxlength="10"
                           onkeypress="MascaraTEL(formTelefoneContato.numero)"/>
                </div>
                <div class="col-4">
                    <label for="ramal">Ramal</label>
                    <input type="text" name="ramal" id="ramal" class="form-control"/>
                </div>
            </div>
            <div class="row">    
                <div class="col">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="">Selecione...</option>
                        <option value="Nenhum">Nenhum</option>
                        <option value="Direto">Direto</option>
                        <option value="Residencial">Residencial</option>
                        <option value="Celular">Celular</option>
                        <option value="Recado">Recado</option>
                        <option value="Comercial">Comercial</option>
                        <option value="PABX">PABX</option>                  
                    </select>
                </div>
            
                <div class="col">
                    <button type="submit" class="btn btn-info btn-block" onClick="gravaTelefoneContato()" style="margin-top:30px">
                        <i class="fas fa-plus"></i> Incluir telefone
                    </button>
                </div>
            </div>
        </form>
        <br/>
        <table class="table table-sm table-striped table-hover table-bordered">
            <tHead class="thead-warning">
                <tr>
                    <th><small>Número</small></th>
                    <th><small>Ramal</small></th>
                    <th><small>Tipo</small></th>
                    <th style="width:50px"></th>
                </tr>
            </tHead>
            <tBody>
                <?php 
                if(empty($telefones)){?>
                    <tr>
                        <td colspan="4">Nenhum telefone cadastrado</td>
                    </tr>
                    <?php
                }else{
                    foreach($telefones as $t):?>
                        <tr>
                            <td>(<?=$t['ddd'].') '.$t['numero']?></td>
                            <td><?=$t['ramal']?></td>
                            <td><?=$t['tipo']?></td>
                            <td style="width:50px">
                                <div class="btn btn-sm btn-light" title="Remover Telefone" onClick="removerTelefoneContato('<?= $idContato?>','<?= $t['id']?>')">
                                    <i class="fas fa-trash text-danger"></i>
                                </div>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }?>
            </tBody>
        </table>
    </div>
    <div class="modal-footer">
           
    </div>
</div>