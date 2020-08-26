<div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
    <div class="modal-header">
        <p class="h5 modal-title">
            <i class="fas fa-microphone-alt"></i> Agendar Entrevista
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body text-center" style="background:#ececec">
        <p class="h3 text-info"><i class="fas fa-calendar-check"></i></p>
        <p class="h5 text-muted">Entrevista agendada com sucesso!</p>
    </div>  
    <div class="modal-footer">
        <div class="btn btn-outline-success" data-dismiss="modal" onClick="processoSeletivo('<?= $idVaga?>','<?= $fase?>')">
            <i class="fas fa-check"></i> Concluir
        </div>
    </div>
</div>