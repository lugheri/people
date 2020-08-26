<?php 
if($acao=="confirmacao"){?>
    <div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
        <div class="modal-header">
            <p class="h5 modal-title">
                <i class="fas fa-user-slash"></i> Candidato Recusado
            </p>
        </div>
        <div class="modal-body" style="background:#ececec">
            <label for="recusa">Informe o motivo da recusa do candidato <b><?= $this->nomeCandidato($idCandidato)?></b>:</label>
            <select id="motivo" class="form-control">
                <option value="Reprovado">Reprovado</option>
                <option value="Desistiu">Desistiu</option>
                <option value="Demissão">Demissão</option>
                <option value="Não Aceitou">Não Aceitou</option>
            </select>
        </div>  
        <div class="modal-footer">
            <div class="btn btn-outline-secondary" data-dismiss="modal">
                Cancelar
            </div>
            <div class="btn btn-danger" onClick="recusaCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','remover')">
                <i class="fas fa-user-slash"></i> Recusar
            </div>
        </div>
    </div>
    <?php
}else

if($acao=="remover"){?>
    <div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
        <div class="modal-body text-center" style="background:#ececec">
            <p class="h3 text-info"><i class="fas fa-user-slash"></i></p>
            <p class="h5 text-muted">Candidato Recusado com sucesso!</p>
            <div class="btn btn-info" data-dismiss="modal" onClick="processoSeletivo('<?= $idVaga?>','<?=$fase?>')">
                Fechar
            </div>
        </div>
    </div>
    <?php
}?>