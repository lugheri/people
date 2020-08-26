<div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
    <div class="modal-body text-center">
        <p class="h3 text-info"><i class="fas fa-forward"></i></p>
        <p class="h5 text-muted">Candidato foi enviado com sucesso!</p>
        <p class="h5 text-muted">Deseja abrir a aba de <?= $fase?></p>
        <hr/>
        <div class="btn btn-outline-secondary" data-dismiss="modal">
            Não
        </div>
        <div class="btn btn-outline-success" data-dismiss="modal" onClick="processoSeletivo('<?= $idVaga?>','<?= $fase?>')">
            Sim
        </div>
    </div>      
</div>