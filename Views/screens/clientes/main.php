

<div class="card card-main">
  <div class="card-header-main">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="visaoGeral"){ echo "active";}?>" href="<?= LINK?>clientes/"><i class="fas fa-chart-pie"></i> Visao Geral</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="listarClientes"){ echo "active";}?>" href="<?= LINK?>clientes/listarClientes"><i class="fas fa-users"></i> Listar Cliente</a>
      </li>
      <li class="nav-item-main">
        <a class="nav-link-main <?php if($tela=="buscarCliente"){ echo "active";}?>" href="<?= LINK?>clientes/buscarCliente"><i class="fas fa-search"></i> Buscar Cliente</a>
      </li>
    </ul>
  </div>
  <div class="card-body card-body-main" id='body_tela'>
    <?php require $tela.".php";?>
    
  </div>
</div>


<small class="text-muted">Modo Depuração: Tela <?= $tela?></small>