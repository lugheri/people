<div class="row">
    <div class="col">
        <small class="text-muted">Cadastre as principais informações dos seus clientes aqui!</small>
    </div>
</div>

<form id='form' method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-3">
            <label for="desde">Desde</label>
            <input type="date" id="desde" name="desde" class="form-control"/>
        </div>
        <div class="col">
            <label for="logo">Logo</label>
            <input type='file' name='logo' id='logo' required class='form-control'/>
        </div>
        <div class="col-2">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Ativa</option>
                <option value="0">Inativa</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="nome" title="Campo Obrigatório">Nome<b class="text-danger">*</b></label>
            <input type="text" id="nome" name="nome" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <br/>
            <p class="text-muted">Escolha um nome para ser o link de acesso:</p>
        </div> 
        <div class="col-4">
            <label for="link">Link</label>
            <input type="text" id="link" name="link" class="form-control"/>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col text-right">
            <button type="submit" class="btn btn-primary" onClick="cadastrarCliente()">
                <i class="fas fa-plus"></i> Concluir Cadastro
            </button>
        </div>
    </div>
</form>    
