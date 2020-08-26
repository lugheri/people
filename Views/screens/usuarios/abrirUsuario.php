<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-user-edit text-info"></i> Dados do Usuário</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
    <form method="POST" id="formEditaUsuario">
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $infoUser['id']?>" required class="form-control"/>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome" value="<?= $infoUser['nome']?>" required class="form-control"/>
                </div>
               
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="<?= $infoUser['email']?>" required class="form-control"/>
                </div>
                <div class="col">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" maxlength="14" required value="<?= $infoUser['cpf']?>" class="form-control"
                           onblur="ValidarCPF(formEditaUsuario.cpf)"
                           onkeypress="MascaraCPF(formEditaUsuario.cpf)"/>
                    <small style="display:none" class="form-text text-danger" id='alertaCPF'>
                        <i class="fas fa-times"></i> CPF Inválido!
                    </small>
                </div>
                <div class="col">
                    <label for="nasc">Data Nascimento</label>
                    <input type="date" name="nasc" id="nasc" value="<?= $infoUser['nasc']?>" class="form-control"/>
                </div>
            </div>

            <div class="row">
                <div class='col'>
                    <label for="funcao">Função</label>
                    <select name="funcao" id="funcao" class="form-control form-control-sm">
                        <option value="0">Selecione...</option>
                        <?php foreach($funcoes as $f):?>
                            <option <?php if($infoUser['funcao']==$f['id']){ echo "selected";}?> value="<?= $f['id']?>"><?= $f['funcao']?></option>
                            <?php 
                        endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <label for="especialidade">Especialidade</label>
                    <select name="especialidade" id="especialidade" class="form-control form-control-sm">
                        <option value="0">Selecione...</option>
                    </select> 
                </div>
                <div class="col">
                    <label for="hierarquia">Hierarquia</label>
                    <select name="hierarquia" id="hierarquia" class="form-control form-control-sm">
                        <option value="0">Selecione...</option>
                        <?php foreach($hierarquias as $h):?>
                            <option <?php if($infoUser['hierarquia']==$h['id']){ echo "selected";}?> value="<?= $h['id']?>">
                                <?= $h['hierarquia']?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <label for="celula">Célula</label>
                    <select name="celula" id="celula" class="form-control form-control-sm">
                        <option value="0">Selecione...</option>
                        <?php foreach($celulas as $c):?>
                            <option <?php if($infoUser['celula']==$c['id']){ echo "selected";}?> value="<?= $c['id']?>"><?= $c['celula']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="rspSelecao">Responsável Seleção</label>
                    <select name="rspSelecao" id='rspSelecao' class="form-control">
                        <option <?php if($infoUser['rspSelecao']=="0"){ echo "selected";}?> value="0">Não</option>
                        <option <?php if($infoUser['rspSelecao']=="1"){ echo "selected";}?> value="1">Sim</option>
                    </select>
                </div>
                <div class="col">
                    <label for="rspComercial">Responsável Comercial</label>
                    <select name="rspComercial" id="rspComercial" class="form-control">
                        <option <?php if($infoUser['rspComercial']=="0"){ echo "selected";}?> value="0">Não</option>
                        <option <?php if($infoUser['rspComercial']=="1"){ echo "selected";}?> value="1">Sim</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="perfil">Perfil</label>
                    <select name="perfil" id="perfil" class="form-control">
                        <option value="0">Selecione</option>
                        <?php foreach($perfis as $p):?>
                            <option <?php if($infoUser['perfil']==$p['id']){ echo "selected";}?> value="<?= $p['id']?>"><?= $p['perfil']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col" id="salvaUsuario">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-outline-secondary" href="<?= LINK?>usuarios">Fechar</a>
            <div class="btn btn-outline-danger"><i class="fas fa-power-off"></i> Desativar Usuário</div>
            <div class="btn btn-outline-info" onClick="resetarSenhaUsuario('<?= $infoUser['id']?>')"><i class="fas fa-retweet"></i> Reset de Senha</div>
            <button type="submit" class="btn btn-success" onClick="salvaAlteracoesUsuario()">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>
        </div>
    </form>
</div>