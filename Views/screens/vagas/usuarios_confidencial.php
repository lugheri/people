<?php
if($caracteristicasVaga['confidencial']=="1"){;?>
    <br/>
    <div class="row">
        <div class="col-10 offset-1" id='tblSelecionadores'>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small>Selecionadores disponíveis</small>
                        </div>
                        <div class="card-body" style="height:250px; overflow:auto">
                            <?php foreach($listarUsuarios as $u):
                                //if($this->verificaSelecionador($idVaga,$u['id'])==false){?>
                                    <div class="btn btn-secondary btn-block" 
                                         onClick="editaSelecionador('<?= $idVaga?>','<?= $u['id']?>','add')"
                                         title="Clique para Adicionar">
                                             <?= $u['nome']?>
                                             <i class="fas fa-arrow-alt-circle-right" style="float:right;margin-top:5px"></i>
                                    </div>
                                    <?php
                                //} 
                             endforeach;?>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <small>Selecionadores responsáveis</small>
                        </div>
                        <div class="card-body" style="height:250px; overflow:auto">
                            <?php /* foreach($selecionadores as $s):?>
                                <div class="btn btn-success btn-block" 
                                    onClick="editaSelecionador('<?= $idVaga?>','<?= $s['idSelecionador']?>','del')"
                                    title="Clique para Remover">
                                    <i class="fas fa-arrow-alt-circle-left" style="float:left;margin-top:5px"></i> <?= $s['nome']?>
                                </div>
                            <?php endforeach;*/?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}?>