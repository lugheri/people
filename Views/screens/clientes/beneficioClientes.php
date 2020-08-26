<?php if(empty($listarBeneficiosVaga)){?>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <p class="h5 text-muted">Nenhum Benefício disponível</p>
            </div>
        </div>
    </div>    
    <?php
}else{
    foreach($listarBeneficiosVaga as $b):?>
        <div class="col-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <?php 
                        $valor=$this->checkBeneficio($b['id'],$idCliente);
                        if($valor==false){?>
                            <div class="col-2">
                                <div class="btn btn-sm btn-outline-light btn-block" style='cursor:pointer' onClick="addBeneficioCliente('<?= $idCliente?>','<?= $b['id']?>')">
                                    <i class="far fa-square text-secondary"></i>
                                </div>
                            </div>
                            <div class="col text-left">
                                <?= $b['beneficio']?>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="valor">R$</span>
                                    </div>
                                    <input type="text" name='valor' id='valor' disabled class="form-control"/>
                                </div>
                            </div>
                            <?php                                        
                        }else{?>
                            <div class="col-2">
                                <div class="btn btn-sm btn-success btn-block" style='cursor:pointer' onClick="delBeneficioCliente('<?= $idCliente?>','<?= $b['id']?>')">
                                    <i class="far fa-check-square"></i>
                                </div>
                            </div>
                            <div class="col text-left">
                                <?= $b['beneficio']?>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="valor">R$</span>
                                    </div>
                                    <input type="text" name='valor' id='valor_<?= $b['id']?>' value="<?= $valor['valor']?>" class="form-control"
                                    onInput="mascaraValor('valor_<?= $b['id']?>')" onBlur="gravaValorBeneficio(this.value,'<?= $idCliente?>','<?= $b['id']?>')"/>
                                </div>
                            </div>
                            <?php
                        }?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
}?>