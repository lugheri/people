<div class="row">
    <div class="col">
        <div class="table-responsive" style="max-height:250px">
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th><small style="font-weight:600;">Nome</small></th>
                        <th><small style="font-weight:600">Data Nasc.</small></th>
                        <th><small style="font-weight:600">Aprovado</small></th>
                        <th><small style="font-weight:600">Brinde</small></th>
                        <th><small style="font-weight:600">Contrato</small></th>
                        <th><small style="font-weight:600">Data Contrato</small></th>
                        <th><small style="font-weight:600">Data Inicio</small></th>
                        <th><small style="font-weight:600">Salário</small></th>
                        <th><small style="font-weight:600">Horário</small></th>
                        <th><small style="font-weight:600">Data Demissão</small></th>
                        <th><small style="font-weight:600">Observação</small></th>
                        <th><small style="font-weight:600">Selecionador</small></th>
                        <th><small style="font-weight:600">Word</small></th>
                    </tr>
                </tHead>
                <tBody>
                    <?php 
                    if(empty($candidatosAprovados)){?>
                        <tr>
                            <td colspan="13">
                                Nenhum candidato aprovado para esta vaga
                            </td>
                        </tr>
                        <?php
                    }else{
                        foreach($candidatosAprovados AS $ap):?>                            
                            <tr class="line" id='line_<?= $ap['idCandidato']?>'  onClick="acaoCandidato_processoSeletivo('<?= $ap['idCandidato']?>','<?= $idVaga?>','Aprovado')">
                                <td><small><?= $this->nomeCandidato($ap['idCandidato'])?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->nascCandidato($ap['idCandidato'])))?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($ap['dataFase']))?></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
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
