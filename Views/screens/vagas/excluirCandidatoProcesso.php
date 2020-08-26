<?php 
if($acao=="confirmacao"){?>
    <div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
        <div class="modal-header">
            <p class="h5 modal-title">
                <i class="fas fa-user-times"></i> Excluir Candidato
            </p>
        </div>
        <div class="modal-body text-center" style="background:#ececec">
            <p class="h3 text-danger"><i class="fas fa-user-times"></i></p>
            <p class="h5 text-muted">Deseja realmente excluir este candidato?</p>
        </div>  
        <div class="modal-footer">
            <div class="btn btn-outline-secondary" data-dismiss="modal">
                Não
            </div>
            <div class="btn btn-danger" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','remover')">
                <i class="fas fa-user-times"></i> Sim, excluir
            </div>
        </div>
    </div>
    <?php
}else

if($acao=="remover"){?>
    <div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
        <div class="modal-body text-center" style="background:#ececec">
            <p class="h3 text-info"><i class="fas fa-user-times"></i></p>
            <p class="h5 text-muted">Candidato removido com sucesso!</p>
            <div class="btn btn-info" data-dismiss="modal"  onClick="processoSeletivo('<?= $idVaga?>','<?=$fase?>')">
                Fechar
            </div>
        </div>
    </div>
    <?php
}?>