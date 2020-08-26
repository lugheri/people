<div class="card card-main">
  <div class="card-header-main">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="agencia"){ echo "active";}?>" href="<?= LINK?>configuracoes/"><i class="fas fa-building"></i> Agência</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="vagas"){ echo "active";}?>" href="<?= LINK?>configuracoes/vagas"><i class="fas fa-briefcase"></i> Vagas</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="usuarios"){ echo "active";}?>" href="<?= LINK?>configuracoes/usuarios"><i class="fas fa-id-badge"></i> Usuários</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="candidatos"){ echo "active";}?>" href="<?= LINK?>configuracoes/candidatos"><i class="fas fa-user-tie"></i> Candidatos</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="clientes"){ echo "active";}?>" href="<?= LINK?>configuracoes/clientes"><i class="fas fa-handshake"></i> Clientes</a>
      </li>
    </ul>
  </div>
  <div class="card-body card-body-main" id='body_tela'>
    <?php require $tela.".php";?>
    
  </div>
</div>


<small class="text-muted">Modo Depuração: Tela <?= $tela?></small>