<table class="table table-sm table-striped table-hover table-bordered">
    <tHead class="thead-warning">
        <tr>
            <th>Endereço</th>
            <th>Nº</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Ônibus</th>
            <th>Principal</th>
            <th>Faturamento</th>
            <th style="width:50px"></th>
        </tr>
    </tHead>
    <tBody>
        <?php 
        if(empty($enderecoCliente)){?>
            <tr>
                <td colspan="8">Nenhum Endereço cadastrado</td>
            </tr>
            <?php
        }else{
            foreach($enderecoCliente as $e):?>
                <tr>
                    <td><?=$e['logradouro']?></td>
                    <td><?=$e['numero']?></td>
                    <td><?=$e['bairro']?></td>
                    <td><?=$e['cidade'].'-'.$e['estado']?></td>
                    <td><?=$e['onibus']?></td>
                    <td><?php if($e['endPrincipal']==1){ echo "Sim";}else{ echo "Não";}?></td>
                    <td><?php if($e['endFaturamento']==1){ echo "Sim";}else{ echo "Não";}?></td>
                    <td style="width:50px">
                        <div class="btn btn-sm btn-light" title="Remover Endereço" onClick="delEndereco('<?= $idCliente?>','<?= $e['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;
        }?>
    </tBody>
</table>