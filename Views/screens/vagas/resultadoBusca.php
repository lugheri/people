
<BR/>
<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Data Cadastro</th>
            <th>Título</th>
            <th>Nº Vagas</th>
            <th>Cliente</th>
            <th>Filial</th>
            <th>R</th>
            <th>S</th>
            <th>E</th>
            <th>Apt</th>
            <th>Etp</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(empty($resultadoBusca)){?>
            <tr>
                <td colspan='11'>Nenhuma vaga localizada pelos parâmetros informados</td>
            </tr>
            <?php    
        }else{
            foreach($resultadoBusca AS $r):?>
                <tr style='cursor:pointer' title="Clique para iniciar o processo seletivo" onClick="processoSeletivo('<?= $r['id']?>','vagas')">
                    <td><?= $r['id']?></td>
                    <td><?= date('d/m/Y', strtotime($r['dataCadastro']))?></td>
                    <td><?= $r['titulo']?></td>
                    <td><?= $r['numeroVagas']?></td>
                    <td><?= $r['nome']?></td>
                    <td></td>
                    <td><?= $this->candidatosPorFaseVaga($r['id'],'Recebido')?></td>
                    <td><?= $this->candidatosPorFaseVaga($r['id'],'Selecionado')?></td>
                    <td><?= $this->candidatosPorFaseVaga($r['id'],'Encaminhado')?></td>
                    <td><?= $this->candidatosPorFaseVaga($r['id'],'Apto')?></td>
                    <td></td>
                </tr>
                <?php 
            endforeach;
        }?>
    </tbody>
</table>
