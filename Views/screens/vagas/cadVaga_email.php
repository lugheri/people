<p class="h5 text-secondary"><i class="fas fa-briefcase text-info"></i> Cadastro de Vaga</p>
<div class='row'>
    <div class="col">
        <div class="card card-ficha">            
            <div class="card-header">        
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_inclusao/<?= base64_encode($idVaga.':edicao')?>">
                            <i class="fas fa-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_requisitos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Requisitos">
                            <i class="fas fa-tasks"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_local/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Local">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_conhecimento/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Conhecimento">
                            <i class="fas fa-brain"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_contratacao/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Contratação">
                            <i class="fas fa-handshake"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_entrevistas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Entrevistas">
                            <i class="fas fa-file-signature"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_encaminhamentos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Encaminhamentos">
                            <i class="fas fa-exchange-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= LINK?>vagas/cadVaga_email/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Email">
                            <i class="fas fa-envelope"></i> Email
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_arquivos/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Arquivos">
                            <i class="fas fa-paperclip"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>vagas/cadVaga_caracteristicas/<?= base64_encode($idVaga.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Características">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title text-muted"><i class="fas fa-envelope"></i> Texto do Email em Massa</h6>
                <div class="container">
                    <!--inicio do editor de texto-->
                    <div class="menu-bar">
				    	<div class="btn-group" role="group" aria-label="...">
				    		<div class="btn-group" role="group" aria-label="...">
                                <select class="form-control" onChange="comando('fontName',this.value)" style="width: 250px; margin: 3px 5px 0px 5px">
                                    <option value='Arial' style="font-family:'Arial'">Arial</option>
                                    <option value='Arial Black' style="font-family:'Arial Black'">Arial Black</option>
                                    <option value='Century Gothic' style="font-family:'Century Gothic'">Century Gothic</option>
                                    <option value='Courier' style="font-family:'Courier'">Courier</option>
                                    <option value='Courier New' style="font-family:'Courier New'">Courier New</option>
                                    <option value='Geneva' style="font-family:'Geneva'">Geneva</option>
                                    <option value='Georgia' style="font-family:'Georgia'">Georgia</option>
                                    <option value='Helvetica' style="font-family:'Helvetica'">Helvetica</option>
                                    <option value='Times New Roman' style="font-family:'Times New Roman'">Times New Roman</option>
                                    <option value='Times' style="font-family:'Times'">Times</option>
                                    <option value='Verdana' style="font-family:'Verdana'">Verdana</option>
                                </select>

		    					<div class="btn btn-default" title="Cor da Fonte" onClick="document.getElementById('corFonte').click()">
									<i class="fas fa-fill-drip"></i> 
                                </div>
                                <input type="color" style="display:none" id="corFonte" value="#000" onChange="comando('foreColor',this.value)">

								<div onclick="comando('bold')" class="btn btn-default" title="Negrito"><i class="fa fa-bold"></i></div>
		    					<div onclick="comando('italic')" class="btn btn-default" title="Itálico"><i class="fa fa-italic"></i></div>
		    					<div onclick="comando('strikeThrough')" class="btn btn-default" title="Riscado"><i class="fa fa-strikethrough"></i></div>
		    					<div onclick="comando('underline')" class="btn btn-default" title="Sublinhado"><i class="fa fa-underline"></i></div>
		    				</div>
		    			</div>
						<div class="btn-group" role="group" aria-label="...">
							<div onclick="comando('justifyLeft')" class="btn btn-default" title="Alinhar a Esquerda">
								<i class="fa fa-align-left"></i>
							</div>
							<div onclick="comando('justifyCenter')" class="btn btn-default" title="Centralizado">
							 	<i class="fa fa-align-center"></i>
							</div>
							<div onclick="comando('justifyRight')" class="btn btn-default" title="Alinhar a Direita">
							 	<i class="fa fa-align-right"></i>
							</div>
							<div onclick="comando('justifyFull')" class="btn btn-default" title="Justificado">
							 	<i class="fa fa-align-justify"></i>
							</div>
						</div>
						<div class="btn-group" role="group" aria-label="...">
							<div onclick="comando('insertOrderedList')" class="btn btn-default" title="Inserir Lista Numerada">
							  	<i class="fa fa-list-ol"></i>
							</div>
							<div onclick="comando('insertUnorderedList')" class="btn btn-default" title="Inserir Lista">
							 	<i class="fa fa-list-ul"></i>
							</div>										 
						</div>
						<div class="btn-group" role="group" aria-label="...">
						    <div onclick="document.getElementById('texto-email').focus(),comando('selectAll')" class="btn btn-default" title="Selecionar Tudo">
							 	<i class="fas fa-file-alt"></i>
							</div>
							<div onclick="comando('removeFormat')" class="btn btn-default" title="Remover Formatacao">
							 	<i class="fas fa-eraser"></i>
							</div>
                            
                            <select class="form-control" onChange="comando('insertText','{:'+this.value+':}')" style="width: 250px; margin: 3px 5px 0px 5px">
                                <option value='' style="color:#fff">Selecione</option>
                                <option value='' style="color:#999; background:#ececec;">Váriaveis de assinatura</option>
                                <option value='ano'>Ano</option>
                                <option value='assinatura'>Assinatura</option>
                                <option value='dia'>Dia</option>
                                <option value='mes'>Mês</option>
                                <option value='mes_extenso'>Mês por Extenso</option>
                                <option value='rg_testemunha'>Rg da Testemunha</option>
                                <option value='testemunha'>Testemunha</option>

                                <option value='' style="color:#fff"></option>
                                <option value='' style="color:#999; background:#ececec;">Váriaveis de Agência</option>
                                <option value='emp_bairro'>Bairro da Agência</option>
                                <option value='emp_ccm'>Ccm da Agência</option>
                                <option value='emp_cidade'>Cidade da Agência</option>
                                <option value='emp_cnpj'>Cnpj da Agência</option>
                                <option value='emp_endereco_compl'>Complemento do Endereçõ da Agência</option>
                                <option value='emp_ddd'>DDD da Agência</option>
                            </select>
		    																					 
						</div>

						<div class="container-box-txt">
							<div class="box-editor" id="texto-email" contenteditable="true" 
                                 onInput="gravaCampoVaga('<?= $idVaga?>','vagas_email','email',innerHTML)"><?= $emailVaga['email']?></div>
						</div>                
					</div>
                    <!--termino do editor de texto-->
                    
                    <small class="text-info"><i class="fas fa-info-circle"></i> Este email é enviado no envio do email em massa na busca avançada de candidatos.</small>
                    
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_encaminhamentos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-backward"></i> Anterior
                </a>
                <a class="btn btn-outline-info" href="<?= LINK?>vagas/cadVaga_arquivos/<?= base64_encode($idVaga.':edicao')?>">
                    <i class="fas fa-forward"></i> Próximo
                </a>
                           
                <div class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Excluir
                </div>
            </div>
        </div>
    </div>
</div>    
