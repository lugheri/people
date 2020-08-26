<label for="requisitante">Requisitante <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
<select name="requisitante" id="requisitante" class="form-control"
        onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','requisitante',this.value)">
        <?php 
        if(empty($requisitantes)){?>
            <option value="">Nenhum requisitante disponível para empresa selecionada!</option>
            <?php
        }else{?>
            <option value="">Selecione..</option> 
            <?php foreach($requisitantes as $r):?>
                <option value="<?= $r['id']?>">
                    <?= $r['nome']?>
                </option>
            <?php endforeach;
        }?>
</select>
