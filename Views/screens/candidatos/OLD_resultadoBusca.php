<div class="row">
    <div class="col">
        <div class="btn btn-sm btn-outline-secondary" onCLick="setaBusca('buscaSimples','<?= $idVaga?>')">
            <i class="fas fa-search"></i> Busca Simples
        </div>
        <div class="btn btn-sm btn-outline-secondary" onCLick="setaBusca('buscaAvancada','<?= $idVaga?>')">
            <i class="fas fa-search-plus"></i> Busca Avançada
        </div>
        <div class="btn btn-sm btn-outline-secondary" onCLick="setaBusca('pesquisaCandidato','<?= $idVaga?>')">
            <i class="fas fa-filter"></i> Pequisa de Candidato
        </div>
    </div>
</div>
    <br/>
<fieldset class="border p-2" style="background:#fff">
    <legend class="w-auto"><i class="fas fa-list"></i> Resultado da busca</legend> 
    <?php 
    if(empty($resultadoBusca)){?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        Nenhum Candidato encontrado
                    </div>
                </div>
            </div>
        </div>
    <?php
    }else{?>
        <form id="formSelecionaCandidatos" method="post">
            <input type="hidden" name="idVaga" value="<?= $idVaga?>"/>
        <div class="row">
            <div class="col">
                <?php echo count($resultadoBusca).' Candidato(s) localizado(s)';?>
            </div>
            <div class="col text-right">
                <?php 
                if(!empty($idVaga)){?>
                    <button type="submit" class="btn btn-info btn-sm" style="float:right" onClick="selecionarCandidato()">
                        <i class="fas fa-user-check"></i> Selecionar marcados
                    </button>
                    <?php
                }?>                
            </div>
        </div>
        <hr/>
        <div class="row">
            <?php    
            foreach($resultadoBusca as $r):
                $dadosPessoais=$this->dadosPessoaisCandidatos($r['id'])?>
                <div class="col-4">
                    <div class="card" style="margin-bottom:10px">
                        <div class="card-header">
                            <div class="row">
                                <div class="col text-center">
                                    <?php $fotoPerfil=$this->fotoPerfil($r['id']);
                                    if(empty($fotoPerfil)){?>
                                        <div class="fotoPerfil-mini">
                                            <p class="h1"><i class="fas fa-user-tie"></i></p>
                                            Sem Foto
                                        </div>
                                        <?php 
                                    }else{?>
                                        <div class="fotoPerfil-mini" style="background-image: url('<?=BASE_URL.$fotoPerfil['arquivo']?>')"></div>
                                        <?php
                                    }?>
                                    <p class="h5"> <?= $dadosPessoais['nome']?></p>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <a class="btn btn-outline-info btn-sm" title="Abrir Ficha" href="<?= LINK ?>candidatos/fichaCandidato/<?= base64_encode($r['id'].':edit')?>">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                    <div class="btn btn-outline-secondary btn-sm" id='selecionar_<?=$r['id']?>' onClick="marcarCandidato('<?= $r['id']?>',1)">
                                        <i class="far fa-square"></i> Marcar
                                    </div>
                                   
                                    <div class="btn btn-success btn-sm hidden" id='deselecionar_<?=$r['id']?>' onClick="marcarCandidato('<?= $r['id']?>',0)">
                                        <i class="far fa-check-square"></i> Marcado
                                    </div>
                                        
                                </div>
                            </div>                            
                            <input type="hidden" name='selecionados[]' id='selecionaCandidato_<?=$r['id']?>' value='' class="form-control">
                        </div>
                        <div class="card-body text-center">
                           //Curriculo do candidato
                        </div>
                        <div class="card-footer">
                             
                        </div>
                    </div>
                </div>
                <br/>
                <?php 
            endforeach;
        }?>
    </div>
    </form>
</fieldset>  