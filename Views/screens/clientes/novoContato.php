<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-user-plus text-info"></i> Novo Contato</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" id="formContato">
        <input type="hidden" name="idCliente" value="<?= $idCliente?>" required class="form-control"/>
        <input type="hidden" name="idContato" value="<?= $idContato?>" required class="form-control"/>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?= $infoContato['nome']?>" required class="form-control"/>
                </div>
                <div class="col-4">
                    <label for="nasc">Data Nasc</label>
                    <input type="date" name="nasc" id="nasc" value="<?= $infoContato['nasc']?>" required class="form-control"/>
                </div>
            </div>
            <div class="row">    
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= $infoContato['email']?>" required class="form-control"/>
                </div>
            </div>
            <div class="row">    
                <div class="col">
                    <label for="funcao">Função</label>
                    <select name="funcao" id="funcao" class="form-control">
                        <option value="0">Selecione...</option>
                        <?php if(!empty($listarFuncao)){
                            foreach($listarFuncao as $l):?>
                                <option value="<?= $l['id']?>"><?= $l['funcao']?></option>
                            <?php
                            endforeach;
                        }?>                        
                    </select>
                </div>
                <div class="col">
                    <label for="especialidade">Especialidade</label>
                    <select name="especialidade" id="especialidade" class="form-control">
                        <option value="0">Selecione...</option>
                    </select>
                </div>
                <div class="col">
                    <label for="hierarquia">Hierarquia</label>
                    <select name="hierarquia" id="hierarquia" class="form-control">
                        <option value="0">Selecione...</option>                        
                        <?php if(!empty($listarHierarquia)){
                            foreach($listarHierarquia as $h):?>
                                <option value="<?= $h['id']?>"><?= $h['hierarquia']?></option>
                            <?php
                            endforeach;
                        }?>          
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="observacoes">Observacões</label>
                    <textarea id='observacoes' name='observacoes' class='form-control'><?= $infoContato['observacoes']?></textarea>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col">
                    <div class="btn btn-outline-info" onClick="addTelefonesContato('<?=$idContato?>')">
                        <i class="fas fa-phone"></i> Telefones
                    </div>
                    <div class="btn btn-outline-primary" onClick="addPresentesContato('<?=$idContato?>')">
                        <i class="fas fa-gifts"></i> Presentes
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success btn-lg btn-block" onClick="salvarContato()">
                        <i class="fas fa-save"></i> Salvar Contato
                    </button>
                </div>
            </div>
        </div>
      
    </form>
</div>