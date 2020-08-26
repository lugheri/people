<table class="table table-bordered table-striped table-hover table-sm">
    <thead class="thead-warning">
        <tr>
            <th>Escolaridade</th>
            <th>Instituição</th>
            <th>Curso</th>
            <th>Inicio</th>
            <th>Término</th>
            <th>Horário</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($escolaridadeCandidato)){?>
            <tr>
                <td colspan='5'>Nenhum curso foi informado</td>
            </tr>
            <?php
        }else{
            foreach($escolaridadeCandidato as $e):?>
                <tr>
                    <td><?= $e['escolaridade']?></td>
                    <td><?= $e['instituicao']?></td>
                    <td><?= $e['curso']?></td>
                    <td><?= date('m/Y', strtotime($e['inicio']))?></td>
                    <td><?= date('m/Y', strtotime($e['termino']))?></td>
                    <td><?= $e['horario']?></td>
                    <td style="width:50px">
                        <div class="btn btn-light" title="Remover curso"
                             onClick="delEscolaridade('<?= $idCandidato?>','<?= $e['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
        }?>
    </tbody>
</table>