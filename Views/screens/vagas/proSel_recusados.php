<div class="row">
    <div class="col">
        <div class="table-responsive" style="max-height:250px">
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th><small style="font-weight:600;">Nome</small></th>
                        <th><small style="font-weight:600">Data Nasc.</small></th>
                        <th><small style="font-weight:600">Data Recusa</small></th>
                        <th><small style="font-weight:600">Motivo</small></th>
                        <th><small style="font-weight:600">Word</small></th>
                    </tr>
                </tHead>
                <tBody>
                    <?php 
                    if(empty($candidatosRecusados)){?>
                        <tr>
                            <td colspan="13">
                                Nenhum candidato recusado para esta vaga
                            </td>
                        </tr>
                        <?php
                    }else{
                        foreach($candidatosRecusados AS $cr):?>
                            <tr class="line" id='line_<?= $cr['idCandidato']?>'  onClick="acaoCandidato_processoSeletivo('<?= $cr['idCandidato']?>','<?= $idVaga?>','Recusado')">
                                <td><small><?= $this->nomeCandidato($cr['idCandidato'])?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->nascCandidato($cr['idCandidato'])))?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($cr['dataFase']))?></small></td>
                                <td><small><?= $cr['motivo']?></small></td>
                                <td><small></small></td>                   
                            </tr>
                            <?php
                        endforeach;
                    }?>
                </tBody>
            </table> 
        </div>
    </div>
</div>
<div id="acoesCandidato">
    <p class="text-muted">Clique em um candidato para selecioná-lo</p>
</div>
