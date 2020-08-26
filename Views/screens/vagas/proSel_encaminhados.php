<div class="row">
    <div class="col">
        <div class="table-responsive" style="max-height:250px">
            <table class="table table-sm table-bordered table-striped table-hover">
                <tHead class="thead-warning">
                    <tr>
                        <th><small style="font-weight:600;">Nome</small></th>
                        <th><small style="font-weight:600">Data Nasc.</small></th>
                        <th><small style="font-weight:600">Data Enc.</small></th>
                        <th><small style="font-weight:600">Carta</small></th>
                        <th><small style="font-weight:600">Dt Ent. Cli</small></th>
                        <th><small style="font-weight:600">Hr Ent. Cli</small></th>
                        <th><small style="font-weight:600">Tipo Chamado</small></th>
                        <th><small style="font-weight:600">Retorno</small></th>
                        <th><small style="font-weight:600">Dt. Entrevista</small></th>
                        <th><small style="font-weight:600">Hr. Entrevista</small></th>
                        <th><small style="font-weight:600">Resp. Entrevista</small></th>
                        <th><small style="font-weight:600">Observação</small></th>
                        <th><small style="font-weight:600">Selecionador</small></th>
                    </tr>
                </tHead>
                <tBody>
                    <?php 
                    if(empty($candidatosEncaminhados)){?>
                        <tr>
                            <td colspan="13">
                                Nenhum candidato encaminhado para esta vaga
                            </td>
                        </tr>
                        <?php
                    }else{
                        foreach($candidatosEncaminhados AS $ce):
                            $entrevista=$this->entrevistasCandidatoVagaFase($idVaga,$ce['idCandidato'],'Encaminhado');?>

                            <tr class="line" id='line_<?= $ce['idCandidato']?>'  onClick="acaoCandidato_processoSeletivo('<?= $ce['idCandidato']?>','<?= $idVaga?>','Encaminhado')">
                                <td><small><?= $this->nomeCandidato($ce['idCandidato'])?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->nascCandidato($ce['idCandidato'])))?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($ce['dataFase']))?></small></td>
                                <td><small><?php if($ce['tipoEncaminhamento']=="carta"){echo "SIM";}else{echo "NÃO";}?></small></td>
                                <td><small><?= date('d/m/Y', strtotime($this->dataEntrevistaEncaminhada($ce['dataEntrevista'])))?></small></td>
                                <td><small><?= date('H:i', strtotime($this->dataEntrevistaEncaminhada($ce['dataEntrevista'])))?></small></td>
                                <td><small><?= $ce['tipoEnvio']?></small></td>
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
