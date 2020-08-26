<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-wrench text-secondary" aria-hidden="true"></i> Editar Perfil</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formPerfilUsuario">
            <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $infoPerfil['id']?>" required class="form-control"/> 
            <div class="row">
                <div class="col-8">
                    <label for="perfil">Perfil</label>
                    <input type="text" name="perfil" id="perfil" value="<?= $infoPerfil['perfil']?>" required class="form-control"/>    
                </div>
                
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block" style="margin-top:30px" onClick="salvaPerfilUsuario()">
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
                            <th>Perfil</th>
                            <th style="width:50px"></th>
                            <th style="width:50px"></th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($listarPerfisUsuarios)){?>
                            <tr>
                                <td colspan="3">Nenhuma perfil cadastrado</td>
                            </tr>
                            <?php
                        }else{
                            foreach($listarPerfisUsuarios as $p):?>
                            <tr <?php if($infoPerfil['id']==$p['id']){ echo 'class="bg-warning"';}?> onClick="editarPerfilUsuario('<?= $p['id']?>')">
                                <td><?= $p['perfil']?></td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="configurarPerfilUsuario('<?= $p['id']?>')">
                                        <i class="fas fa-wrench text-info" title="Configurar Perfil"></i>
                                    </div>
                                </td>
                                <td style="width:50px">
                                    <div class="btn btn-outline-light" onClick="delPerfilUsuario('<?= $p['id']?>')">
                                        <i class="fas fa-trash text-danger" title="Remover Perfil"></i>
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