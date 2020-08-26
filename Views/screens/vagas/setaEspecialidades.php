<label for="especialidade">Especialidade <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="top" title="."></i></label>
<select name="especialidade" id="especialidade" class="form-control"
        onChange="gravaCampoVaga('<?= $idVaga?>','vagas_informacoes','especialidade',this.value)">
        <?php 
        if(empty($especialidades)){?>
            <option value="">Nenhuma especialidade disponível para função selecionada!</option>
            <?php
        }else{?>
            <option value="">Selecione..</option> 
            <?php foreach($especialidades as $e):?>
                <option value="<?= $e['id']?>">
                    <?= $e['especialidade']?>
                </option>
            <?php endforeach;
        }?>
</select>