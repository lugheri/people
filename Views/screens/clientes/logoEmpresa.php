<?php if(!empty($erro)){echo 'Erro: '.$erro;}?>
<form method="post" id="formLogo" enctype="multipart/form-data">
    <input type="hidden" name="idCliente" value="<?= $idCliente?>"/>   
    <input type='file' name='arquivo' id='arquivo' style="display:none"  required class='form-control' onChange="alteraLogotipo()"/>
    <br/>
    <?php 
    if(empty($logoEmpresa)){?>
        <div class="btn btn-foto btn-outline-primary btn-sm"  onClick="document.getElementById('arquivo').click()">
            <p class="h1"><i class="fas fa-camera"></i></p>
            Logotipo <br/>da empresa
        </div>     
        <?php 
    }else{?>
        <div class="btn fotoPerfil" onClick="document.getElementById('arquivo').click()" style="background-image: url('<?=BASE_URL.$logoEmpresa['arquivo']?>')"></div>
        <br/><small>Clique na imagem para alterar o logo.</small>
        <?php
    }?>
    <small class="text-muted">Tipos de arquivos aceitos:'png','jpeg','jpg','gif'</small>
    
</form>