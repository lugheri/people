<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Área de Conhecimento</th>
            <th>Nível</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(empty($areasInformatica)){?>
            <tr>
                <td colspan='3'>Nenhuma área requerida</td>
            </tr>
            <?php
        }else{
            foreach($areasInformatica as $area):?>
                <tr>
                    <td><?= $area['area']?></td>
                    <td><?= $area['nivel']?></td>
                    <td style="width:50px">
                        <div class="btn btn-light" title="Excluir"
                             onClick="removerAreaInformatica('<?= $idVaga?>','<?= $area['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
        }?>
    </tbody>
</table>