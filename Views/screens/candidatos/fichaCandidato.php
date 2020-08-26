<p class="h5 text-secondary"><i class="far fa-id-card text-info"></i> Ficha do Candidato</p>
<div class='row'>
    <div class="col">
        <div class="card card-ficha">            
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':edicao')?>"><i class="fas fa-address-card"></i> Seus Dados Pessoais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>candidatos/fichaProfissional/<?= base64_encode($idCandidato.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Dados Profissionais"><i class="fas fa-user-tie"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= LINK?>candidatos/fichaConhecimentos/<?= base64_encode($idCandidato.':edicao')?>" data-toggle="tooltip" data-placement="top" title="Conhecimentos"><i class="fas fa-brain"></i></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="card-title"><i class="fas fa-address-card"></i> Complete seus dados pessoais</h6>
                <div class='row'>
                    <div class='col-2 text-center text-muted' id='alteraFoto'>
                        <form method="post" id="formFoto" enctype="multipart/form-data">
                            <input type="hidden" name="idCandidato" value="<?= $idCandidato?>"/>   
                            <input type='file' style="display:none" name='arquivo' id='arquivo' required class='form-control' onChange="alteraFoto(<?= $idCandidato?>)"/>
                            <br/>
                            <?php 
                            $fotoPerfil=$this->fotoPerfil($idCandidato);
                            if(empty($fotoPerfil)){?>
                                <div class="btn btn-foto btn-outline-primary btn-sm"  onClick="document.getElementById('arquivo').click()">
                                    <p class="h1"><i class="fas fa-camera"></i></p>
                                    Selecione <br/> uma foto
                                </div>
                                <br/>
                                <small>Escolha uma foto de rosto atual, com boa resolução e em que você esteja olhando para câmera.</small>
                                <?php 
                            }else{?>
                                 <div class="btn fotoPerfil" onClick="document.getElementById('arquivo').click()" style="background-image: url('<?=BASE_URL.$fotoPerfil['arquivo']?>')"></div>
                                 <small>Clique na imagem para alterar a foto.</small>
                                 <?php
                            }?>
                            <br/>
                            <small class="text-muted">Tipos de arquivos aceitos:'png','jpeg','jpg','gif'</small>
                        </form>
                        
                    </div>
                         
                    <div class="col">
                        <form method="post" id="form">
                            <input type="hidden" name="idCandidato" value="<?= $idCandidato?>"/>     
                            <fieldset class="border p-2">
                                <legend class="w-auto">Dados Pessoais</legend> 
                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="nome">Nome <b class="text-danger">*</b></label>
                                        <input type="text" name="nome" id="nome" value="<?= $dadosCandidato['nome'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col-4">
                                        <label class="lbl" for="apelido">Apelido</label>
                                        <input type="text" name="apelido" id="apelido" value="<?= $dadosCandidato['apelido'] ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="cpf">CPF <b class="text-danger">*</b></label>
                                        <input type="text" name="cpf" 
                                                           id="cpf" 
                                                           value="<?= $dadosCandidato['cpf'] ?>"
                                                           required 
                                                           maxlength="14" 
                                                           onblur="ValidarCPF(form.cpf)"
                                                           onkeypress="MascaraCPF(form.cpf)"
                                                           class="form-control"/>
                                        <small style="display:none;" class="form-text text-danger" id="alertaCPF">
                                            <i class="fas fa-times"></i> Cpf Inválido
                                        </small>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="pis">PIS</label>
                                        <input type="text" name="pis" id="pis" value="<?= $dadosCandidato['pis'] ?>" class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="nascimento">Data Nasc <b class="text-danger">*</b></label>
                                        <input type="date" name="nascimento" id="nascimento" value="<?= $dadosCandidato['nascimento'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col-2">
                                        <label class="lbl" for="sexo">Sexo <b class="text-danger">*</b></label>
                                        <select name="sexo" id="sexo" required class="form-control">
                                            <option value=""></option>
                                            <option <?php if($dadosCandidato['sexo']=="M"){ echo "selected";}?> value="M">Masculino</option>
                                            <option <?php if($dadosCandidato['sexo']=="F"){ echo "selected";}?> value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="estadoCivil">Estado Civil <b class="text-danger">*</b></label>
                                        <select name="estadoCivil" id="estadoCivil" required class="form-control">
                                            <option value=""></option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="solteiro"){ echo "selected";}?> value="solteiro">
                                                Solteiro (a)
                                            </option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="casado"){ echo "selected";}?> value="casado">
                                                Casado (a)
                                            </option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="uniaoEstavel"){ echo "selected";}?> value="uniaoEstavel">
                                                União Estável
                                            </option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="divorciado"){ echo "selected";}?> value="divorciado">
                                                Divorciado (a)
                                            </option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="separado"){ echo "selected";}?> value="separado">
                                                Separado (a)
                                            </option>
                                            <option <?php if($dadosCandidato['estadoCivil']=="viuvo"){ echo "selected";}?> value="viuvo">
                                                Viúvo (a)
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="habilitacao">Habilitação</label>
                                        <select name="habilitacao" id="habilitacao" class="form-control">
                                            <option value=""></option>
                                            <option <?php if($dadosCandidato['habilitacao']=="NP"){ echo "selected";}?> value="NP">Não Possui</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="A"){ echo "selected";}?> value="A">A</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="B"){ echo "selected";}?> value="B">B</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="AB"){ echo "selected";}?> value="AB">AB</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="C"){ echo "selected";}?> value="C">C</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="AC"){ echo "selected";}?> value="AC">AC</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="D"){ echo "selected";}?> value="D">D</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="AD"){ echo "selected";}?> value="AD">AD</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="E"){ echo "selected";}?>  value="E">E</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="AE"){ echo "selected";}?> value="AE">AE</option>
                                            <option <?php if($dadosCandidato['habilitacao']=="ACC"){ echo "selected";}?> value="ACC">ACC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="filhos">Tem Filhos?</label>
                                        <select id="filhos" class="form-control" onChange="setFilhos(this.value)">
                                            <option <?php if(empty($dadosCandidato['filhos'])){ echo "selected";}?> value="N">Não</option>
                                            <option <?php if(!empty($dadosCandidato['filhos'])){ echo "selected";}?> value="S">Sim</option>
                                        </select>
                                        <div id="qtdFilhos">
                                            <input type="hidden" name="filhos" value="0<?= $dadosCandidato['filhos']?>"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="necessidade">Possui alguma necessidade especial?</label>
                                        <select id="necessidade" name="necessidade" class="form-control" onChange="setNecessidade(this.value)">
                                            <option <?php if($dadosCandidato['necessidadeEspecial']!='S'){ echo "selected";}?> value="N">Não</option>
                                            <option <?php if($dadosCandidato['necessidadeEspecial']=='S'){ echo "selected";}?> value="S">Sim</option>
                                        </select>
                                        <div id="tipoNecessidade">
                                            <input type="hidden" name="tipoNecessidade" value="<?= $dadosCandidato['tipoNecessidade']?>"/>
                                            <input type="hidden" name="infoNecessidade" value="<?= $dadosCandidato['infoNecessidade']?>"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>   
                            <br/>
                            <fieldset class="border p-2">
                                <legend class="w-auto">Onde você mora?</legend> 
                                <div class="row">
                                    <div class="col-2">
                                        <label class="lbl" for="cep">Cep <b class="text-danger">*</b></label>
                                        <input type="text" name="cep" id="cep" value="<?= $endCandidato['cep'] ?>" required 
                                               onkeypress="MascaraCEP(form.cep)" maxlength="9" class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="rua">Rua <b class="text-danger">*</b></label>
                                        <input type="text" name="rua" id="rua" value="<?= $endCandidato['rua'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col-2">
                                        <label for="numero">Número <b class="text-danger">*</b></label>
                                        <input type="text" name="numero" id="numero" value="<?= $endCandidato['numero'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col-3">
                                        <label class="lbl" for="bairro">Bairro <b class="text-danger">*</b></label>
                                        <input type="text" name="bairro" id="bairro" value="<?= $endCandidato['bairro'] ?>" required class="form-control"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="cidade">Cidade <b class="text-danger">*</b></label>
                                        <input type="text" name="cidade" id="cidade" value="<?= $endCandidato['cidade'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="estado">Estado <b class="text-danger">*</b></label>
                                        <select name="estado" id="estado" required class="form-control">
                                            <option value=""></option>
                                            <option <?php if($endCandidato['estado']=="AC"){ echo "selected";}?> value="AC">Acre (AC)</option>
                                            <option <?php if($endCandidato['estado']=="AL"){ echo "selected";}?> value="AL">Alagoas (AL)</option>
                                            <option <?php if($endCandidato['estado']=="AP"){ echo "selected";}?> value="AP">Amapá (AP)</option>
                                            <option <?php if($endCandidato['estado']=="AM"){ echo "selected";}?> value="AM">Amazonas (AM)</option>
                                            <option <?php if($endCandidato['estado']=="BA"){ echo "selected";}?> value="BA">Bahia (BA)</option>
                                            <option <?php if($endCandidato['estado']=="CE"){ echo "selected";}?> value="CE">Ceará (CE)</option>
                                            <option <?php if($endCandidato['estado']=="DF"){ echo "selected";}?> value="DF">Distrito Federal (DF)</option>
                                            <option <?php if($endCandidato['estado']=="ES"){ echo "selected";}?> value="ES">Espírito Santo (ES)</option>
                                            <option <?php if($endCandidato['estado']=="GO"){ echo "selected";}?> value="GO">Goiás (GO)</option>
                                            <option <?php if($endCandidato['estado']=="MA"){ echo "selected";}?> value="MA">Maranhão (MA)</option>
                                            <option <?php if($endCandidato['estado']=="MT"){ echo "selected";}?> value="MT">Mato Grosso (MT)</option>
                                            <option <?php if($endCandidato['estado']=="MS"){ echo "selected";}?> value="MS">Mato Grosso do Sul (MS)</option>
                                            <option <?php if($endCandidato['estado']=="MG"){ echo "selected";}?> value="MG">Minas Gerais (MG)</option>
                                            <option <?php if($endCandidato['estado']=="PA"){ echo "selected";}?> value="PA">Pará (PA)</option>
                                            <option <?php if($endCandidato['estado']=="PB"){ echo "selected";}?> value="PB">Paraíba (PB)</option>
                                            <option <?php if($endCandidato['estado']=="PR"){ echo "selected";}?> value="PR">Paraná (PR)</option>
                                            <option <?php if($endCandidato['estado']=="PE"){ echo "selected";}?> value="PE">Pernambuco (PE)</option>
                                            <option <?php if($endCandidato['estado']=="PI"){ echo "selected";}?> value="PI">Piauí (PI)</option>
                                            <option <?php if($endCandidato['estado']=="RJ"){ echo "selected";}?> value="RJ">Rio de Janeiro (RJ)</option>
                                            <option <?php if($endCandidato['estado']=="RN"){ echo "selected";}?> value="RN">Rio Grande do Norte (RN)</option>
                                            <option <?php if($endCandidato['estado']=="RS"){ echo "selected";}?> value="RS">Rio Grande do Sul (RS)</option>
                                            <option <?php if($endCandidato['estado']=="RO"){ echo "selected";}?> value="RO">Rondônia (RO)</option>
                                            <option <?php if($endCandidato['estado']=="RR"){ echo "selected";}?> value="RR">Roraima (RR)</option>
                                            <option <?php if($endCandidato['estado']=="SC"){ echo "selected";}?> value="SC">Santa Catarina (SC)</option>
                                            <option <?php if($endCandidato['estado']=="SP"){ echo "selected";}?> value="SP">São Paulo (SP)</option>
                                            <option <?php if($endCandidato['estado']=="SE"){ echo "selected";}?> value="SE">Sergipe (SE)</option>
                                            <option <?php if($endCandidato['estado']=="TO"){ echo "selected";}?> value="TO">Tocantins (TO)</option>
                                        </select>    
                                    </div>
                                </div>
                            </fieldset>   
                            <br/>
                            <fieldset class="border p-2">
                                <legend class="w-auto">Quais são seus contatos?</legend> 
                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="email">E-mail <b class="text-danger">*</b></label>
                                        <input type="email" name="email" id="email" value="<?= $contCandidato['email'] ?>" required class="form-control"/>
                                    </div>
                                    <div class="col-3">
                                        <label class="lbl" for="celular"><i class="fab fa-whatsapp"></i> Celular <b class="text-danger">*</b></label>
                                        <input type="text" name="celular" id="celular" value="<?= $contCandidato['celular'] ?>" onkeypress="MascaraTEL(form.celular)" maxlength="15" required class="form-control"/>
                                    </div>
                                    <div class="col-3">
                                        <label class="lbl" for="fixo">Tel. Fixo/Recado <b class="text-danger">*</b></label>
                                        <input type="text" name="fixo" id="fixo" value="<?= $contCandidato['telFixo'] ?>" onkeypress="MascaraTEL(form.fixo)" maxlength="15" required class="form-control"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="lbl" for="facebook"><i class="fab fa-facebook-f"></i> Facebook</label>
                                        <input type="facebook" name="facebook" value="<?= $contCandidato['facebook'] ?>" id="facebook" class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="linkedin"><i class="fab fa-linkedin-in"></i> Linkedin</label>
                                        <input type="text" name="linkedin" value="<?= $contCandidato['linkedin'] ?>" id="linkedin" class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="portifolio">Portifólio</label>
                                        <input type="text" name="portifolio" value="<?= $contCandidato['portifolio'] ?>" id="portifolio" class="form-control"/>
                                    </div>
                                    <div class="col">
                                        <label class="lbl" for="skype"><i class="fab fa-skype"></i> Skype</label>
                                        <input type="text" name="skype" id="skype" value="<?= $contCandidato['skype'] ?>" class="form-control"/>
                                    </div>
                                </div>
                            </fieldset>   
                            <br/>
                            <fieldset class="border p-2">
                                <legend class="w-auto">Nos conte um pouco sobre você</legend> 
                                <!--editor-->
		    					<div class='menu-bar'>
		    						<div class="btn-group" role="group" aria-label="...">
		    							<div class="btn-group" role="group" aria-label="...">
		    								<div onClick='comando("undo")' class="btn btn-default" title='Voltar Ação'><i class='fa fa-undo'></i></div>
		    								<div onClick='comando("redo")' class="btn btn-default" title='Refazer'><i class='fa fa-redo'></i></div>
		    							</div>
    									<div class="btn-group" role="group" aria-label="...">
    										<div id='cor' style='position:relative'></div>
    										<div onClick='comando("bold")' class="btn btn-default" title='Negrito'><i class='fa fa-bold'></i></div>
    										<div onClick='comando("italic")' class="btn btn-default" title='Itálico'><i class='fa fa-italic'></i></div>
    										<div onClick='comando("strikeThrough")' class="btn btn-default" title='Riscado'><i class='fa fa-strikethrough'></i></div>
    										<div onClick='comando("underline")' class="btn btn-default" title='Sublinhado'><i class='fa fa-underline'></i></div>
    									</div>
    								</div>

    								<div class="btn-group" role="group" aria-label="...">
    									<div onClick='comando("justifyLeft")' class="btn btn-default" title='Alinhar a Esquerda'>
    										<i class='fa fa-align-left'></i>
										</div>
										<div onClick='comando("justifyCenter")' class="btn btn-default" title='Centralizado'>
										 	<i class='fa fa-align-center'></i>
										</div>
										<div onClick='comando("justifyRight")' class="btn btn-default" title='Alinhar a Direita'>
										 	<i class='fa fa-align-right'></i>
										</div>
										<div onClick='comando("justifyFull")' class="btn btn-default" title='Justificado'>
										 	<i class='fa fa-align-justify'></i>
										</div>
									</div>

									<div class="btn-group" role="group" aria-label="...">
										<div onClick='comando("insertOrderedList")' class="btn btn-default" title='Inserir Lista Numerada'>
										  	<i class='fa fa-list-ol'></i>
										</div>
										<div onClick='comando("insertUnorderedList")' class="btn btn-default" title='Inserir Lista' >
										 	<i class='fa fa-list-ul'></i></span>
										</div>										 
									</div>

									<div class="btn-group" role="group" aria-label="...">
										<div onClick='comando("selectAll")' class="btn btn-default" title='Selecionar Tudo'>
										 	<i class='fas fa-file-alt'></i>
										</div>
										
										<div id='marcar' style='position:relative'></div>
										<div onClick='comando("removeFormat")' class="btn btn-default" title='Remover Formatacao'>
										 	<i class='fas fa-eraser'></i>
										</div>																		 
									</div>
										
									<div class='container-box-txt'>
										<div class='box-editor' id="conteudo_1" contenteditable="true" onInput="atSobre()">	
                                            <?= $dadosCandidato['sobre'] ?>												
										</div>
									</div>	
                                </div>
                                <input type="hidden" id="sobre" name="sobre" value="<?= $dadosCandidato['sobre'] ?>" class="form-control" placeholder="sobre"/>
                                <!--editor-->
                            </fieldset>  
                            <br/>
                            <div class="card">
                                <div class="card-header" style="background:#ececec">
                                    <div class="row">
                                        <div class="col">
                                            <b class="text-secondary">Quero receber por email vagas e convites para participar de processos seletivos</b>
                                        </div>
                                        <div class="col-2 text-right">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" 
                                                       class="custom-control-input" 
                                                       name="listMail" 
                                                       id="listMail" 
                                                       <?php if(!empty($infoCandidato['receberEmails'])){ echo "checked";}?> 
                                                       onClick="setListMail(this.value)">
                                                <label class="custom-control-label" for="listMail" id='lbl_listMail'>
                                                    <?php 
                                                    if(!empty($infoCandidato['receberEmails'])){
                                                        echo "Sim";
                                                    }else{
                                                        echo "Não";
                                                    }?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn btn-outline-primary" onClick="salvaFicha()">
                                        Salvar e continuar <i class="fas fa-chevron-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
