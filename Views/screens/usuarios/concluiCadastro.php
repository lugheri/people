<div class="modal-content">
    <div class="modal-body">
        <div class="row">
            <div class="col text-center">
                <?= $msg?>
            </div>
        </div>
    </div>    
    <div class="modal-footer">
        <a class="btn btn-outline-info" href="<?= LINK?>usuarios">
            <i class="fas fa-check"></i> Concluir
        </a>
        <div class="btn btn-info" onClick="novoUsuario()">
            <i class="fas fa-user-plus"></i> Cadastrar novo usuário
        </div>
    </div>
</div>