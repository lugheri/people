<?php 
if(!empty($erro)){?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i> Ocorreu um erro ao importar seu arquivo:</strong> 
        <?= $erro?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}?>

<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Nome do Arquivo</th>
            <th>Tipo</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($arquivosVaga)){?>
            <tr>
                <td colspan='4'>Nenhum arquivo anexado</td>
            </tr>
            <?php    
        }else{
            foreach($arquivosVaga AS $a):?>
                <tr>
                    <td><?= $a['nome'].' - '.$a['descricao']?></td>
                    <td><?= $a['tipo']?></td>
                    <td style="width:50px">
                        <a class="btn btn-outline-info" href="<?= BASE_URL.$a['arquivo']?>" target="_blank" title="Abrir/Baixar">
                            <i class="fas fa-folder-open"></i>
                        </a>
                    </td>
                    <td style="width:50px">
                        <div class="btn btn-light" title="Excluir"
                             onClick="removerArquivo('<?= $idVaga?>','<?= $a['id']?>','<?= $a['arquivo']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
                <?php 
            endforeach;
        }?>
    </tbody>
</table>