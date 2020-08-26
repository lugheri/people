<div class="row">
    <div class="col">
        <p class="h5 text-secondary" style='margin-bottom:0px'><i class="fas fa-users text-info" aria-hidden="true"></i> Lista de Clientes</p>
        <small class="text-muted">Exibindo <b><?=$pagina?></b> - <b><?= $totalPag?></b> de <b><?= $totalClientes?></b> clientes</small>
    </div>
    <div class="col text-right">
        <a href="<?= LINK?>clientes/novoCliente" class="btn btn-info">
            <i class="fas fa-user-plus"></i> Cadastrar novo Cliente
        </a>
    </div>
</div>
<hr/>
<div class="resultadoBuscaCliente">   
    <?php
    if(empty($resultadoBuscaCliente)){?>
        <div class="card">
            <div class="card-header text-center">
                <br/>
                <p class="h2 text-info"><i class="fas fa-user-slash"></i></p>
                <p class="h5 text-secondary">Nenhum cliente foi localizado pelos filtros informados!</p>
                <br/>
            </div>
        </div>
        <?php    
    }else{
        foreach($resultadoBuscaCliente as $c):
            $resumo=$this->resumoCliente($c['id']);?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2" style="border-left:1px solid #ccc">
                        <?php 
                            $logoEmpresa=$this->logoEmpresa($c['id']);
                            if(empty($logoEmpresa)){?>
                                <div class="btn fotoPerfil-mini">
                                    <p class="h4"><i class="fas fa-camera"></i><br/>
                                    <small style="font-size:.6rem;">Logotipo da empresa</small></p>
                                </div>
                                <?php 
                            }else{?>
                                <div class="btn fotoPerfil-mini" style="background-image: url('<?=BASE_URL.$logoEmpresa['arquivo']?>');background-size: 100% auto;"></div>
                                <?php
                            }?>
                        </div>
                        <div class="col" style="padding:5px; max-height:200px; overflow:auto">
                            <p class="h5 text-info"><b><?= $resumo['nome']?></b></p>
                            <p class="text-muted" style="font-size:.8rem;">Razão Social:<?= $resumo['razaoSocial']?> CPNJ: <?= $resumo['cnpj']?>
                            <br/>Cidade: <?= $resumo['cidade'] . ' - '. $resumo['estado']?></p>
                        </div>
                        <div class="col-1">    
                            <a href="<?= LINK.'clientes/editarCliente/'.base64_encode($c['id'].':editaCliente')?>" class="btn btn-outline-info btn-block" title="Abrir Cliente" style="float:right">
                                <i class="fas fa-folder-open"></i>
                            </a>
                            <div class="btn btn-outline-secondary btn-block" title="contatos" style="float:right">
                                <i class="fas fa-phone"></i>
                            </div>                            
                        </div>                            
                    </div>
                </div>
            </div>
            <br/>
        <?php endforeach;
    }?>    
    <hr/>
    <nav aria-label="...">
        <ul class="pagination pagination-sm justify-content-center">
            <?php 
            for ($i=1; $i < $totalPag ; $i++) { 
                $real=$i-1?>
                <li class="page-item <?php if($pagina==$i){ echo "active";}?>" aria-current="page" onClick="paginaFiltroCliente(<?= $real?>)">
                    <a class="page-link" href="#"><?= $i?></a>
                </li>
                <?php
            }?>
        </ul>
    </nav>                        
</div>    