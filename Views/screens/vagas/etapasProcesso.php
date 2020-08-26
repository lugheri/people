<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <small>Etapas do processo seletivo disponíveis</small>
            </div>
            <div class="card-body" style="height:250px; overflow:auto">
                <?php foreach($listarEtapas as $e):
                    if($this->verificaEtapa($idVaga,$e['id'])==false){?>
                        <div class="btn btn-secondary btn-block" 
                             onClick="editaEtapas('<?= $idVaga?>','<?= $e['id']?>','add')"
                             title="Clique para Adicionar">
                            <?= $e['nome']?>
                            <i class="fas fa-arrow-alt-circle-right" style="float:right;margin-top:5px"></i>
                        </div>
                        <?php
                    } 
                endforeach;?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <small>Etapas do processo seletivo Atribuidas</small>
            </div>
            <div class="card-body" style="height:250px; overflow:auto">
                <?php foreach($etapasSelecionadas as $s):?>
                    <div class="btn btn-success btn-block" 
                         onClick="editaEtapas('<?= $idVaga?>','<?= $s['idEtapa']?>','del')"
                         title="Clique para Remover">
                        <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i> <?= $s['nome']?>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>