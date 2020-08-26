<div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
    <div class="modal-header">
        <p class="h5 modal-title">
            <i class="fas fa-microphone-alt"></i> Agendar Entrevista
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="telaBusca" style="background:#ececec">
        <div class="row">
            <div class="col">
                <label for="data">Data</label>
                <input type="date" id="data" class="form-control"/>
            </div>
            <div class="col-4">
                <label for="hora">Hora</label>
                <input type="time" id="hora" class="form-control"/>
            </div>     
        </div>   
        <div class="row"> 
            <div class="col">
                <label for="responsavel">Responsável</label>
                <select id="responsavel" class="form-control">
                    <option value="">Selecione</option>
                    <?php foreach($usuarios as $u):?>
                        <option value="<?= $u['id']?>"><?= $u['nome']?></option>
                    <?php endforeach;?>
                </select>
            </div> 
            <div class="col-5">
                <label for="email">Email de Confirmação</label>
                <select id="email" class="form-control">
                    <option value="1">Enviar</option>
                    <option value="0">Não Enviar</option>
                </select>
            </div> 
        </div>
    </div>  
    <div class="modal-footer">
        <div class="btn btn-outline-secondary" data-dismiss="modal">
            Cancelar
        </div>
        <div class="btn btn-success" onClick="agendarEntrevista('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
            <i class="fas fa-calendar-check"></i> Agendar Entrevista
        </div>
    </div>
</div>