<div class="container_fluid">
    <div class="row">
        <div class="col">
            <p class="h5 text-secondary"><i class="fas fa-building text-info" aria-hidden="true"></i> Configurações do Gerais</p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-10 offset-1">
        
            <div class="row" style="margin-bottom:40px">
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-cogs"></i></p>
                    <small class="text-info"><b>Configurações Gerais</b></small><br/>
                    <small class="text-secondary"> - </small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">                   
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-id-card"></i></p>
                    <small class="text-info"><b>Dados da Agência</b></small><br/>
                    <small class="text-secondary"> - </small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
               
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-mail-bulk"></i></p>
                    <small class="text-info"><b>Emails</b></small><br/>
                    <small class="text-secondary"> - </small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-hard-hat"></i></p>
                    <small class="text-info"><b>Funções Disponíveis</b></small><br/>
                    <small class="text-secondary"><?= $totalFuncoes?> Funções cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_funcoesVaga()">                   
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:40px">
                
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-laptop"></i></p>
                    <small class="text-info"><b>Informática</b></small><br/>
                    <small class="text-secondary"> - </small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-clipboard-check"></i></p>
                    <small class="text-info"><b>Especialidades</b></small><br/>
                    <small class="text-secondary"><?= $totalEspecialidades?> Funções cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_especialidadesVaga()">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>  
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-ban"></i></p>
                    <small class="text-info"><b>Status de Cancelamento</b></small><br/>
                    <small class="text-secondary"> - </small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center"></div>
            </div>

        </div>
    </div>

</div>
