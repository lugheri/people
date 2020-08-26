<!--ESTILO DA PAGINA-->
<style type="text/css">
    body{
        font-family:montserrat;
    }

    .navbar-page{
        padding:.5rem 3rem;
        background:#000;
        opacity: .8;
        position: absolute;
        width:100%;
        z-index: 100;
        top:0;
    }

    .brand{
        height: 70px;
    }

    .ses_home{
        background-image: url('../../img/bgCandidato.jpg');
        background-size: 110%;
        background-color:#004f8e;
        background-blend-mode: multiply;
        padding:50px 20px;
        position: relative;
        z-index: 0;
        height: 600px;
    }

    .ses_home .titulo{
        margin-top: 150px;
        font-weight: bold;
        color:#fff;	
    }

    .ses_home .texto{
        color:#fff;	
    }

    .btn-cadastro {
        color: #fff;
        background-color: #db4a05;
        border-color: #db4a05;
    }

    .barraBusca{
        position: absolute;
        left:0px;
        bottom: 0px;
        width: 100%;
        background:#000;
        opacity: .8;
        z-index: 100;
        padding:2rem 2rem;
    }

    .barraBusca .h5{
        color:#fff;
        font-weight: bold;
        margin-top: 9px;
    }
</style>

<!--BARRA DE NAVEGACAO-->
<nav class="navbar navbar-page navbar-expand-lg navbar-dark">
    <a class="navbar-brand btn btn-outline-light" title="editarLogo" href="#" onClick="editarLogo('<?= $infoPage['idCliente']?>')">
        <?php 
        if(empty($infoPage['logo'])){?>
            <small class="text-muted">LOGO</small>
            <?php 
        }else{?>
            <img src='<?= BASE_URL?>assets/img/logo-branco.png' class='brand'/>
            <?php 
        }?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id='btn-toggle'>
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
        <ul class="navbar-nav mr-auto">
            <?php 
            if(!empty($infoPage['buscaVaga'])){?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onClick='rolar("vagas")'>
                        Vagas
                    </a>
                </li>
                <?php 
            }
                   
            if(!empty($infoPage['comoFunciona'])){?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onClick='rolar("comoFunciona")'>
                        Como Funciona
                    </a>
                </li>
                <?php 
            }?>
            <!--
            <li class="nav-item">
                <a class="nav-link" href="#" onClick='rolar("FAQ")'>
                    Perguntas Frequentes
                </a>
            </li>
            -->
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark" href="#" style="border-radius:20px;color:#fff;border-color:#fff">
                    Login Candidato                           
                </a>
            </li>
        </ul>
    </div>
</nav>

<!--SESSAO PRINCIPAL-->
<section class="ses_home" id="vagas">          
    <br/>
    <div class="container">
        <div class="row" style="margin-top:50px;">
            <div class="col-md-8 col-12">
                <p class="h2 titulo">RHadar Tecnologia</p>
                <br/>
                <p class="h5 texto">
                    A Rhadar Tecnologia oferece soluções e serviços otimizados, <br/>garantindo melhores resultados para você e sua empresa
                </p>
                <hr/>
                <a href="<?= BASE_URL?>candidato/cadastro" class="btn btn-cadastro" style='border-radius:20px;padding: 0.375rem 5rem;'>
                    Cadastre-se gratuitamente
                </a>
            </div>
        </div>
    </div>
    <div class="container_fluid barraBusca">
        <div class="row">
            <div class="col-md-3 col-12 text-right"><p class="h5">BUSQUE POR VAGAS:</p></div>
            <div class="col-md-3 col-12"><input type="text" placeholder="Informe o Cargo" class="form-control"/><br/></div>
            <div class="col-md-3 col-12"><input type="text" placeholder="Sua Cidade" class="form-control"/><br/></div>
            <div class="col-md-3 col-12"><div class="btn btn-cadastro btn-block"><b>BUSCAR</b></div></div>
        </div>
    </div>
</section> 