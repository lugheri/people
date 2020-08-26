<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= LINK?>editorPagina/editarPagina/<?= base64_encode($infoPage['idCliente'].':editarPagina')?>">
        <i class="fas fa-paint-brush"></i> Editar Página
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php if($plataforma=="desktop"){ echo 'active';}?>">
        <a class="nav-link" href="<?= LINK?>editorPagina/editarPagina/<?= base64_encode($infoPage['idCliente'].':desktop')?>"><i class="fas fa-desktop"></i> Versão de Desktop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if($plataforma=="mobile"){ echo 'active';}?>">
        <a class="nav-link" href="<?= LINK?>editorPagina/editarPagina/<?= base64_encode($infoPage['idCliente'].':mobile')?>"><i class="fas fa-mobile"></i> Versão Mobile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= LINK?>editorPagina/preview/<?= base64_encode($infoPage['idCliente'].':'.$plataforma)?>"><i class="fas fa-eye"></i> Preview</a>
      </li>
    </ul>    
  </div>
</nav>
<br/>

<div class="container" style="position:relative; overflow:hidden; padding:0px;">
    <div class="row">
        <div class="col">
            <?php require 'dadosPagina.php'?>
        </div>
    </div>
</div>

