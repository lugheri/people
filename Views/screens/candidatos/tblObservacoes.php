<table class="table table-sm table-striped table-hover">
    <tHead class="thead-warning">
        <tr>
            <th>Data</th>
            <th>Responsável</th>
            <th>Observação</th>
        </tr>
    </tHead>
    <tBody>
        <?php 
        if(empty($observacoes)){?>
            <tr>
                <td colspan="3">Nenhuma observação registrada</td>
            </tr>
            <?php
        }else{
            foreach($observacoes as $o):?>
                <tr>
                    <td><?= date('d/m/Y', strtotime($o['data']))?></td>
                    <td><?= $o['nome']?></td>
                    <td><?= $o['observacao']?></td>
                </tr>
            <?php endforeach;
        }?>
    </tBody>
</table>