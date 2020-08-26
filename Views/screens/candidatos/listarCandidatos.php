<div class='card'>
	<div class='card-body'>
		<div class='row'>
			<div class='col'>
				<p class='h4'>Candidatos</p>
			</div>
			<div class='col-2'>
				<a class='btn btn-outline-info btn-sm btn-block' href="<?= LINK?>candidatos/novoCandidato"> 
					<i class="fas fa-user-plus"></i> Novo Candidato
				</a>
			</div>
		</div>

		<div class='row'>
			<div class='col'  id='tabAlunos'>
				<table class='table table-sm table-striped table-hover table-bordered'>
					<tHead class="thead-light">
						<tr>
							<th>Cod</th>
							<th>Data Cadastro</th>
                            <th>Área de Interesse</th>
							<th>Nome</th>
							<th>Nascimento</th>
							<th>Cidade</th>
							<th>UF</th>
							<th>Email</th>
                            <th rowspan="2"></th>
						</tr>
					
						<tr>
							<th>
								<div class="dropdown">		
								    <?php if(!empty($f_id)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>								
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="id"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-numeric-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-numeric-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_id)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','id','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down"></i> Classificar do menor para o maior
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','id','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down-alt"></i> Classificar do maior para o menor
	    								</a>

	    								<!-- FILTROS DO CAMPO ID-->
	    								<?php
	    								//condfiguracoes
	    								$field='id';//nome do curto do campo
	    								$nameField='i.id';//nome do campo
	    								$nameFilter='f_id';//nome do filtro 
	    								$nameDiv='f_idValues';//nome do div 
	    								$filtroSel=$f_id;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
					    											         $f_id,
					    											         $f_desde,
					    											         $f_areaInteresse,
					    											         $f_nome,
					    											         $f_nascimento,
					    											         $f_cidade,
					    											         $f_estado,
					    											         $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO ID-->

	    								 <div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>
							<th>
								<div class="dropdown">
									<?php if(!empty($f_desde)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="desde"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-numeric-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-numeric-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_desde)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','desde','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down"></i> Classificar do mais novo para o mais antigo 
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','desde','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down-alt"></i> Classificar do mais antigo para o mais novo
	    								</a>
	    								<div class="dropdown-divider"></div>

	    								<!-- FILTROS DO CAMPO DATA-->
	    								<?php
	    								//condfiguracoes
	    								$field='desde';//nome do curto do campo
	    								$nameField='i.desde';//nome do campo
	    								$nameFilter='f_desde';//nome do filtro 
	    								$nameDiv='f_desdeValues';//nome do div 
	    								$filtroSel=$f_desde;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
					    											         $f_id,
					    											         $f_desde,
					    											         $f_areaInteresse,
					    											         $f_nome,
					    											         $f_nascimento,
					    											         $f_cidade,
					    											         $f_estado,
					    											         $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO DESDE-->

	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>							
							</th>
                            <th>
								<div class="dropdown">
									<?php if(!empty($f_areaInteresse)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="areaInteresse"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-alpha-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-alpha-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_areaInteresse)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','areaInteresse','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down"></i> Classificar de A a Z
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','areaInteresse','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down-alt"></i> Classificar de Z a A
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO AREA INTERESSE-->
	    								<?php
	    								//condfiguracoes
	    								$field='areaInteresse';//nome do curto do campo
	    								$nameField='i.areaInteresse';//nome do campo
	    								$nameFilter='areaInteresse';//nome do filtro 
	    								$nameDiv='f_areaInteresseValues';//nome do div 
	    								$filtroSel=$f_areaInteresse;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											          //filtros
                                                                              $f_id,
                                                                              $f_desde,
                                                                              $f_areaInteresse,
                                                                              $f_nome,
                                                                              $f_nascimento,
                                                                              $f_cidade,
                                                                              $f_estado,
                                                                              $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO AREA INTERESSE-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>
							<th>
								<div class="dropdown">
									<?php if(!empty($f_nome)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="nome"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-alpha-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-alpha-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_nome)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','nome','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down"></i> Classificar de A a Z
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','nome','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down-alt"></i> Classificar de Z a A
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO NOME-->
	    								<?php
	    								//condfiguracoes
	    								$field='nome';//nome do curto do campo
	    								$nameField='dp.nome';//nome do campo
	    								$nameFilter='f_nome';//nome do filtro 
	    								$nameDiv='f_nomeValues';//nome do div 
	    								$filtroSel=$f_nome;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
                                                                             $f_id,
                                                                             $f_desde,
                                                                             $f_areaInteresse,
                                                                             $f_nome,
                                                                             $f_nascimento,
                                                                             $f_cidade,
                                                                             $f_estado,
                                                                             $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO NOME-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>
							<th>
								<div class="dropdown">
									<?php if(!empty($f_nascimento)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="nascimento"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-numeric-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-numeric-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_nascimento)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','nascimento','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down"></i> Classificar do menor para o maior
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','nascimento','<?= $page?>')">
	    									<i class="fas fa-sort-numeric-down-alt"></i> Classificar do maior para o menor
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO NASCIMENTO-->
	    								<?php
	    								//condfiguracoes
	    								$field='nascimento';//nome do curto do campo
	    								$nameField='dp.nascimento';//nome do campo
	    								$nameFilter='f_nascimento';//nome do filtro 
	    								$nameDiv='f_nascimentoValues';//nome do div 
	    								$filtroSel=$f_nascimento;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
                                                                             $f_id,
                                                                             $f_desde,
                                                                             $f_areaInteresse,
                                                                             $f_nome,
                                                                             $f_nascimento,
                                                                             $f_cidade,
                                                                             $f_estado,
                                                                             $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO NASCIMENTO-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>

                            <th>
								<div class="dropdown">
									<?php if(!empty($f_cidade)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="cidade"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-alpha-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-alpha-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_cidade)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','cidade','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down"></i> Classificar de A a Z
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','cidade','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down-alt"></i> Classificar de Z a A
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO CIDADE-->
	    								<?php
	    								//condfiguracoes
	    								$field='cidade';//nome do curto do campo
	    								$nameField='e.cidade';//nome do campo
	    								$nameFilter='f_cidade';//nome do filtro 
	    								$nameDiv='f_cidadeValues';//nome do div 
	    								$filtroSel=$f_cidade;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
                                                                             $f_id,
                                                                             $f_desde,
                                                                             $f_areaInteresse,
                                                                             $f_nome,
                                                                             $f_nascimento,
                                                                             $f_cidade,
                                                                             $f_estado,
                                                                             $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO CIDADE-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>

                            <th>
								<div class="dropdown">
									<?php if(!empty($f_estado)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="estado"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-alpha-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-alpha-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_estado)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','estado','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down"></i> Classificar de A a Z
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','estado','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down-alt"></i> Classificar de Z a A
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO ESTADO-->
	    								<?php
	    								//condfiguracoes
	    								$field='estado';//nome do curto do campo
	    								$nameField='e.estado';//nome do campo
	    								$nameFilter='f_estado';//nome do filtro 
	    								$nameDiv='f_estadoValues';//nome do div 
	    								$filtroSel=$f_estado;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
                                                                             $f_id,
                                                                             $f_desde,
                                                                             $f_areaInteresse,
                                                                             $f_nome,
                                                                             $f_nascimento,
                                                                             $f_cidade,
                                                                             $f_estado,
                                                                             $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO ESTADO-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>

                            <th>
								<div class="dropdown">
									<?php if(!empty($f_usuario)):$btn='btn btn-info btn-sm';else:$btn='btn btn-dark btn-sm';endif;?>							
									<button class="<?= $btn ?>" style="float: right;"  
									        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									        <small>
									        	<?php 
										        if($campo=="usuario"):
										        	if($ordem=='asc'):
										        		echo '<i class="fas fa-sort-alpha-down"></i> ';
										        	else:
										        		echo '<i class="fas fa-sort-alpha-down-alt"></i> ';
										        	endif;
										        endif;	
										        if(!empty($f_usuario)):echo '<i class="fas fa-filter"></i>';endif;?>


										        <i class="fas fa-caret-down"></i>
									    	</small>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    								<a class="dropdown-item" href="#" onClick="classificar('asc','usuario','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down"></i> Classificar de A a Z
	    								</a>
	    								<a class="dropdown-item" href="#" onClick="classificar('desc','usuario','<?= $page?>')">
	    									<i class="fas fa-sort-alpha-down-alt"></i> Classificar de Z a A
	    								</a>
	    								<div class="dropdown-divider"></div>
	    								<!-- FILTROS DO CAMPO USUARIO-->
	    								<?php
	    								//condfiguracoes
	    								$field='usuario';//nome do curto do campo
	    								$nameField='i.usuario';//nome do campo
	    								$nameFilter='f_usuario';//nome do filtro 
	    								$nameDiv='f_usuarioValues';//nome do div 
	    								$filtroSel=$f_usuario;//filtro ativo
	    								?>

	    								<div class="dropdown-divider"></div>
		    							<form class="px-4 py-3">
		    							 	<div class="form-group">
		    									<div class="input-group input-group-sm">
		    										<input type="text" name="bsc" class="form-control" placeholder="Buscar" aria-describedby="bsc" onInput="bscVal_filtro(this.value,'<?= $nameField?>','<?= $nameFilter?>','<?= $nameDiv?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
			    									<div class="input-group-append">
			    										<span class="input-group-text" id="bsc"><i class="fas fa-search"></i></span>
			    									</div>
			    								</div>	    										
		    								</div>
		    								
			    							<div class='card'>
			    								<div class='card-body' style="height: 200px; overflow: auto;" id='<?= $nameDiv?>'>
			    									<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
				    									<small>Selecionar Todos</small>
				    								</a>
					    							<?php 
					    							$filtro=$this->opcFiltro($nameField,//campo
					    								                     '',//valor
					    											         $start,
					    											         $qtd,
					    											         //filtros
                                                                             $f_id,
                                                                             $f_desde,
                                                                             $f_areaInteresse,
                                                                             $f_nome,
                                                                             $f_nascimento,
                                                                             $f_cidade,
                                                                             $f_estado,
                                                                             $f_usuario);
					    							foreach ($filtro as $f):?>
					    								<a class="dropdown-item" href="#" onClick="filtrar('<?= $nameFilter?>','<?= $f[$field]?>','<?= $ordem?>','<?= $campo?>','<?= $page?>')">
					    									<small>
					    										<?php 
					    										if($filtroSel==$f[$field]): echo "<i class='fas fa-check text-info'></i> -  ";
					    										else: echo "<i class='far fa-square'></i> -  ";endif;
					    										echo $f[$field]?>
					    									</small>
					    								</a>
					    							<?php endforeach?>
				    							</div>
				    						</div>	
			    						</form>
		    							
		    							<!-- FINAL DOS FILTROS DO CAMPO USUARIO-->
	    								<div class="dropdown-divider"></div>
	  								</div>
								</div>
							</th>
							
							
							
						</tr>
					</tHead>

					<!-- INICIO DA LISTAGEM DOS DADOS -->
					<tbody>
						<?php foreach ($listCandidatos as $c):?>
							<tr>
								<th class='text-center' style="background: #eee"><?= $c['id']?></th>
								<td><?= date('d/m/Y', strtotime($c['desde']))?></td>
								<td><?= $c['areaInteresse']?></td>
								<td><?= $c['nome']?></td>
								<td><?= date('d/m/Y', strtotime($c['nascimento']))?></td>
								<td><?= $c['cidade']?></td>
								<td><?= $c['estado']?></td>
								<td><?= $c['usuario']?></td>
								<td>
									<a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($c['id'].':'.$c['nome'])?>" class='btn btn-info btn-sm btn-block' title="Abrir ficha do aluno">
										<i class="fas fa-folder-open"></i>
									</a>
								</td>
							</tr>
						<?php endforeach;?>	
					</tbody>
				</table>	

				<?php if(!empty($pages)):?>

					<nav>
					  <ul class="pagination pagination-sm pagination justify-content-center">
					  	<li class="page-item">
					      <a class="page-link" href="#" aria-label="Previous" onClick="pag_Alunos('<?= $ordem?>','<?= $campo?>','<?= $page-1?>')">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					  	<?php
					  	$tpe = 30;//Total de paginas exibidas
					  	if($pages>$tpe){
					  		if($page<=$tpe/2){
	                           $p=$tpe;//ultima pagina exibida
	                           $st=1;//start da contagem de paginas
					  		}else{
					  			$st=$page-($tpe/2);//coloca a primeira pagina na metade da pag atual
					  			$p=$st+$tpe;
					  		}
					  		
					  	}else{
					  		$p=$pages;//total de paginas
					  		$st=1;//start da contagem de paginas
					  	}

					  	for ($i=$st; $i <= $p; $i++):
					  		if($i>$pages){exit;}
					  		if($page==$i){?>
					  			<li class="page-item active" aria-current="page">
						  		 	<span class="page-link">
						  	 		 	<?=$i?>
						  	 			<span class="sr-only">(current)</span>
						     		</span>
						     	</li>
					  	 		<?php
					  	 	}else{?>
					  			<li class="page-item"><a class="page-link" href="#" onClick="pag_Alunos('<?= $ordem?>','<?= $campo?>','<?= $i?>')"><?= $i?></a></li>
					  			<?php 
					  		}	
					  	endfor;?>	
					  	 <li class="page-item">
					      <a class="page-link" href="#" aria-label="Next"  onClick="pag_Alunos('<?= $ordem?>','<?= $campo?>','<?= $page+1?>')">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>			    
					  </ul>
					</nav>
				<?php endif;?>

				<small class='text-muted'><?= $totalCandidatos?> Registros</small>
				<br/>
				<?php if(!empty($ordem)){?>
				<small class="text-muted">Ordenado pelo campo: <?= $campo?></small>
				<br/>
				<?php }?>
				<small class="text-muted">Total de páginas: <?= $pages?></small>
				<hr/>

				<!--FILTROS-->
				<input type="hidden" id="f_id" value="<?= $f_id?>" placeholder="f_id">
				<input type="hidden" id="f_desde" value="<?= $f_desde?>" placeholder="f_desde">
				<input type="hidden" id="f_areaInteresse" value="<?= $f_areaInteresse?>" placeholder="f_areaInteresse">
				<input type="hidden" id="f_nome" value="<?= $f_nome?>" placeholder="f_nome">
				<input type="hidden" id="f_nascimento" value="<?= $f_nascimento?>" placeholder="f_nascimento">
				<input type="hidden" id="f_cidade" value="<?= $f_cidade?>" placeholder="f_cidade">
				<input type="hidden" id="f_estado" value="<?= $f_estado?>" placeholder="f_estado">
				<input type="hidden" id="f_usuario" value="<?= $f_usuario?>" placeholder="f_usuario">
			</div>
		</div>			
	</div>
</div>
