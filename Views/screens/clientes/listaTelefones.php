<table class="table table-sm table-striped table-hover table-bordered">
    <tHead class="thead-warning">
        <tr>
            <th>DDD</th>
            <th>Número</th>
            <th>Ramal</th>
            <th>Tipo</th>
            <th>Principal</th>
            <th>Contato</th>
            <th style="width:50px"></th>
        </tr>
    </tHead>
    <tBody>
        <?php 
        if(empty($telefones)){?>
            <tr>
                <td colspan="6">Nenhum telefone cadastrado</td>
            </tr>
            <?php
        }else{
            foreach($telefones as $t):?>
                <tr>
                    <td><?=$t['ddd']?></td>
                    <td><?=$t['numero']?></td>
                    <td><?=$t['ramal']?></td>
                    <td><?=$t['tipo']?></td>
                    <td><?php if($t['principal']==1){ echo "Sim";}else{ echo "Não";}?></td>
                    <td><?=$t['contato']?></td>
                    <td style="width:50px">
                        <div class="btn btn-sm btn-light" title="Remover Telefone" onClick="removerTelefone('<?= $idCliente?>','<?= $t['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;
        }?>
    </tBody>
</table>