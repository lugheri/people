<div class="corpo" id='corpo'>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?= BASE_URL?>">
            
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">

                    <?php 
                    switch($modulo){
                        case "home":
                            $link=LINK;
                            $nomeModulo='<i class="fas fa-tachometer-alt"></i> Resumo';
                        break;
                        case "vagas":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-briefcase"></i> Vagas';
                        break;
                        case "candidatos":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-user-tie"></i> Candidatos';
                        break;
                        case "clientes":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-handshake"></i> Clientes';
                        break;
                        case "comercial":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-tags"></i> Comercial/Vendas';
                        break;
                        case "recepcao":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-concierge-bell"></i> Recepção';
                        break;
                        case "entrevista":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-clipboard-check"></i> Entrevista Virtual';
                        break;
                        case "bne":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-file-alt"></i> BNE';
                        break;
                        case "relatorios":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-chart-pie"></i> Relatórios';
                        break;
                        case "configuracoes":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-cogs"></i> Configurações</a>';
                        break;
                        case "usuarios":
                            $link=LINK.$modulo;
                            $nomeModulo='<i class="fas fa-id-card-alt"></i> Usuários</a>';
                        break;
                    }?>
                
                    <a class="nav-link active" href="<?= $link?>" tabindex="-1" aria-disabled="true">
                        <p class="h5" style="margin:0px"><?= $nomeModulo?></p>
                    </a>
                </li> 
            </ul>   
            <ul class="navbar-nav ml-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Sem notificações</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user-circle"></i> <?= $userName?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Meu Perfil</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= LINK?>login/sair" tabindex="-1" aria-disabled="true">
                        <i class="fas fa-door-open"></i> Sair
                    </a>
                </li>
            </ul>   
        </div>
    </nav>
    <div class="container-fluid">
       
        <?php $this->loadViewInTemplate($viewName,$viewData);?>
    </div>
    
</div>



<!-- Modal -->

<!-- Modal Principal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-default" role="document" id='modal_content'></div>	    
</div>

<!-- Modal Adicional -->
<div class="modal fade" id="modal_add"   tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog_add" style="z-index:1055" role="document" id='modal_content_add'></div>
    <div class="modal-backdrop fade show" style="z-index:1050;width: 99.2vw;"></div>
</div>

<!-- Modal Auxiliar -->
<div class="modal fade" id="modal_aux"  tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog_aux" style="z-index:1060" role="document" id='modal_content_aux'></div>
    <div class="modal-backdrop fade show" style="z-index:1055;width: 99.2vw;"></div>
</div>


