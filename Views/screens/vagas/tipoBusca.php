<div class="row"> 
    <?php
    if($tipoBusca=="razaoSocial"){?>
        <div class="col">
            <label for="razao">Razão Social</label>
            <input type="text" name="razao" class="form-control">
        </div>
        <?php
    }

    if($tipoBusca=="codigoVaga"){?>
        <div class="col">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" required class="form-control">
        </div>
        <?php
    }

    if($tipoBusca=="selecionador"){?>
        <div class="col">
            <label for="selecionador">Selecionador</label>
            <select name="selecionador" required class="form-control">
                <option value=""></option>
            </select>
        </div>
        <?php
    }

    if($tipoBusca=="data"){?>
        <div class="col">
            <label for="de">De</label>
            <input type="date" name="de" required class="form-control">
        </div>
        <div class="col">
            <label for="ate">Até</label>
            <input type="date" name="ate" required class="form-control">
        </div>
        <?php
    }

    if($tipoBusca=="tituloVaga"){?>
        <div class="col">
            <label for="titulo">Digite o título</label>
            <input type="text" name="titulo" required class="form-control">
        </div>
        <?php
    }

    if($tipoBusca=="celula"){?>
        <div class="col">
            <label for="celula">Selecionador</label>
            <select name="celula"  class="form-control">
                <option value=""></option>
            </select>
        </div>
        <?php
    }?>
</div>