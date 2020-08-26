<!--<div class="row">
    <div class="col">
        <div class="tituloModulo">
            <p><i class="fas fa-briefcase"></i> Vagas</p>
            <small>Gerencie as suas vagas aqui!</small>
        </div>
    </div>
</div>
-->
<div class="card card-main">
  <div class="card-header-main">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="visaoGeral"){ echo "active";}?>" href="<?= LINK?>vagas/"><i class="fas fa-chart-pie"></i> Visão Geral</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="listarVagas"){ echo "active";}?>" href="<?= LINK?>vagas/listarVagas"><i class="fas fa-filter"></i> Listagem de Vagas</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="cadastroVaga"){ echo "active";}?>" href="<?= LINK?>vagas/cadastroVaga"><i class="fas fa-plus"></i> Cadastro de Vagas</a>
      </li>     
    </ul>
  </div>
  <div class="card-body card-body-main" id='body_tela'>
    <?php require $tela.".php";?>
    
  </div>
</div>


<small class="text-muted">Modo Depuração: Tela <?= $tela?></small>