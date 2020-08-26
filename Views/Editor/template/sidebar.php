<div class="sidebar">
    <div class="brand-people">
        <img src="<?= BASE_URL?>assets/img/logo.png" alt="PEOPLE">
    </div>
        
    <div class="sidebuttons">
        <ul>
            <li <?php if($modulo=="home"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>editorPagina/inicio/<?= base64_encode($infoPage['idCliente'].':desktop')?>"><i class="fas fa-tachometer-alt"></i> Resumo</a>
            </li>

            <li <?php if($modulo=="editarPagina"){ echo 'class="active"';}?> >
                <a href="<?= LINK?>editorPagina/editarPagina/<?= base64_encode($infoPage['idCliente'].':desktop')?>"><i class="fas fa-paint-brush"></i> Editar Página</a>
            </li>
        </ul>
    </div>
    <div class="ferramentas" id='ferramentas'>
        <?php 
        if($modulo=="editarPagina"){?>
            <ul>
                <li>
                    <a href="#" onClick="editarLogo('<?= $infoPage['idCliente']?>')">
                        <i class="fas fa-copyright"></i> Editar o logo
                    </a>
                </li>
                <li>
                    <a href=""> Editar Textos</a>
                </li>                
                <li>
                    <a href=""> Busca Vagas</a>
                </li>
                <li>
                    <a href=""> Imagem de Fundo</a>
                </li>
                <li>
                    <a href=""> Cores</a>
                </li>  
            </ul>
            <?php
        }?>
    </div>
</div>