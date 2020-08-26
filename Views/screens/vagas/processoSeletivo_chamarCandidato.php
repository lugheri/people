<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-mobile-alt"></i> Chamar Candidato</p>
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
                        <b>Contatos</b><hr/>
                        <p><i class="fas fa-mobile-alt"></i> <?=$contatos['celular']?></p>
                        <p><i class="fas fa-phone"></i> <?=$contatos['telFixo']?> </p>
                   </div>
                   <div class="card-footer text-right">
                        <div class="btn btn-info" onClick="addEntrevistaVaga('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                            <i class="fas fa-microphone-alt"></i> Entrevistas
                        </div>
                        <div class="btn btn-info" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                            <i class="fas fa-edit"></i> Observações
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
    <div class="modal-footer">
        <div class="btn btn-outline-secondary" data-dismiss="modal">
            Fechar
        </div>
    </div>
</div>
