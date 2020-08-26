<div class="container_fluid">
    <div class="row">
        <div class="col">
            <p class="h5 text-secondary"><i class="fas fa-briefcase text-info" aria-hidden="true"></i> Configurações do módulo de Vagas</p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-10 offset-1">
        
            <div class="row" style="margin-bottom:40px">
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-flag"></i></p>
                    <small class="text-info"><b>Status de Vaga</b></small><br/>
                    <small class="text-secondary"><?= $totalStatus?> Statu(s) Cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_statusVagas()">                   
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="far fa-check-circle"></i></p>
                    <small class="text-info"><b>Benefícios</b></small><br/>
                    <small class="text-secondary"><?= $totalBeneficios?> Benefício(s) Cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_beneficiosVagas()">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-tasks"></i></p>
                    <small class="text-info"><b>Etapas do Processo Seletivo</b></small><br/>
                    <small class="text-secondary">0 Etapa(s) Cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>      
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-handshake"></i></p>
                    <small class="text-info"><b>Formas de Contratação</b></small><br/>
                    <small class="text-secondary"><?= $totalFormasContratacao?> Forma(s) Cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_formasContratacaoVagas()">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>      
            </div>
            
            <div class="row" style="margin-bottom:40px">
                <div class="col-3 text-center">            
                    <p class="h1 text-info"><i class="fas fa-tags"></i></p>
                    <small class="text-info"><b>Tipos de Vaga</b></small><br/>
                    <small class="text-secondary">0 Tipo(s) Cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col-3 text-center">            
                    <p class="h1 text-info"><i class="fas fa-flag-checkered"></i></p>
                    <small class="text-info"><b>Status de Fechamento</b></small><br/>
                    <small class="text-secondary">0 Statu(s) Cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col-3 text-center">            
                    <p class="h1 text-info"><i class="fas fa-search"></i></p>
                    <small class="text-info"><b>Fontes de Pesquisa</b></small><br/>
                    <small class="text-secondary">0 Fonte(s) Cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="">
                    <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>      
            </div>
        </div>
    </div>

</div>
