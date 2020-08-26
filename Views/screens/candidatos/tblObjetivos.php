<table class="table table-bordered table-striped table-hover">
    <thead class="thead-warning">
        <tr>
            <th>Função</th>
            <th>Hierarquia</th>
            <th>Experiencia</th>
            <th>Período</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($listarObjetivos)){?>
            <tr>
                <td colspan='5'>Nenhum objetivo foi informado</td>
            </tr>
            <?php
        }else{
            foreach($listarObjetivos as $o):?>
                <tr>
                    <td><?= $o['idFuncao']?></td>
                    <td><?= $o['idHierarquia']?></td>
                    <td><?= $o['tempo']?></td>
                    <td><?= $o['medidaTempo']?></td>
                    <td style="width:50px">
                        <div class="btn btn-light" title="Remover objetivo"
                             onClick="removerObjetivo('<?= $idCandidato?>','<?= $o['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
        }?>
    </tbody>
</table>