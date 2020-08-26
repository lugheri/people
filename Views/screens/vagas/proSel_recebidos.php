<div class="row">
    <div class="col">
        <div class="table-responsive" style="max-height:250px">
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th><small style="font-weight:600;">Nome</small></th>
                        <th><small style="font-weight:600">Função Hierarquia.</small></th>
                        <th><small style="font-weight:600">Cidade/Estado</small></th>
                        <th><small style="font-weight:600">Escolaridade</small></th>
                        <th><small style="font-weight:600">Data Nasc.</small></th>
                        <th><small style="font-weight:600">Lidos</small></th>
                        <th><small style="font-weight:600">Data</small></th>
                        <th><small style="font-weight:600">Observação</small></th>
                        <th><small style="font-weight:600">Word</small></th>
                    </tr>
                </tHead>
                <tBody>
                    <?php 
                    if(empty($candidatosRecebidos)){?>
                        <tr>
                            <td colspan="10">
                                Nenhum candidato recebido para esta vaga
                            </td>
                        </tr>
                        <?php
                    }else{
                        foreach($candidatosRecebidos AS $cr):?>
                            <tr class="line" id='line_<?= $cr['idCandidato']?>'  onClick="acaoCandidato_processoSeletivo('<?= $cr['idCandidato']?>','<?= $idVaga?>','Recebido')">
                                <td><small><?= $this->nomeCandidato($cr['idCandidato'])?></small></td>
                                <td><small>funcao</small></td>
                                <td><small>Cidade</small></td>
                                <td><small>Escolaridade</small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->nascCandidato($cr['idCandidato'])))?></small></td>
                                <td><small>Lidos</small></td>
                                <td><small><?= date('d/m/Y', strtotime($cr['dataFase']))?></small></td>
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
