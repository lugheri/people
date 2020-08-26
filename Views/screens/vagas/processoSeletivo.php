<div class="modal-content">
    <div class="card" id='loadAba'>
        <div class="card-header">
	        <p class='h4 tituloFuncao'><i class='fas fa-user-check'></i> Processo Seletivo</p>
	        <small class='subtituloFuncao'>Processo seletivo da vaga: </small>
	        <br/>
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="vagas"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','vagas')" href="#"><small>Vaga</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="recebidos"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','recebidos')" href="#"><small>Recebidos</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="selecionados"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','selecionados')" href="#"><small>Selecionados</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="aptos"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','aptos')" href="#"><small>Aptos</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="encaminhados"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','encaminhados')" href="#"><small>Encaminhados</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="aprovados"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','aprovados')" href="#"><small>Aprovados</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="recusados"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','recusados')" href="#"><small>Recusados</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="dataEntrevista"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','dataEntrevista')" href="#"><small>Data Entrevista</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="historico"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','historico')" href="#"><small>Histórico</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="entrevista"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','entrevista')" href="#"><small>Entrevista</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($aba=="fechar"){ echo 'active';}?>" onClick="processoSeletivo('<?= $idVaga?>','fechar')" href="#"><small>Fechar</small></a>
                </li>      			
            </ul>
        </div>
        <div class="card-body">

		    <?php require 'proSel_'.$aba.'.php';?>
        </div>    
  		<div class='card-footer text-right'>
            <div class="btn btn-secondary" data-dismiss="modal">
                Fechar
            </div>
        </div>
    </div>
</div>
