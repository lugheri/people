<?php 
if(
    ($origem=="agencia")||
    ($origem=="fonte")||
    ($origem=="indicacao")
){?>
    <label for="complemento">Complemento</label>
    <textarea id="complemento" class="form-control" onBlur="setaOrigem('<?= $idCandidato?>','<?= $origem?>')"><?=$infoOrigem['complemento']?></textarea>
    <?php
}else{?>
    <input type="hidden" id='complemento'>
 <?php

}?>