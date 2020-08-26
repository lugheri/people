<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-user-plus text-info"></i> Novo Usuário</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
    <form method="POST" id="formNovoUsuario">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome" required class="form-control"/>
                </div>
               
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required class="form-control"/>
                </div>
                <div class="col">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" maxlength="14" required class="form-control"
                           onblur="ValidarCPF(formNovoUsuario.cpf)"
                           onkeypress="MascaraCPF(formNovoUsuario.cpf)"/>
                    <small style="display:none" class="form-text text-danger" id='alertaCPF'>
                        <i class="fas fa-times"></i> CPF Inválido!
                    </small>
                </div>
                <div class="col">
                    <label for="nasc">Data Nascimento</label>
                    <input type="date" name="nasc" id="nasc" class="form-control"/>
                </div>
            </div>

            <div class="row">
                <div class='col'>
                    <label for="funcao">Função</label>
                    <select name="funcao" id="funcao" class="form-control form-control-sm">
                        <option value="0">Selecione...</option>
                        <?php foreach($funcoes as $f):?>
                            <option value="<?= $f['id']?>"><?= $f['funcao']?></option>
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
                            <option value="<?= $h['id']?>">
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
                            <option value="<?= $c['id']?>"><?= $c['celula']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="rspSelecao">Responsável Seleção</label>
                    <select name="rspSelecao" id='rspSelecao' class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col">
                    <label for="rspComercial">Responsável Comercial</label>
                    <select name="rspComercial" id="rspComercial" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="perfil">Perfil</label>
                    <select name="perfil" id="perfil" class="form-control">
                        <option value="0">Selecione</option>
                        <?php foreach($perfis as $p):?>
                            <option value="<?= $p['id']?>"><?= $p['perfil']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" onClick="cadastraUsuario()">
                <i class="fas fa-save"></i> Cadastra usuario
            </button>
        </div>
    </form>
</div>