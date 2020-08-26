<p class="h5 text-secondary"><i class="far fa-id-card text-info"></i> Ficha do Candidato</p>
<div class='row'>
    <div class="col">
        <div class="card card-ficha">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Dados pessoais"><i class="fas fa-address-card"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>candidatos/fichaProfissional/<?= base64_encode($idCandidato.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Dados Profissionais"><i class="fas fa-user-tie"></i> Dados Profissionais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= LINK?>candidatos/fichaConhecimentos/<?= base64_encode($idCandidato.':edicao')?>"><i class="fas fa-brain"></i> Seus Conhecimentos</a>
                    </li>
                </ul>
            </div>
            <form method="post" id="form">
                <input type="hidden" name="idCandidato" value="<?= $idCandidato?>"/>
                <div class="card-body">
                    <h6 class="card-title"><i class="fas fa-brain"></i> Nos conte sobre seu nível de conhecimento</h6>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Escolaridade</legend>
                        <div class="row">
                            <div class="col">
                                <label for="escolaridade">Escolaridade</label>
                                <select id="escolaridade" class="form-control form-control-sm">
                                    <option value="">Selecione</option>
                                    <?php foreach($listaEscolaridade as $le):?>
                                        <option value="<?= $le['escolaridade']?>"><?= $le['escolaridade']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="instituicao">Instituição</label>
                                <input type="text" id="instituicao" class="form-control form-control-sm"/>
                            </div>
                            <div class="col">
                                <label for="curso">Curso</label>
                                <input type="text" id="curso" class="form-control form-control-sm"/>
                            </div>
                        </div>  
                        <div class="row">  
                            <div class="col-2">
                                <label for="inicio">Inicio</label>
                                <input type="month" id="inicio" class="form-control form-control-sm"/>
                            </div>
                            <div class="col-2">
                                <label for="termino">Término</label>
                                <input type="month" id="termino" class="form-control form-control-sm"/>
                            </div>
                            <div class="col-2">
                                <label for="horario">Horário</label>
                                <select id="horario" class="form-control form-control-sm">
                                    <option value="">Selecione</option>
                                    <option>Indefinido</option>
                                    <option>Integral</option>
                                    <option>Manhã</option>
                                    <option>Manha e Tarde</option>                                      
                                    <option>Tarde</option>
                                    <option>Tarde e Noite</option>
                                    <option>Noite</option>
                                </select>
                            </div>
                            <div class="col">
                                <br/>
                                <div class="btn btn-info btn-block" onClick="addEscolaridade('<?= $idCandidato ?>')">
                                    <i class="fas fa-plus-circle"></i> Adicionar curso
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col" id='tblEscolaridade'>
                                <table class="table table-bordered table-striped table-hover table-sm">
                                    <thead class="thead-warning">
                                        <tr>
                                            <th>Escolaridade</th>
                                            <th>Instituição</th>
                                            <th>Curso</th>
                                            <th>Inicio</th>
                                            <th>Término</th>
                                            <th>Horário</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(empty($escolaridadeCandidato)){?>
                                            <tr>
                                                <td colspan='5'>Nenhum curso foi informado</td>
                                            </tr>
                                            <?php
                                        }else{
                                            foreach($escolaridadeCandidato as $e):?>
                                                <tr>
                                                    <td><?= $e['escolaridade']?></td>
                                                    <td><?= $e['instituicao']?></td>
                                                    <td><?= $e['curso']?></td>
                                                    <td><?= date('m/Y', strtotime($e['inicio']))?></td>
                                                    <td><?= date('m/Y', strtotime($e['termino']))?></td>
                                                    <td><?= $e['horario']?></td>
                                                    <td style="width:50px">
                                                        <div class="btn btn-light" title="Remover curso"
                                                            onClick="delEscolaridade('<?= $idCandidato?>','<?= $e['id']?>')">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        }?>
                                    </tbody>
                                </table>           
                            </div>
                        </div>
                    </fieldset>
                        
                    <br/>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Origem do Cadastro</legend>
                        <div class="row">
                            <div class="col-8 offset-2">
                                <label for="origem">Origem</label>
                                <select id='origem' class="form-control" onChange="setaOrigem('<?= $idCandidato?>',this.value)">
                                    <option <?php if($infoOrigem['origem']=="agencia"){ echo "selected";}?> value="agencia">Agência, qual?</option>
                                    <option <?php if($infoOrigem['origem']=="fonte"){ echo "selected";}?> value="fonte">Fonte Cliente</option>
                                    <option <?php if($infoOrigem['origem']=="indicacao"){ echo "selected";}?> value="indicacao">Indicação de Funcionários</option>
                                    <option <?php if($infoOrigem['origem']=="jornal"){ echo "selected";}?> value="jornal">Jornal</option>
                                    <option <?php if($infoOrigem['origem']=="site"){ echo "selected";}?> value="site">Site</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 offset-2" id='complementoOrigem'>
                                <input type="hidden" id='complemento' value='<?=$infoOrigem['complemento']?>'>
                            </div>
                        </div>
                    </fieldset>
                        

                    <div class="row">
                        <div class="col text-right">
                            <br/>
                            <button class="btn btn-success" onClick="concluirFicha('<?= $idCandidato?>')">
                                <i class="fas fa-save"></i> Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>    


