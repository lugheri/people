<p class="h4"><i class="fas fa-wrench"></i> Configurar Cliente</p>
<div class="card-telas">
    <div class="card-header-telas">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item-telas">
                <a class="nav-link-telas <?php if($aba=="info"){ echo "active";}?>" onClick="configurarCliente('<?= $infoCliente['id']?>','info')">
                    <i class="fas fa-info"></i> Informações do Cliente
                </a>
            </li>
            <li class="nav-item-telas">
                <a class="nav-link-telas <?php if($aba=="configuracoes"){ echo "active";}?>" onClick="configurarCliente('<?= $infoCliente['id']?>','configuracoes')">
                    <i class="fas fa-cogs"></i>  Configurações
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body card-body-telas">
        <?php 
        if($aba=="info"){?>
            <div class="row">
                <div class="col">
                
                    <?php 
                    if(!empty($error_img)){
                        echo "<small class='text-danger'>
                                <i class='fas fa-exclamation-triangle'></i> Ocorreu um erro ao importar o logo: <b>".$error_img."</b>!
                            </small>";
                    }?>
                </div>
            </div>
            <hr/>
            <form id='form' method="POST">
                <input type="hidden" id="id" name="id" value="<?= $infoCliente['id']?>"/>    
                <div class="row">
                    <div class="col-3">
                        <?= $this->renderImg($infoCliente['logo']);?>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <label for="desde">Desde</label>
                                <input type="date" id="desde" name="desde" value="<?= $infoCliente['desde']?>" class="form-control"/>
                            </div>
                            <div class="col-2">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php if(!empty($infoCliente['status'])){ echo "selected";}?> value="1">Ativa</option>
                                    <option <?php if(empty($infoCliente['status'])){ echo "selected";}?> value="0">Inativa</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="link">Link</label>
                                <input type="text" id="link" name="link" value="<?= $infoCliente['nomeLink']?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nome" title="Campo Obrigatório">Nome<b class="text-danger">*</b></label>
                                <input type="text" id="nome" name="nome" value="<?= $infoCliente['nome']?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="descricao">Descrição</label>
                                <textarea id="descricao" name="descricao" class="form-control"><?= $infoCliente['descricao']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success" onClick="salvarAlteracoes()">
                            <i class="fas fa-save"></i> Salvar Alterações Cadastro
                        </button>
                    </div>
                </div>
            </form>   
            <?php 
        }

        else if($aba=="configuracoes"){?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <p class="h5">Página de candidatos</p>
                        <small class="text-muted">Configure a página de candidatos do seu site</small>
                        </div>
                        <div class="col-4">
                            <a target="blank" href="<?= LINK ?>editorPagina/inicio/<?= base64_encode($infoCliente['id'].':'.$infoCliente['nome'])?>" class="btn btn-info btn-block">
                                <i class="fas fa-paint-brush"></i> Editar Página
                            </a>
                        </div>
                    </div>
                    
                  


                </div>
            </div>
            <?php
        }?>
    </div>
</div>    