<div class="modal-content">
    <?php 
    if($acao=="confirmacao"){?>
        <div class="modal-header">
            <p class="h5 modal-title"><i class="fas fa-save"></i> Confirmar Gravação da Vaga</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label>Nome</label>
                    <input type="text" disabled value='<?= $infoVaga['titulo']?>' class="form-control"/>
                </div>
            </div>
            <br/>
            <small class="text-muted">//resumo dos dados da vaga</small>
            
        </div>
        <div class="modal-footer">
            <div class="btn btn-secondary" data-dismiss="modal">
                Voltar
            </div>
            <div class="btn btn-success" onClick="concluirVaga('<?= $idVaga ?>','salvar')">
                <i class="fas fa-save"></i> Confirmar gravação
            </div>
        </div>
    <?php
}else if($acao=="salvar"){?>
     <div class="modal-body text-center">
        <p class="h5 modal-title"><i class="fas fa-save"></i> Importar Arquivo</p><hr/>
        <p class="h5">Vaga publicada com sucesso</p>
        <a href="<?= LINK?>vagas/" class="btn btn-info">
            Concluir
        </a>
    </div>
    <?php
    }?>
</div>
