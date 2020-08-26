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
                        <a class="nav-link active" href="<?= LINK?>candidatos/fichaProfissional/<?= base64_encode($idCandidato.':edicao')?>"><i class="fas fa-user-tie"></i> Dados Profissionais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>candidatos/fichaConhecimentos/<?= base64_encode($idCandidato.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Conhecimentos"><i class="fas fa-brain"></i></a>
                    </li>
                </ul>
            </div>
            <form method="post" id="form">
                <input type="hidden" name="idCandidato" value="<?= $idCandidato?>"/>
                <div class="card-body">
                    <h6 class="card-title"><i class="fas fa-user-tie"></i> Agora os seus dados profissionais</h6>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Nos conte quais são seus objetivos profissionais</legend>
                        <div class="row">                            
                            <div class="col-3">
                                <label class="lbl" for="pretencaoSalarial">Qual sua pretenção salárial? <b class="text-danger">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="text" name="pretencaoSalarial" id="pretencaoSalarial" class="form-control" value="<?=$objetivoCandidato['pretencaoSalarial']?>" 
                                           onInput="mascaraValor('pretencaoSalarial')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="lbl" for="disponibilidadeViagem">Pode viajar a trabalho?</label>
                                <select name="disponibilidadeViagem" id="disponibilidadeViagem" class="form-control">
                                    <option value="1" <?php if($objetivoCandidato['podeViajar']==1){echo "selected";}?>>
                                        Sim
                                    </option>
                                    <option value="0" <?php if($objetivoCandidato['podeViajar']!=1){echo "selected";}?>>
                                        Não
                                    </option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="lbl" for="disponibilidadeMudanca">Pode mudar de cidade?</label>
                                <select name="disponibilidadeMudanca" id="disponibilidadeMudanca" class="form-control">
                                    <option value="1" <?php if($objetivoCandidato['podeMudar']==1){echo "selected";}?>>
                                        Sim
                                    </option>
                                    <option value="0" <?php if($objetivoCandidato['podeMudar']!=1){echo "selected";}?>>
                                        Não
                                    </option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="lbl" for="homeOffice">Pode trabalhar home-office?</label>
                                <select name="homeOffice" id="homeOffice" class="form-control">
                                    <option value="1" <?php if($objetivoCandidato['homeOffice']==1){echo "selected";}?>>
                                        Sim
                                    </option>
                                    <option value="0" <?php if($objetivoCandidato['homeOffice']!=1){echo "selected";}?>>
                                        Não
                                    </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Objetivos Profissionais</legend>
                        <div class="row">
                            <div class="col">
                                <label class="lbl" for="nivelInteresse">Função <b class="text-danger">*</b></label>
                                <select id="funcao" class="form-control">
                                    <option value=""></option>
                                    <?php foreach($listaFuncoes as $f):?>
                                        <option value="<?= $f['id']?>"><?= $f['funcao']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="lbl" for="nivelInteresse">Hierarquia <b class="text-danger">*</b></label>
                                <select id="hierarquia" class="form-control">
                                    <option value=""></option>
                                    <?php foreach($listaHierarquia as $h):?>
                                        <option value="<?= $h['id']?>"><?= $h['hierarquia']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="tempo">Tempo de Experiencia</label>
                                <input type="number" step="1" min="0" id="tempo" class="form-control"/>
                            </div>
                            <div class="col">
                                <br/>
                                <select id="tipoTempo" class="form-control">
                                    <option value="mes">Mes(es)</option>
                                    <option value="ano">Ano(s)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-8 offset-2">
                                <br/>
                                <div class="btn btn-info btn-block btn-sm" onClick="addObjetivo('<?= $idCandidato?>')">
                                    <i class="fas fa-plus-circle"></i> Adicionar objetivo 
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col" id='tblObjetivos'>
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead class="thead-warning">
                                    <tr>
                                        <th>Função</th>
                                        <th>Hierarquia</th>
                                        <th>Experiencia</th>
                                        <th>Período</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(empty($listarObjetivos)){?>
                                        <tr>
                                            <td colspan='5'>Nenhum objetivo foi informado</td>
                                        </tr>
                                    <?php
                                    }else{
                                        foreach($listarObjetivos as $o):?>
                                            <tr>
                                                <td><?= $o['idFuncao']?></td>
                                                <td><?= $o['idHierarquia']?></td>
                                                <td><?= $o['tempo']?></td>
                                                <td><?= $o['medidaTempo']?></td>
                                                <td style="width:50px">
                                                    <div class="btn btn-light" title="Remover objetivo"
                                                         onClick="removerObjetivo('<?= $idCandidato?>','<?= $o['id']?>')">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                    }?>
                                </tbody>
                            </table>
                        </div>
                        
                    </fieldset>
                    <br/>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Minicurriculo</legend>
                        <textarea name="minicurriculo" id="minicurriculo" class="form-control"><?=$objetivoCandidato['miniCurriculo']?></textarea>
                    </fieldset>
                    <br/>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-outline-primary" onClick="salvaFichaProfissional()">
                                Salvar e continuar <i class="fas fa-chevron-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>    


