<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col">
                <p class="h4 text-muted"><i class="fas fa-users"></i> Visão geral dos candidatos</p>
                <hr/>
            </div>
        </div>         
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body bg-primary">
                        <div class="row">
                            <div class="col">
                                <p class="h4 text-white" style="float:right;opacity:.7"><i class="fas fa-user-friends"></i></p>
                                <p class="h1 text-light"><?= $totalCandidatos?></p>
                                <p class="h5 text-light">Total de Candidatos</p>
                                <hr/>
                                <a class="btn btn-primary btn-sm" href="<?= LINK?>candidatos/novoCandidato">
                                    <i class="fas fa-user-plus"></i> Novo candidato
                                </a>
                                <b class="text-dark" style="float:right;opacity:.7"><i class="fas fa-calendar-check"></i> <?= $cadastrosHoje?> Cadastrado(s) Hoje!</b>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>    
        <br/>
        <div class="row">
            <div class="col">
                <?php require 'grafico_funcoesCandidatos.php'?>
            </div>
        </div>
    </div>    
    <div class="col-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <?php foreach($topCidades as $tc):?>
                                <tr>
                                    <th><?=$tc['cidade']?></th>
                                    <td><?=$tc['total'];?></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                        
                    </div>
                </div>        
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col">
                                <p class="h1 text-primary"><i class="fas fa-mars"></i></p>
                                <p class="h5 text-muted"><?= round(($homens/$total)*100,0)?>%</p>
                            </div>
                            <div class="col">
                                <p class="h1 text-pink"><i class="fas fa-venus"></i></p>
                                <p class="h5 text-muted"><?= round(($mulheres/$total)*100,0)?>%</p>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <?php require 'grafico_faixaEtaria.php'?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>