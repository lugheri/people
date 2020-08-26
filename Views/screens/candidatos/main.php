
<div class="card card-main">
  <div class="card-header-main">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="inicio"){ echo "active";}?>" href="<?= LINK?>candidatos/"><i class="fas fa-chart-pie"></i> Visão Geral</a>
      </li>      
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="busca"){ echo "active";}?>" href="<?= LINK?>candidatos/busca/"><i class="fas fa-search"></i> Buscar Candidatos</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="novoCandidato"){ echo "active";}?>" href="<?= LINK?>candidatos/novoCandidato"><i class="fas fa-user-plus"></i> Novo Candidato</a>
      </li>
    </ul>
  </div>
  <div class="card-body card-body-main" id='body_tela'>
    <?php require $tela.".php";?>
  </div>
</div>