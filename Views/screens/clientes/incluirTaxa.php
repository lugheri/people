<?php 
if($tipoTaxa=="taxa"){?>
    <div class="modal-content">
        <div class="modal-header">
            <p class="h5 modal-title"><i class="fas fa-plus-circle text-info"></i> Taxas</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" id="formTaxa">
            <input type="hidden" name="idCliente" value="<?= $idCliente?>"/>
            <input type="hidden" name="tipo" value="taxa"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="contratacao">Contratação</label>
                        <select name="contratacao" id="contratacao" require class="form-control">
                            <option value="">Selecione...</option>
                            <?php 
                            if(!empty($formasContratacao)){
                                foreach($formasContratacao as $f):?>
                                    <option value="<?= $f['forma']?>"><?= $f['forma']?></option>
                                <?php
                                endforeach;
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="valorTaxaTipo">Tipo Taxa</label>
                        <select name="valorTaxaTipo" id="valorTaxaTipo" class="form-control">
                            <option value="">Selecione...</option>
                            <option value="R$">R$</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="valorTaxa">Taxa</label>
                        <input type="text" name="valorTaxa" id="valorTaxa" class="form-control"
                            onkeypress="MascaraDecimal(formTaxa.valorTaxa)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="encargoTipo">Tipo Encargo</label>
                        <select name="encargoTipo" id="encargoTipo" class="form-control">
                            <option value="">Selecione...</option>
                            <option value="R$">R$</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="encargo">Encargo</label>
                        <input type="text" name="encargo" id="encargo" class="form-control"
                            onkeypress="MascaraDecimal(formTaxa.encargo)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="tributoTipo">Tipo Tributo</label>
                        <select name="tributoTipo" id="tributoTipo" class="form-control">
                            <option value="">Selecione...</option>
                            <option value="R$">R$</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="tributo">Tributo</label>
                        <input type="text" name="tributo" id="tributo" class="form-control"
                            onkeypress="MascaraDecimal(formTaxa.tributo)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="tipoVaga">Tipo Vaga</label>
                        <select name="tipoVaga" id="tipoVaga" class="form-control">
                            <option value="">Selecione...</option>
                            <?php 
                            if(!empty($tipoVaga)){
                                foreach($tipoVaga as $v):?>
                                    <option value="<?= $v['tipoVaga']?>"><?= $v['tipoVaga']?></option>
                                <?php
                                endforeach;
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="prazo">Prazo</label>
                        <textarea name="prazo" id="prazo" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" id="observacoes" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class='btn btn-outline-secondary' data-dismiss="modal">
                    Cancelar
                </div>
                <button type="submit" class='btn btn-success' onClick="salvaTaxa('formTaxa')">
                    <i class="fas fa-check"></i> Incluir Taxa
                </button>
            </div>
            
        </form>
    </div>
    <?php    
}
if($tipoTaxa=="especial"){?>
    <div class="modal-content">
        <div class="modal-header">
            <p class="h5 modal-title"><i class="fas fa-plus-circle text-info"></i> Taxas Especiais</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" id="formTaxa">
            <input type="hidden" name="idCliente" value="<?= $idCliente?>"/>
            <input type="hidden" name="tipo" value="taxaEspecial"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="contratacao">Contratação</label>
                        <select name="contratacao" id="contratacao" required class="form-control">
                            <option value="">Selecione...</option>
                            <?php 
                            if(!empty($formasContratacao)){
                                foreach($formasContratacao as $f):?>
                                    <option value="<?= $f['forma']?>"><?= $f['forma']?></option>
                                <?php
                                endforeach;
                            }?>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="taxaEspecial">Taxa</label>
                        <select name="taxaEspecial" id="taxaEspecial" required class="form-control">
                            <option value="">Selecione...</option>
                            <option value="Brinde">Brinde</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="valorTaxaTipo">Tipo Taxa</label>
                        <select name="valorTaxaTipo" id="valorTaxaTipo" class="form-control">
                            <option value="">Selecione...</option>
                            <option value="R$">R$</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="valorTaxa">Valor</label>
                        <input type="text" name="valorTaxa" id="valorTaxa" class="form-control"
                            onkeypress="MascaraDecimal(formTaxa.valorTaxa)"/>
                    </div>
                </div>               
            </div>
            <div class="modal-footer">
                <div class='btn btn-outline-secondary' data-dismiss="modal">
                    Cancelar
                </div>
                <button type="submit" class='btn btn-success' onClick="salvaTaxa('formTaxa')">
                    <i class="fas fa-check"></i> Incluir Taxa Especial
                </button>  
            </div>            
        </form>
    </div>
    <?php 
}?>