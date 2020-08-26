<div class="sidebar">
    <div class="side-brand">
        <div class="brand-people">
            <img src="<?= BASE_URL?>assets/img/brand.png" alt="PEOPLE">
        </div>
        <div class="brand-client">
            <img src="<?= BASE_URL?>assets/img/favicon.png" alt="PEOPLE">
            <p>Demonstração</p>
        </div>
    </div>
    <div class="sidebuttons">
        <ul>
            <li <?php if($modulo=="home"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>"><i class="fas fa-tachometer-alt"></i> Resumo</a>
            </li>
            <li <?php if($modulo=="vagas"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>vagas"><i class="fas fa-briefcase"></i> Vagas</a>
            </li>
            <li <?php if($modulo=="candidatos"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>candidatos"><i class="fas fa-user-tie"></i> Candidatos</a>
            </li>
            <li <?php if($modulo=="clientes"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>clientes"><i class="fas fa-handshake"></i> Clientes</a>
            </li>
            <!--<li <?php /*if($modulo=="comercial"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>comercial"><i class="fas fa-tags"></i> Comercial/Vendas</a>
            </li>
            <li <?php if($modulo=="recepcao"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>recepcao"><i class="fas fa-concierge-bell"></i> Recepção</a>
            </li>
            <li <?php if($modulo=="entrevista"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>entrevista"><i class="fas fa-clipboard-check"></i> Entrevista Virtual</a>
            </li>
            <li <?php if($modulo=="bne"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>bne"><i class="fas fa-file-alt"></i> BNE</a>
            </li>
            <li <?php if($modulo=="relatorios"){ echo 'class="active"';}?> >
                <a href="<?= LINK*/?>relatorios"><i class="fas fa-chart-pie"></i> Relatórios</a>
            </li>-->
            <li <?php if($modulo=="configuracoes"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>configuracoes"><i class="fas fa-cogs"></i> Configurações</a>
            </li>
            <li <?php if($modulo=="usuarios"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>usuarios"><i class="fas fa-id-card-alt"></i> Usuários</a>
            </li>





             
        </ul>
    </div>
</div>