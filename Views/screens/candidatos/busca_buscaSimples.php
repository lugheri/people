<fieldset class="border p-2" style="background:#fff">
   <legend class="w-auto"><i class="fas fa-search"></i> Busca Simples</legend>   

   <legend class="w-auto">Dados Gerais</legend> 
   <hr style='margin:2px'/>    
    <form id='formBuscaCandidato' method="POST">
        <input type="hidden" name="tipoBusca" value="buscaSimples"/>
        <div class="row">
            <div class="col-10 offset-1">
                <label for="vaga">Vaga:</label>
                <?php 
                if(empty($idVaga)){?>
                    <select id='idVaga' name='idVaga' class="form-control">
                        <option value=""></option>
                    </select>
                    <?php
                }else{?>
                    <select id='idVaga' name='idVaga' class="form-control">
                        <option value="<?= $idVaga?>"><?= $this->nomeVaga($idVaga)?></option>
                    </select>
                    <?php
                }?>
               
            </div>
        </div>
        <div class="row">
            <div class="col-5 offset-1">
                <label for="funcao">Função:</label>
                <select id='funcao' name='funcao' class="form-control">
                    <option value=""></option>
                    <?php 
                    if(!empty($listaFuncoes)){
                        foreach($listaFuncoes as $f):?>
                        <option value="<?= $f['id']?>"><?= $f['funcao']?></option>
                        <?php
                        endforeach;
                    }?>                    
                </select>
            </div>
      
            <div class="col-5">
                <label for="hierarquia">Hierarquia:</label>
                <select id='hierarquia' name='hierarquia[]' multiple class="form-control">
                    <option value="">Todas</option>
                    <?php foreach($listaHierarquia as $f):?>
                        <option value="<?= $f['id']?>"><?= $f['hierarquia']?></option>
                    <?php endforeach;?>
                </select>
                <small class="text-danger">Segure Ctrl para selecionar mais de uma opção</small>
            </div>
        </div>
        <div class="row">
            <div class="col-5 offset-1">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" name='estado' class="form-control">
                    <option value=""></option>
                    <option value="AC">Acre (AC)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="AM">Amazonas (AM)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="DF">Distrito Federal (DF)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="PA">Pará (PA)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="PR">Paraná (PR)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="RN">Rio Grande do Norte (RN)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                </select>    
            </div>
       
            <div class="col-5">
                <label for="cidade">Cidade:</label>
                <select name='cidade[]' id='cidade' multiple class="form-control">
                    <option value="">Todas</option>
                    <?php
                    if(!empty($listarCidades)){
                        foreach($listarCidades as $c):?>
                            <option value="<?= $c['cidade']?>"><?= $c['cidade']?></option>
                        <?php endforeach;
                    }else{?>
                        <option value="">Vazio</option>
                        <?php
                    } ?>
                </select>
                <small class="text-danger">Segure Ctrl para selecionar mais de uma opção</small>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-1">
                <label for="funcao">Palavra Chave:</label>
                <input type="text" id='palavraChave' name='palavraChave' class="form-control">
            </div>
       
            <div class="col">
                <label for="de">Cadastrado entre:</label>
                <input type="date" id='de' name='de' class="form-control">
            </div>
            <div class="col">
                <label for="ate">Até:</label>
                <input type="date" id='ate' name='ate' class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1">
                <label for="ordenarPor">Ordenar Por</label>:</label>
                <select name="ordenarPor" id="ordenarPor" name="ordenarPor" class="form-control">
                    <option value=""></option>
                    <option value="i.desde">Nome do Candidato</option>
                    <option value="i.desde">Data de Cadastro</option>
                    <option value="e.cidade">Cidade</option>
                    <option value="e.estado">Estado</option>
                </select>    
            </div>
            <div class="col-3">
                <label for="ordem">Ordem:</label>
                <select name="ordem" id="ordem" name="ordem" class="form-control">
                    <option value=""></option>
                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendentes</option>
                </select>    
            </div>
            <div class="col text-center ">
                <br/> 
                <button type="submit" class="btn btn-info btn-block btn-lg" onClick="buscarCandidato()">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </div>
        <hr/>
       
    </form>
</fieldset>