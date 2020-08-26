<div class="card card-main">
    <div class="card-header-main">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item-main">
                <a class="nav-link-main <?php if($tela=="usuarios"){ echo "active";}?>" href="<?= LINK?>usuarios/">
                    <i class="fas fa-id-card-alt"></i> Usuários
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body card-body-main" id='body_tela'>
        <?php require $tela.".php";?>
    </div>
</div>