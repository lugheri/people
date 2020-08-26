<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-user-check"></i> Selecionar Candidato</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="telaBusca">
        <div class="row">
            <div class="col">
                <label> Confirmar seleção de candidato(s) para vaga:</label>
                <input type="text" value="<?= $this->nomeVaga($idVaga)?>" disabled class="form-control"/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-sm table-bordered table-striped">
                    <tHead class="thead-warning">
                        <tr>
                            <th style="max-width:50px">Cód.</th>
                            <th>Nome</th>
                            <th>Status</th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php
                        $inseridos="";
                        foreach($selecionados as $s):
                            if($s>0){
                                if($resposta[$s]==true){
                                    $inseridos=1?>
                                    <tr>
                                        <td style="max-width:50px"><?= $s?></td>
                                        <td><?= $this->nomeCandidato($s)?></td>
                                        <td>Candidato inserido com sucesso no processo seletivo desta vaga!</td>
                                    </tr>
                                    <?php
                                }else{?>
                                    <tr>
                                        <td class="table-danger" style="max-width:50px"><?= $s?></td>
                                        <td class="table-danger"><?= $this->nomeCandidato($s)?></td>
                                        <td class="table-danger">
                                            <small>
                                                Candidato já esta na fase de <b>"<?= $this->getFaseSelecao($s,$idVaga)?>"</b> do processo de seleção desta vaga!
                                            </small>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        endforeach;?>
                    </tBody>
                </table>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col text-right">
                <?php if(empty($inseridos)){?>
                    <div class="btn btn-outline-secondary" data-dismiss="modal">Fechar</div>
                    <?php
                }else{?>
                    <div class="btn btn-outline-success" data-dismiss="modal">Concluir</div>
                    <div class="btn btn-success" onClick="processoSeletivo('<?= $idVaga?>','selecionados')" data-dismiss="modal">Concluir e ir para aba de selecionados</div>
                    <?php
                }?>
            </div>
        </div>           
    </div>
</div>
