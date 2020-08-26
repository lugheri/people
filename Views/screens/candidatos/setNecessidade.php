<?php 
if($necessidade=="S"){?>
    <div class="row">
        <div class="col">
            <label class="lbl" for="tipoNecessidade">Qual seu tipo de necessidade especial? <b class="text-danger">*</b></label>
            <input type="text" name="tipoNecessidade" required id="tipoNecessidade" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label class="lbl" for="infoNecessidade">Insira o número CID e descreva qual é a sua limitação</label>
            <textarea name="infoNecessidade" id="infoNecessidade" class="form-control" placeholder=""></textarea>
        </div>
    </div>
    <?php
}else{?>
    <input type="hidden" name="tipoNecessidade" value=""/>
    <input type="hidden" name="infoNecessidade" value=""/>
    <?php
}