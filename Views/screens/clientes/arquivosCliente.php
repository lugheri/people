<?php 
if(!empty($erro)){?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ocorreu um erro ao importar o arquivo!</strong> <?= $erro?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}?>
<table class="table table-sm table-striped table-hover table-bordered">
    <tHead class="thead-warning">
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th style="width:50px"></th>
        </tr>
    </tHead>
    <tBody>
        <?php 
        if(empty($arquivos)){?>
            <tr>
                <td colspan="5">Nenhum arquivo importado</td>
            </tr>
            <?php
        }else{
            foreach($arquivos as $a):?>
                <tr>
                    <td><?=$a['nome']?></td>
                    <td><?=$a['tipo']?></td>
                    <td style="width:50px">
                        <div class="btn btn-sm btn-light" title="Remover Arquivo" onClick="delArquivo('<?= $idCliente?>','<?= $a['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;
        }?>
    </tBody>
</table>