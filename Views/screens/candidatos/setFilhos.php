<?php 
if($filhos=="S"){?>
    <br/>
    <div class="form-group row">
        <label for="filhos" class="col-sm-4 col-form-label text-right">Quantos?</label>
        <div class="col-sm-8">
            <input type="number" name="filhos" id="filhos" min="1" step="1" required value="1" class="form-control">
        </div>
    </div>
    <?php
}else{?>
     <input type="hidden" name="filhos" value="0"/>
     <?php
}