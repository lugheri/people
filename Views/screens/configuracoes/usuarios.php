<div class="container_fluid">
    <div class="row">
        <div class="col">
            <p class="h5 text-secondary">
                <i class="fas fa-id-badge text-info" aria-hidden="true"></i> Configurações dos acessos dos usuários
            </p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-10 offset-1">
        
            <div class="row" style="margin-bottom:40px">
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-user-shield"></i></p>
                    <small class="text-info"><b>Perfil</b></small><br/>
                    <small class="text-secondary"><?= $totalPerfis?>  Perfil(is) Cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_perfis()">                   
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-id-badge"></i></p>
                    <small class="text-info"><b>Célula</b></small><br/>
                    <small class="text-secondary"><?= $totalCelulas?> celula(s) Cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_celulas()">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>

</div>
