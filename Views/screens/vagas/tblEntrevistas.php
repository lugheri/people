<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Local</th>
            <th>Contato</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($entrevistasVaga)){?>
            <tr>
                <td colspan='5'>Nenhuma entrevista agendendada</td>
            </tr>
        <?php
        }else{
            foreach($entrevistasVaga as $e):?>
                <tr>
                    <td><?= date('d/m/Y', strtotime($e['data']))?></td>
                    <td><?= $e['hora']?></td>
                    <td><?= $e['local']?></td>
                    <td><?= $e['contato']?></td>
                    <td style="width:50px">
                            <div class="btn btn-light" title="Excluir"
                                onClick="removerEntrevista('<?= $idVaga?>','<?= $e['id']?>')">
                                <i class="fas fa-trash text-danger"></i>
                            </div>
                        </td>
                </tr>
            <?php endforeach;
        }?>
    </tbody>
</table>