<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-gifts text-info"></i> Presentes do Contato</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="formPresenteContato">
            <input type="hidden" name="idContato" value="<?= $idContato?>" required class="form-control"/>        
            <div class="row">
                <div class="col">
                    <label for="presente">Presente</label>
                    <input type="text" name="presente" id="presente" required class="form-control"/>
                </div>
                <div class="col-5">
                    <label for="dataEntrega">Data Entrega</label>
                    <input type="date" name="dataEntrega" id="dataEntrega" required class="form-control"/>
                </div>
                <div class="col-12">
                    <label for="observacoes">Observações</label>
                    <textarea name="observacoes" id="observacoes" class="form-control"></textarea>
                </div>
               
            </div>
            <div class="row">    
                
            
                <div class="col">
                    <button type="submit" class="btn btn-info btn-block" onClick="gravaPresenteContato()" style="margin-top:30px">
                        <i class="fas fa-plus"></i> Incluir presente
                    </button>
                </div>
            </div>
        </form>
        <br/>
        <table class="table table-sm table-striped table-hover table-bordered">
              <tHead class="thead-warning">
                  <tr>
                      <th><small>Presente</small></th>
                      <th><small>Data Entrega</small></th>
                      <th><small>Observações</small></th>
                      <th style="width:50px"></th>
                  </tr>
              </tHead>
              <tBody>
                  <?php 
                  if(empty($presentes)){?>
                      <tr>
                          <td colspan="4">Nenhum presente cadastrado</td>
                      </tr>
                      <?php
                  }else{
                      foreach($presentes as $p):?>
                          <tr>
                              <td><small><?=$p['presente']?></small></td>
                              <td><small><?=date('d/m/Y', strtotime($p['dataEntrega']))?></small></td>
                              <td><small><?=$p['observacoes']?></small></td>
                              <td style="width:50px">
                                  <div class="btn btn-sm btn-light" title="Remover Presente" onClick="removerPresenteContato('<?= $idContato?>','<?= $p['id']?>')">
                                      <i class="fas fa-trash text-danger"></i>
                                  </div>
                              </td>
                          </tr>
                          <?php
                      endforeach;
                  }?>
              </tBody>
        </table>           
    </div>
    <div class="modal-footer">
           
    </div>
</div>