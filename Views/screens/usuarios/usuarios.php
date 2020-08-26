<div class="row">
    <div class="col">
        <small class="text-muted">Gerênciamento de Usuários</small>
    </div>
    <div class="col">
        <div class="input-group">
            <input type="text" name="buscaUsuario" id="buscaUsuario" placeholder="Buscar Usuário" class="form-control"/>
            <div class="input-group-append">
                <div class="btn btn-outline-info"><i class="fas fa-search"></i></div>
            </div>
        </div>
    </div>
    <div class="col-2 text-right">
        <div class="btn btn-info btn-block" onClick="novoUsuario()">
            <i class="fas fa-user-plus"></i> Novo Usuário
        </div>
    </div>    
</div>
<hr/>
<div class="row">
    <div class="col">
        <table class="table table-bordered table-striped table-hover">
            <tHead class="thead-warning">
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Função</th>
                    <th>Resp. Seleção</th>
                    <th>Resp. Comercial</th>
                    <th>Perfil</th>
                    <th style="width:50px"></th>
                </tr>
            </tHead>
            <tBody>
                <?php 
                if(empty($usuarios)){?>
                    <tr>
                        <td colspan='8'>Nenhum usuário cadastrado</td>
                    </tr>
                    <?php
                }else{
                    foreach($usuarios as $u):?>
                        <tr>
                            <td><?= $u['id']?></td>
                            <td><?= $u['nome']?></td>
                            <td><?= $u['email']?></td>
                            <td><?= $this->nomeFuncao($u['funcao'])?></td>
                            <td><?php if($u['rspSelecao']=="1"){ echo "Sim";}else{ echo "Não";}?></td>
                            <td><?php if($u['rspComercial']=="1"){ echo "Sim";}else{ echo "Não";}?></td>
                            <td><?= $this->nomePerfil($u['perfil'])?></td>
                            <td style="width:50px">
                                <div class="btn btn-outline-info btn-sm" title="Abrir Usuário" onClick="abrirUsuario('<?= $u['id']?>')">
                                    <i class="fas fa-folder-open"></i>
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