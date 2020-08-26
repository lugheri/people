<div class="container-fluid" id="telaBusca">
    <div class="row">
        <div class="col">
            <div class="btn btn-sm btn-<?php if($tipoBusca=="buscaSimples"){ echo 'info';}else{ echo "outline-secondary";}?>"
                onCLick="setaBusca('buscaSimples','<?= $idVaga?>')">
                <i class="fas fa-search"></i> Busca Simples
            </div>
            <div class="btn btn-sm btn-<?php if($tipoBusca=="buscaAvancada"){ echo 'info';}else{ echo "outline-secondary";}?>"
                onCLick="setaBusca('buscaAvancada','<?= $idVaga?>')">
                <i class="fas fa-search-plus"></i> Busca Avançada
            </div>
            <div class="btn btn-sm btn-<?php if($tipoBusca=="pesquisaCandidato"){ echo 'info';}else{ echo "outline-secondary";}?>"
                onCLick="setaBusca('pesquisaCandidato','<?= $idVaga?>')">
                <i class="fas fa-filter"></i> Pequisa de Candidato
            </div>
        </div>
    </div>
        <br/>

    <?php require 'busca_'.$tipoBusca.'.php'?>
   
</div>