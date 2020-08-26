<fieldset class="border p-2">
    <legend class="w-auto"><i class="fas fa-filter"></i> Filtros de Busca</legend>  
    <div class="container">
        <form method="post" id="formBusca">
            <div class="row">
                <div class="col">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value='todos'>Todos</option>
                        <option value='1'>Aberta</option>
                        <option value='2'>Cancelada</option>
                        <option value='4'>Fechada</option>
                        <option value='3'>Pendente</option>
                    </select>
                </div>

                <div class="col">
                    <label for="filial">Filial</label>
                    <select name="filial" class="form-control">
                        <option value='todos'>Todas</option>
                    </select>
                </div>
            </div>
        
            <div class="row">
                <div class="col-3">
                    <label for="buscaPor">Buscar por:</label>
                    <select name="buscarPor" class="form-control" onChange="tipoBusca(this.value)">
                        <option value='razaoSocial'>Razão social</option>
                        <option value='codigoVaga'>Código da vaga</option>
                        <option value='selecionador'>Selecionador</option>
                        <option value='data'>Data</option>
                        <option value='tituloVaga'>Título da vaga</option>
                        <option value='celula'>Célula</option>
                    </select>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col" id='tipoBusca'>
                            <label for="razao">Razão Social</label>
                            <input type="text" name="razao" class="form-control">
                        </div>
                        <div class="col-3">                        
                            <button type="submit" class="btn btn-info btn-block" style="margin-top:29px" onClick="buscarVaga()">
                                <i class="fas fa-search"></i> Pesquisar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="campo">Ordenar Por</label>
                    <select name="campo" id="campo" onChange="" class="form-control form-control-sm">
                        <option value="v.titulo">Título</option>
                        <option value="c.nome">Cliente</option>
                        <option value="v.dataCadastro">Data</option>
                        <option value="v.id">Código</option>
                    </select>
                </div>
                <div class="col">
                    <label for="ordem">Ordem</label>
                    <select name="ordem" id="ordem" onChange="" class="form-control form-control-sm">
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</fieldset>

<fieldset class="border p-2">
    <legend class="w-auto"><i class="fas fa-list"></i> Resultado da busca</legend>  
    <div classs="container-fluid" id='resultadoBusca'>
        <div class="row">
            <div class="col text-center">
                <p class="h1 text-info"><i class="fas fa-filter"></i></p>
                <p class="h4 text-muted">Filtro de Vagas</p>
            </div>
        </div>
    </div>
</fieldset>  