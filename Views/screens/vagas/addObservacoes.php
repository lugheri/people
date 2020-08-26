<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title">
            <i class="fas fa-edit"></i> Observações
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="telaBusca" style="background:#ececec">
        <div class="row">
            <div class="col">
                <p class="h5 text-muted"><i class="fas fa-user-tie"></i> Candidato: <b><?= $this->nomeCandidato($idCandidato)?></b></p>
                <div class="card">
                    <div class="card-body">
                        <b>Observações</b><hr/>
                        <textarea id="observacoesCandidato" class="form-control"></textarea>
                   </div>
                   <div class="card-footer text-right">
                        <div class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cancelar
                        </div>
                        <div class="btn btn-success" onClick="gravarObservacoes('<?= $idCandidato?>')">
                            <i class="fas fa-save"></i> Salvar
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col" id='gravarObservacoes'>
                <table class="table table-sm table-striped table-hover">
                    <tHead class="thead-warning">
                        <tr>
                            <th>Data</th>
                            <th>Responsável</th>
                            <th>Observação</th>
                        </tr>
                    </tHead>
                    <tBody>
                        <?php 
                        if(empty($observacoes)){?>
                            <tr>
                                <td colspan="3">Nenhuma observação registrada</td>
                            </tr>
                            <?php
                        }else{
                            foreach($observacoes as $o):?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($o['data']))?></td>
                                    <td><?= $o['nome']?></td>
                                    <td><?= $o['observacao']?></td>
                                </tr>
                            <?php endforeach;
                        }?>
                    </tBody>
                </table>
            </div>    
        </div>
    </div>  
    <div class="modal-footer"></div>
</div>