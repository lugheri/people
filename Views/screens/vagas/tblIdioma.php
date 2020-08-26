<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Idioma</th>
            <th>Nível</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($idiomaVaga)){?>
            <tr>
                <td colspan='3'>Nenhum idioma selecionado</td>
            </tr>
            <?php
        }else{
            foreach($idiomaVaga as $idm):?>
                <tr>
                    <td><?= $idm['idioma']?></td>
                    <td><?= $idm['nivel']?></td>
                    <td style="width:50px">
                        <div class="btn btn-light" title="Excluir"
                             onClick="removerIdiomas('<?= $idVaga?>','<?= $idm['id']?>')">
                            <i class="fas fa-trash text-danger"></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach;
        }?>                                               
    </tbody>
</table>