<div class="col">
    <div class="card">
        <div class="card-header">
            <p class="h6">Formas de Contratação Disponíveis</p>
        </div>
        <div class="card-body text-center">
            <?php if(empty($listarFormasContratacao)){?>
                <small class="text-muted">Nenhuma forma disponível</small>
                <?php
            }else{?>
                <small class="text-muted">Clique para adicionar</small>
                <?php
                foreach($listarFormasContratacao as $f):
                    if(empty($this->checkFormaContratacao($f['id'],$idCliente))){?>
                        <div class="btn btn-outline-info btn-block" onClick="addFormaContratacaoCli('<?= $idCliente?>','<?= $f['id']?>')">
                            <?= $f['forma']?>
                            <i class="fas fa-arrow-alt-circle-right" style="float:right;margin-top:5px"></i>
                        </div>
                        <?php 
                    }
                endforeach;
            }?>
        </div>
    </div>
</div>

<div class="col">
    <div class="card">
        <div class="card-header">
            <p class="h6">Formas de Contratação Selecionadas</p>
        </div>    
        <div class="card-body text-center">
            <?php if(empty($formasContratacaoSelecionadas)){?>
                <small class="text-muted">Nenhuma forma selecionada</small>
                <?php
            }else{?>
                <small class="text-muted">Clique para remover</small>
                <?php
                foreach($formasContratacaoSelecionadas as $f):?>
                    <div class="btn btn-success btn-block" onClick="delFormaContratacaoCli('<?= $idCliente?>','<?= $f['id']?>')">
                        <?= $f['forma']?>
                        <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i>
                    </div>
                    <?php 
                endforeach;
            }?>
        </div>
    </div>
</div>