<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="h5 text-secondary"><i class="fas fa-handshake text-info" aria-hidden="true"></i> Configurações do módulo de Cliente</p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-10 offset-1">
        
            <div class="row" style="margin-bottom:40px">
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-flag"></i></p>
                    <small class="text-info"><b>Status de Clientes</b></small><br/>
                    <small class="text-secondary"><?= $totalStatus?> Statu(s) cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_statusClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-shoe-prints"></i></p>
                    <small class="text-info"><b>Origem de Clientes</b></small><br/>
                    <small class="text-secondary"><?= $totalOrigens?> Origen(s) cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_OrigensClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-file-signature"></i></p>
                    <small class="text-info"><b>Contratos</b></small><br/>
                    <small class="text-secondary">Em Desenvolvimeno</small><br/>
                    <div class="btn btn-outline-secondary btn-sm disabled" style='cursor:no-drop'>
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-toolbox"></i></p>
                    <small class="text-info"><b>Serviços</b></small><br/>
                    <small class="text-secondary"><?= $totalServicos?> Serviço(s) cadastrado(s</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_ServicosClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:40px">               
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-history"></i></p>
                    <small class="text-info"><b>Tipos de Histórico</b></small><br/>
                    <small class="text-secondary"><?= $totalHistoricos?> Tipos de Histórico(s) cadastrado(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_HistoricosClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-map-marker-alt"></i></p>
                    <small class="text-info"><b>Zonas</b></small><br/>
                    <small class="text-secondary"><?= $totalZonas?> Zona(s) cadastrada(s)</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_ZonasClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">            
                    <p class="h1 text-info"><i class="fas fa-bookmark"></i></p>
                    <small class="text-info"><b>Ramos</b></small><br/>
                    <small class="text-secondary"><?= $totalRamos?> Ramo(s) cadastrado(s</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_RamosClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
                <div class="col text-center">
                    <p class="h1 text-info"> <i class="fas fa-users"></i></p>
                    <small class="text-info"><b>Grupo de Clientes</b></small><br/>
                    <small class="text-secondary"><?= $totalGPO?> Grupo(s) cadastrado(s</small><br/>
                    <div class="btn btn-outline-info btn-sm" onClick="configurar_GruposClientes()">
                        <i class="fas fa-cogs"></i> Configurar
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 