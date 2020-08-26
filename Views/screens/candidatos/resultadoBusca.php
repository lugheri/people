<form id="formSelecionaCandidatos" method="post">
    <input type="hidden" name="idVaga" value="<?= $idVaga?>"/>
    <small class="text-muted">Exibindo <b><?=$pagina?></b> - <b><?= $totalPag?></b> de <b><?= $totalCandidatos?></b> currículos</small>
    <div class="card">
        <div class="card-header">
            <?php 
            if(!empty($idVaga)){?>
                <button type="submit" class="btn btn-info btn-sm" style="float:right" onClick="selecionarCandidato()">
                    <i class="fas fa-user-check"></i> Selecionar marcados
                </button>
                <?php
            }?>
            Ações em massa 
        </div>
    </div>
    <br/>
    <div class="resultadoBuscaCandidato">   
        <?php
        if(empty($resultadoBusca)){?>
            <div class="card">
                <div class="card-header text-center">
                    <br/>
                    <p class="h2 text-info"><i class="fas fa-user-slash"></i></p>
                    <p class="h5 text-secondary">Nenhum currículo foi localizado pelos filtros informados!</p>
                    <br/>
                </div>
            </div>
            <?php    
        }else{
            foreach($resultadoBusca as $c): 
                $cargo=$this->cargoCandidato($c['id']);
                $local=$this->enderecoCandidato($c['id']);
                $objetivos=$this->objetivosCandidato($c['id']);
                $escolaridade=$this->escolaridadeCandidato($c['id']);
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-1" style="padding:0px 5px">
                                <div class="btn btn-light btn-block" id='selecionar_<?=$c['id']?>' title="Marcar" onClick="marcarCandidato('<?= $c['id']?>',1)">
                                    <i class="far fa-square"></i>
                                </div>
                                <div class="btn btn-success btn-block hidden" id='deselecionar_<?=$c['id']?>' title="Desmarcar" onClick="marcarCandidato('<?= $c['id']?>',0)">
                                    <i class="far fa-check-square"></i>
                                </div>
                                
                                <input type="hidden" name='selecionados[]' id='selecionaCandidato_<?=$c['id']?>' value='' class="form-control">
                                <a class="btn btn-light btn-block" style="margin-top:5px" title="Abrir Ficha" href="<?= LINK ?>candidatos/fichaCandidato/<?= base64_encode($c['id'].':edit')?>">
                                    <i class="fas fa-folder-open text-info"></i>
                                </a>
                            </div>
                            <div class="col" style="padding:5px; height:200px; overflow:auto">
                                <p class="h5 text-info"><b>Currículo de <?= $cargo['funcao'].', '.$cargo['hierarquia']?></b></p>
                                <p class="text-muted" style="font-size:.8rem;"><?= $local['cidade'].', '.$local['estado'].' - '.$local['cep'].' - '.$local['bairro']?></p>
                                <p class="text-muted" style="font-size:.9rem">
                                    <?php foreach($objetivos as $o):?>
                                        <b class="text-info"><?= $o['funcao'].', '.$o['hierarquia']?></b> por <?= $o['tempo'].' '.$o['medidaTempo']?>(s)<br/>
                                    <?php endforeach;?>
                                </p>
                                <p class="text-muted" style="font-size:.9rem">
                                    <?php foreach($escolaridade as $e):?>
                                        <b class="text-info"><?= $e['escolaridade']?></b> - <?= $e['instituicao'].' - '.$e['curso']?><br/>
                                    <?php endforeach;?>
                                </p>
                            </div>

                            <div class="col-4 " style="border-left:1px solid #ccc">
                                <div class="row">
                                    <div class="col text-right">
                                        <p class="text-muted" style="font-size:.7rem;">Pretenção Salárial<br/><b><?= $this->pretencaoSalarial($c['id'])?></b></p>
                                        
                                        <p class="text-muted" style="font-size:.7rem">Atualizado:<br/>
                                            <b><?= $this->ultimaAtualizacao($c['id']);?></b>
                                        </p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <?php $fotoPerfil=$this->fotoPerfil($c['id']);
                                        if(empty($fotoPerfil)){?>
                                            <div class="fotoPerfil-mini" style="width:95px;height:95px">
                                                <p class="h1"><i class="fas fa-user-tie"></i></p>
                                                <small>Sem Foto</small>
                                            </div>
                                            <?php 
                                        }else{?>
                                            <div class="fotoPerfil-mini" style="background-image: url('<?=BASE_URL.$fotoPerfil['arquivo']?>');width:95px;height:95px;border:#fff 4px solid;"></div>
                                            <?php
                                        }?>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col text-right">
                                        <p class="h6 text-info"><?= $this->nomeCandidato($c['id']).', '.$this->idadeCandidato($c['id'])?></p>
                                        <div class="btn btn-success btn-sm" style="border-radius:50px">
                                            <i class="fab fa-whatsapp"></i>
                                        </div>
                                        <div class="btn btn-outline-secondary btn-sm">
                                            Dados de Contato
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            <?php endforeach;
        }?>    
        <hr/><nav aria-label="...">
            <ul class="pagination pagination-sm justify-content-center">
                <?php 
                for ($i=1; $i < $totalPag ; $i++) { 
                    $real=$i-1?>
                    <li class="page-item <?php if($pagina==$i){ echo "active";}?>" aria-current="page" onClick="paginaFiltroCandidato(<?= $real?>)">
                        <a class="page-link" href="#"><?= $i?></a>
                    </li>
                    <?php
                }?>
            </ul>
        </nav>                        
    </div>
</form>    