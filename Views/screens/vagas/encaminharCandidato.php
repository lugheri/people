<div class="modal-content" style="margin-top:50px; box-shadow:0px 0px 5px rgba(0,0,0,0.35),0px 0px 15px rgba(0,0,0,0.35)">
    <div class="modal-header">
        <p class="h5 modal-title">
            <i class="fas fa-share"></i> Encaminhar Candidato
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="telaBusca" style="background:#ececec">
        <p class="h6 text-muted">Candidato: <b><?= $this->nomeCandidato($idCandidato)?></b></p>
        
        <div class="row">
            <div class="col">
                <label for="encaminhamento">Tipo de Encaminhamento</label>
                <select id="encaminhamento" class="form-control form-control-sm">
                    <option value="curriculo">Curriculo</option>
                    <option value="carta">Carta</option>
                </select>
            </div>
            <div class="col">
                <label for="tipoEnvio">Tipo de Envio</label>
                <select id="tipoEnvio" class="form-control form-control-sm">
                    <option value="email">E-mail</option>
                    <option value="impresso">Impresso</option>
                </select>
            </div>     
        </div>   
        <div class="row">
            <div class="col">
                <label for="dataEntrevista">Data da Entrevista</label>
                <select id="dataEntrevista" class="form-control form-control-sm">
                    <option value="0">Selecione</option>
                    <?php foreach($datasEntrevistas as $de):?>
                        <option value="<?= $de['id']?>">
                            <?= date('d/m/Y', strtotime($de['data'])).' às '.$de['hora'].' com a(o) '.$this->nomeContato($de['contato'])?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col">
                <label for="endereco">Endereço do Cliente</label>
                <select id="endereco" class="form-control form-control-sm">
                    <option value="0">Selecione</option>
                    <?php foreach($enderecoEncaminhamento as $ec):?>
                        <option value="<?= $ec['id']?>">
                            <?= $this->resumoEndereco($ec['id'])?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>     
        </div>  
    </div>  
    <div class="modal-footer">
        <div class="btn btn-outline-secondary" data-dismiss="modal">
            Cancelar
        </div>
        <div class="btn btn-success" onClick="concluirEncaminhamentoCandidato('<?=$idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
            <i class="fas fa-share"></i> Encaminhar candidato <?= $fase?>
        </div>
    </div>
</div>