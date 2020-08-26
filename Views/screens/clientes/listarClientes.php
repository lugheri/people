<div class="container-fluid">
    
    <div class="row">
        <div class="col-3" style="max-height:550px; overflow: auto;">
            <p class="h6 text-secondary"><i class="fas fa-filter" aria-hidden="true"></i> Filtrar Por:</p>
            <form method="post" id="formBuscaCliente">
                <input type="hidden" name="pagina" id="pagina" value="0"/>

                <div class="accordion" id="filtrosPesquisa">    
                    <div class="card">
                        <div class="card-header" id="heading_F1">
                            <b class="text-info">Informações</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F1" aria-expanded="true" aria-controls="filtro_F1">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F1" class="collapse show" aria-labelledby="heading_F1" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="razaoSocial">Razão Social</label>
                                        <input type="text" name="razaoSocial" id="razaoSocial" onInput="novaBuscaCliente()" class="form-control form-control-sm"/>
                                    </div>

                                    <div class="col-12">
                                        <label for="nome">Nome Fantasia</label>
                                        <input type="text" name="nome" id="nome" onInput="novaBuscaCliente()" class="form-control form-control-sm"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="heading_F2">
                            <b class="text-info">Endereço</b>
                            <div class="btn btn-sm btn-outline-info" style="float:right" type="button" data-toggle="collapse" data-target="#filtro_F2" aria-expanded="true" aria-controls="filtro_F2">
                                <small><i class="fas fa-minus"></i></small>
                            </div>
                        </div>
                        <div id="filtro_F2" class="collapse show" aria-labelledby="heading_F2" data-parent="#filtrosPesquisa">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        //campos    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--accordion-->  
                <label for="limite">Clientes por página</label>
                <select name="limite" id="limite" class="form-control" onChange="novaBuscaCliente()">                
                    <option value="5">5 Clientes</option>
                    <option value="10">10 Clientes</option>
                    <option value="30">30 Clientes</option>
                    <option value="50">50 Clientes</option>
                    <option value="1">teste</option>
                </select>
            </form>
        </div>
        
        <div class="col" id="resultadoBuscaCliente">
            <?php require_once "resultadoBuscaCliente.php"?>
        </div>
    </div>
</div>
