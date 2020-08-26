<?php if(!empty($erro)){echo 'Erro: '.$erro;}?>
<form method="post" id="formFoto" enctype="multipart/form-data">
    <input type="hidden" name="idCandidato" value="<?= $idCandidato?>"/>   
    <input type='file' name='arquivo' id='arquivo' style="display:none"  required class='form-control' onChange="alteraFoto(<?= $idCandidato?>)"/>
    <br/>
    <?php 
    if(empty($fotoPerfil)){?>
        <div class="btn btn-foto btn-outline-primary btn-sm"  onClick="document.getElementById('arquivo').click()">
            <p class="h1"><i class="fas fa-camera"></i></p>
            Selecione <br/> uma foto
        </div>        
        <br/>
        <small>Escolha uma foto de rosto atual, com boa resolução e em que você esteja olhando para câmera.</small> 
       
    <?php 
    }else{?>
        <div class="btn fotoPerfil" onClick="document.getElementById('arquivo').click()" style="background-image: url('<?=BASE_URL.$fotoPerfil['arquivo']?>')"></div>
        <small>Clique na imagem para alterar a foto.</small>
        <?php
    }?>
    <br/>
    <small class="text-muted">Tipos de arquivos aceitos:'png','jpeg','jpg','gif'</small>
    
</form>