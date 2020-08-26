<div class="row">
    <div class="col">
        <div class="table-responsive" style="max-height:250px">
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th><small style="font-weight:600;">Nome</small></th>
                        <th><small style="font-weight:600">Data Nasc.</small></th>
                        <th><small style="font-weight:600">Apto</small></th>
                        <th><small style="font-weight:600">Tipo Chamado</small></th>
                        <th><small style="font-weight:600">Chamado</small></th>
                        <th><small style="font-weight:600">Retorno</small></th>
                        <th><small style="font-weight:600">Dt. Entrevista</small></th>
                        <th><small style="font-weight:600">Hr. Entrevista</small></th>
                        <th><small style="font-weight:600">Resp. Entrevista</small></th>
                        <th><small style="font-weight:600">Observação</small></th>
                        <th><small style="font-weight:600">Word</small></th>
                    </tr>
                </tHead>
                <tBody>
                    <?php 
                    if(empty($candidatosAptos)){?>
                        <tr>
                            <td colspan="10">
                                Nenhum candidato apto para esta vaga
                            </td>
                        </tr>
                        <?php
                    }else{
                        foreach($candidatosAptos AS $as):
                            $entrevista=$this->entrevistasCandidatoVagaFase($idVaga,$as['idCandidato'],'Apto');?>

                            <tr class="line" id='line_<?= $as['idCandidato']?>'  onClick="acaoCandidato_processoSeletivo('<?= $as['idCandidato']?>','<?= $idVaga?>','Apto')">
                                <td><small><?= $this->nomeCandidato($as['idCandidato'])?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->nascCandidato($as['idCandidato'])))?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($as['dataFase']))?></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <?php if(!empty($entrevista)){?>
                                    <td><small><?= date('d/m/Y', strtotime($entrevista['data']))?></small></td>
                                    <td><small><?= date('H:i', strtotime($entrevista['data']))?></small></td>
                                    <td><small><?= $this->nomeUser($entrevista['responsavel'])?></small></td>
                                    <?php 
                                }else{?>
                                    <td><small></small></td>
                                    <td><small></small></td>
                                    <td><small></small></td>
                                    <?php 
                                }?>
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
