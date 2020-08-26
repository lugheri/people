<table class="table table-sm table-striped table-hover table-bordered">
    <tHead class="thead-warning">
        <tr>
            <th>Nome</th>
            <th>Aniversário</th>
            <th>E-mail</th>
            <th>Função</th>
            <th style="width:50px"></th>
        </tr>
    </tHead>
    <tBody>
        <?php 
        if(empty($contatosCliente)){?>
            <tr>
                <td colspan="5">Nenhum contato cadastrado</td>
            </tr>
            <?php
        }else{
            foreach($contatosCliente as $c):?>
                <tr onClick="editaContato('<?= $idCliente?>','<?= $c['id']?>')">
                    <td><?=$c['nome']?></td>
                    <td><?=date('d/m', strtotime($c['nasc']))?></td>
                    <td><?=$c['email']?></td>
                    <td><?= $this->nomeFuncao($c['funcao'])?></td>
                    <td style="width:50px">
                        <div class="btn btn-sm btn-light" title="Remover Contato" onClick="delContato('<?= $idCliente?>','<?= $c['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;
        }?>
    </tBody>
</table>