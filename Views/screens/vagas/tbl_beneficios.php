<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Benefício</th>
            <th>Valor</th>
            <th style="height:50px"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($beneficios)){?>
            <tr>   
                <td colspan='3'>Nenhum benefício cadastrado</td>
            </tr>
            <?php
        }else{
            foreach($beneficios as $b):?>
                <tr>
                    <td><?= $b['beneficio']?></td>
                    <td><?= $b['valor']?></td>
                    <td style="height:50px">
                        <div class="btn btn-sm btn-outline-light" onClick="removerBeneficioVaga('<?= $idVaga ?>','<?= $b['id'] ?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;    
        }?>
    </tbody>
</table>