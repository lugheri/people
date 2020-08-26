<?php if(!empty($modal)){?>
    <div class="modal-content">
        <div class="modal-header">
            <p class="h5 modal-title"><i class="fas fa-search"></i> Buscar Candidato</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="background:#ececec">
    <?php
}?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3" style="max-height:550px; overflow: auto;">
            <p class="h6 text-secondary"><i class="fas fa-filter"></i> Filtrar Por:</p>
            <form method="post" id="formBuscaCandidato">
                <input type="hidden" name="idCliente" value="<?= $idCliente?>"/>
                <input type="hidden" name="idVaga" value="<?= $idVaga?>"/>
                <input type="hidden" name="status" value="1"/>
                <input type="hidden" name="pagina" id="pagina" value="0"/>
                
                <div class="accordion" id="filtrosPesquisa">    
                
                    <div class="card">
                        <div class="card-header" id="heading_F1">
                            <b class="text-info">Pretenção Salárial</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F1" aria-expanded="true" aria-controls="filtro_F1">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F1" class="collapse show" aria-labelledby="heading_F1" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="salario_de">De</label>
                                        <input type="text" name="salario_de" id="salario_de" onInput="novaBuscaCandidato()" class="form-control form-control-sm"/>
                                    </div>
                                    <div class="col">
                                        <label for="salario_ate">Até</label>
                                        <input type="text" name="salario_ate" id="salario_ate" onInput="novaBuscaCandidato()" class="form-control form-control-sm"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                    <div class="card">
                        <div class="card-header" id="heading_F2">
                            <b class="text-info">Dados Gerais</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F2" aria-expanded="true" aria-controls="filtro_F2">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F2" class="collapse show" aria-labelledby="heading_F2" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                               

                            </div>
                        </div>    
                    </div>
                   
                    <div class="card">
                        <div class="card-header" id="heading_F3">
                            <b class="text-info">Profissional</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F3" aria-expanded="true" aria-controls="filtro_F3">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F3" class="collapse show" aria-labelledby="heading_F3" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                            </div>
                        </div> 
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="heading_F4">
                            <b class="text-info">Pessoal</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F4" aria-expanded="true" aria-controls="filtro_F4">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F4" class="collapse show" aria-labelledby="heading_F4" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="cpf">CPF</label>
                                        <input type="text" name="cpf" id="cpf" value="" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="heading_F5">
                            <b class="text-info">Escolaridade</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F5" aria-expanded="true" aria-controls="filtro_F5">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F5" class="collapse show" aria-labelledby="heading_F5" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                            </div>
                        </div> 
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="heading_F6">
                            <b class="text-info">Localização</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F6" aria-expanded="true" aria-controls="filtro_F6">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F6" class="collapse show" aria-labelledby="heading_F6" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="estado">Estado</label>
                                        <select name="estado" id="estado" class="form-control form-control-sm" onChange="novaBuscaCandidato()">
                                            <option value="">Selecione</option>
                                            <option value="AC">Acre (AC)</option>
                                            <option value="AL">Alagoas (AL)</option>
                                            <option value="AP">Amapá (AP)</option>
                                            <option value="AM">Amazonas (AM)</option>
                                            <option value="BA">Bahia (BA)</option>
                                            <option value="CE">Ceará (CE)</option>
                                            <option value="DF">Distrito Federal (DF)</option>
                                            <option value="ES">Espírito Santo (ES)</option>
                                            <option value="GO">Goiás (GO)</option>
                                            <option value="MA">Maranhão (MA)</option>
                                            <option value="MT">Mato Grosso (MT)</option>
                                            <option value="MS">Mato Grosso do Sul (MS)</option>
                                            <option value="MG">Minas Gerais (MG)</option>
                                            <option value="PA">Pará (PA)</option>
                                            <option value="PB">Paraíba (PB)</option>
                                            <option value="PR">Paraná (PR)</option>
                                            <option value="PE">Pernambuco (PE)</option>
                                            <option value="PI">Piauí (PI)</option>
                                            <option value="RJ">Rio de Janeiro (RJ)</option>
                                            <option value="RN">Rio Grande do Norte (RN)</option>
                                            <option value="RS">Rio Grande do Sul (RS)</option>
                                            <option value="RO">Rondônia (RO)</option>
                                            <option value="RR">Roraima (RR)</option>
                                            <option value="SC">Santa Catarina (SC)</option>
                                            <option value="SP">São Paulo (SP)</option>
                                            <option value="SE">Sergipe (SE)</option>
                                            <option value="TO">Tocantins (TO)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" onInput="novaBuscaCandidato()" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div><!--accordion-->  
                <label for="limite">Currículos por página</label>
                <select name="limite" id="limite" class="form-control" onChange="novaBuscaCandidato()">
                
                    <option value="5">5 Currículos</option>
                    <option value="10">10 Currículos</option>
                    <option value="30">30 Currículos</option>
                    <option value="50">50 Currículos</option>
                    <option value="1">teste</option>
                </select>
            </form>
        </div>
        <div class="col" id="resultadoBuscaCandidato">
            <?php require_once "resultadoBusca.php"?>
        </div>
    </div>
</div>

<?php if(!empty($modal)){?>
        </div>
        <div class="modal-footer"></div>
    </div>
<?php
}?>
