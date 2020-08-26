$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

//FUNCOES DO MÓDULO DE VAGAS
//buscar vagas
function tipoBusca(tipoBusca){
	$.ajax({
		type:"POST",
		data:{tipoBusca},
		url:RAIZ+"/vagas/tipoBusca",
		dataType:"html",
		success:function (result){
			$('#tipoBusca').html('');
			$('#tipoBusca').append(result);
		}
	});
}

function buscarVaga(){
	$('#formBusca').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formBusca')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"vagas/buscarVaga",
			dataType: "html",
			success:function(result){
				$('#resultadoBusca').html('');	
				$('#resultadoBusca').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function processoSeletivo(idVaga,aba){
	$.ajax({
		type:"POST",
		type:"POST",
		data:{idVaga,aba},
		url:RAIZ+"vagas/processoSeletivo",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-xl');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function mudaFase(idVaga,idCandidato,fase){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase},
		url:RAIZ+"vagas/mudaFase",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-sm');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function encaminharCandidato(idVaga,idCandidato,fase){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase},
		url:RAIZ+"vagas/encaminharCandidato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
			
		}
	})
}

function concluirEncaminhamentoCandidato(idVaga,idCandidato,fase){
	var encaminhamento = document.getElementById('encaminhamento').value;
	var tipoEnvio = document.getElementById('tipoEnvio').value;
	var dataEntrevista = document.getElementById('dataEntrevista').value;
	var endereco = document.getElementById('endereco').value;
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase,encaminhamento,tipoEnvio,dataEntrevista,endereco},
		url:RAIZ+"vagas/concluirEncaminhamentoCandidato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
			
		}
	})
}


function excluirCandidatoProcesso(idVaga,idCandidato,fase,acao){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase,acao},
		url:RAIZ+"vagas/excluirCandidatoProcesso",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			//$('.modal-dialog_add').addClass('modal-xl');
			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
		}
	})
}
function recusaCandidato(idVaga,idCandidato,fase,acao){
	if(acao=="remover"){
		var motivo = document.getElementById('motivo').value
	}else{
		var motivo = "";	
	}
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase,acao,motivo},
		url:RAIZ+"vagas/recusaCandidato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			//$('.modal-dialog_add').addClass('modal-xl');
			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
		}
	})
}

function buscarVagaCandidato(idVaga,modal){
	$.ajax({
		type:"POST",
		data:{idVaga,modal},
		url:RAIZ+"/candidatos/busca",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-xl');
			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
			
			//setaBusca(tipoBusca,idVaga);
		},
		
	});
}

function marcarCandidato(idCandidato,valor){
	document.getElementById('selecionaCandidato_'+idCandidato).value=idCandidato;
	if(valor==1){
		$('#selecionar_'+idCandidato).addClass('hidden');
		$('#deselecionar_'+idCandidato).removeClass('hidden');
	}else{
		$('#selecionar_'+idCandidato).removeClass('hidden');
		$('#deselecionar_'+idCandidato).addClass('hidden');
	}
}

function selecionarCandidato(){
	$('#formSelecionaCandidatos').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formSelecionaCandidatos')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"vagas/selecionarCandidatos",
			dataType: "html",
			success:function(result){
				$('#modal_content_add').html('');	
				$('#modal_content_add').append(result);
					//removendo outras possiveis classes de tamanho
				$('.modal-dialog_add').removeClass('modal-sm');
				$('.modal-dialog_add').removeClass('modal-lg');
				$('.modal-dialog_add').removeClass('modal-xl');
				$('.modal-dialog_add').addClass('modal-lg');
				$('#modal_add').modal('show');
			},
			beforeSend:function(){
				
			}
		})
	});
}

function acaoCandidato_processoSeletivo(idCandidato,idVaga,fase){
	$.ajax({
		type:"POST",
		data:{idCandidato,idVaga,fase},
		url:RAIZ+"/vagas/acaoCandidato_processoSeletivo",
		dataType:"html",
		success:function (result){
			$('#acoesCandidato').html('');	
			$('#acoesCandidato').append(result);
		}
	});

	$('.line').removeClass('bg-warning');
	$('#line_'+idCandidato).addClass('bg-warning');
}

function chamarCandidato(idVaga,idCandidato,fase){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase},
		url:RAIZ+"/vagas/chamarCandidato",
		dataType:"html",
		success:function (result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			});
			$('#modal').modal('show');			
		}
	});
}

function addObservacoes(idVaga,idCandidato,fase){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase},
		url:RAIZ+"/vagas/addObservacoes",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');
			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal({
				backdrop: 'static'
			});
			$('#modal_add').modal('show');			
		}
	});
}

function gravarObservacoes(idCandidato){
	var observacao = document.getElementById('observacoesCandidato').value
	$.ajax({
		type:"POST",
		data:{idCandidato,observacao},
		url:RAIZ+"/vagas/gravarObservacoes",
		dataType:"html",
		success:function (result){
			$('#gravarObservacoes').html('');	
			$('#gravarObservacoes').append(result);
			
		}
	});
}

function addEntrevistaVaga(idVaga,idCandidato,fase){
	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase},
		url:RAIZ+"/vagas/addEntrevistaVaga",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');
			//$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal({
				backdrop: 'static'
			});
			$('#modal_add').modal('show');			
		}
	});
}

function agendarEntrevista(idVaga,idCandidato,fase){
	var data = document.getElementById('data').value;
	var hora = document.getElementById('hora').value;
	var responsavel = document.getElementById('responsavel').value;
	var email = document.getElementById('email').value;

	$.ajax({
		type:"POST",
		data:{idVaga,idCandidato,fase,data,hora,responsavel,email},
		url:RAIZ+"/vagas/agendarEntrevista",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');
			//$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal({
				backdrop: 'static'
			});
			$('#modal_add').modal('show');			
		}
	});
}



function fontePesquisa(idVaga){
	$.ajax({
		type:"POST",
		data:{idVaga},
		url:RAIZ+"/vagas/fontePesquisa",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal('show');
		}
	});
}

function editarVaga(idVaga){
	$.ajax({
		type:"POST",
		data:{idVaga},
		url:RAIZ+"/vagas/editarVaga",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal('show');
		}
	});
}

function clonarVaga(idVaga){
	$.ajax({
		type:"POST",
		data:{idVaga},
		url:RAIZ+"/vagas/clonarVaga",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal('show');
		}
	});
}

function dadosCliente(idCliente){
	$.ajax({
		type:"POST",
		data:{idCliente},
		url:RAIZ+"/vagas/dadosCliente",
		dataType:"html",
		success:function (result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('.modal-dialog_add').addClass('modal-lg');
			$('#modal_add').modal('show');
		}
	});
}

//criar vagas
function gravaCampoVaga(idVaga,tabela,campo,valor){

	$.ajax({
		type:"POST",
		data:{idVaga,tabela,campo,valor},
		url:RAIZ+"/vagas/gravaCampoVaga",
		dataType:"html",
		success:function (result){
			
		}
	});
}

function setaRequisitante(idCliente){
	$.ajax({
		type:"POST",
		data:{idCliente},
		url:RAIZ+"vagas/setaRequisitante",
		dataType:"html",
		success:function(result){
			$('#requisitante').html('');
			$('#requisitante').append(result);
		}
	})
}

function setaEspecialidade(funcao){
	$.ajax({
		type:"POST",
		data:{funcao},
		url:RAIZ+"vagas/setaEspecialidades",
		dataType:"html",
		success:function(result){
			$('#especialidades').html('');
			$('#especialidades').append(result);
		}
	})
}

function editaSelecionador(idVaga,idUsuario,acao){
	$.ajax({
		type:"POST",
		data:{idVaga,idUsuario,acao},
		url:RAIZ+"/vagas/editaSelecionador",
		dataType:"html",
		success:function (result){
			$('#tblSelecionadores').html('');
			$('#tblSelecionadores').append(result);
		}
	});
}

function adicionarAreaInformatica(idVaga){
	var areaInformatica = document.getElementById('areaInformatica').value;
	var nivelInformatica = document.getElementById('nivelInformatica').value;

	$.ajax({
		type:"POST",
		data:{idVaga,areaInformatica,nivelInformatica},
		url:RAIZ+"/vagas/adicionarAreaInformatica",
		dataType:"html",
		success:function (result){
			$('#tblAreasInformatica').html('');
			$('#tblAreasInformatica').append(result);
		}
	});
}

function removerAreaInformatica(idVaga,idArea){
	
	$.ajax({
		type:"POST",
		data:{idVaga,idArea},
		url:RAIZ+"/vagas/removerAreaInformatica",
		dataType:"html",
		success:function (result){
			$('#tblAreasInformatica').html('');
			$('#tblAreasInformatica').append(result);
		}
	});
}

function addIdiomas(idVaga){
	var idioma = document.getElementById('idioma').value;
	var nivel = document.getElementById('nivel').value;

	$.ajax({
		type:"POST",
		data:{idVaga,idioma,nivel},
		url:RAIZ+"/vagas/addIdiomas",
		dataType:"html",
		success:function (result){
			$('#tblIdiomas').html('');
			$('#tblIdiomas').append(result);
		}
	});
}

function removerIdiomas(idVaga,idIdioma){
	
	$.ajax({
		type:"POST",
		data:{idVaga,idIdioma},
		url:RAIZ+"/vagas/removerIdioma",
		dataType:"html",
		success:function (result){
			$('#tblIdiomas').html('');
			$('#tblIdiomas').append(result);
		}
	});
}

function addBeneficio(){
	$('#formBeneficios').on('submit',function(e){
		e.preventDefault();

		var form = $('#formBeneficios')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"vagas/addBeneficio",
			dataType:"html",
			success:function(result){
				$('#tbl_beneficios').html('');
				$('#tbl_beneficios').append(result);
			}
		})
	})
}

function removerBeneficioVaga(idVaga,idBeneficio){
	$.ajax({
		type:"POST",
		data:{idVaga,idBeneficio},
		url:RAIZ+"vagas/removeBeneficioVaga",
		dataType:"html",
		success:function(result){
			$('#tbl_beneficios').html('');
			$('#tbl_beneficios').append(result);
		}
	})
}

function addEntrevista(){

	$('#form').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"vagas/addEntrevista",
			dataType: "html",
			success:function(result){
				$('#tblEntrevista').html('');	
				$('#tblEntrevista').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}


function removerEntrevista(idVaga,idEntrevista){
	$.ajax({
		type:"POST",
		data:{idVaga,idEntrevista},
		url:RAIZ+"/vagas/removerEntrevista",
		dataType:"html",
		success:function (result){
			$('#tblEntrevista').html('');
			$('#tblEntrevista').append(result);
		}
	});
}

function importadorArquivo_vaga(idVaga){
	$.ajax({
		type:"POST",
		type:"POST",
		data:{idVaga},
		url:RAIZ+"vagas/importadorArquivo",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal('show');
		}
	})
}

function enviarArquivo_Vaga(){
	$('#formUpload').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formUpload')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"vagas/importarArquivo",
			dataType: "html",
			success:function(result){
				$('#tblArquivos').html('');	
				$('#tblArquivos').append(result);
			},
			beforeSend:function(){
				$('#modal').modal('hide');
			}
		})
	});
}

function removerArquivo(idVaga,idArquivo,file){
	$.ajax({
		type:"POST",
		data:{idVaga,idArquivo,file},
		url:RAIZ+"/vagas/removerArquivo",
		dataType:"html",
		success:function (result){
			$('#tblArquivos').html('');
			$('#tblArquivos').append(result);
		}
	});
}

function editaEtapas(idVaga,idEtapa,acao){
	$.ajax({
		type:"POST",
		data:{idVaga,idEtapa,acao},
		url:RAIZ+"/vagas/editaEtapas",
		dataType:"html",
		success:function (result){
			$('#tblEtapas').html('');
			$('#tblEtapas').append(result);
		}
	});
}

function setaPermissoesConfidencial(idVaga){
	$.ajax({
		type:"POST",
		data:{idVaga},
		url:RAIZ+"vagas/setaPermissoesConfidencial",
		dataType:"html",
		success:function(result){
			$('#usuarios_confidencial').html('');
			$('#usuarios_confidencial').append(result);
		}
	})
}

function concluirVaga(idVaga,acao){
	$.ajax({
		type:"POST",
		data:{idVaga,acao},
		url:RAIZ+"vagas/concluirVaga",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal('show');
		}
	})
}

//CANDIDATOS 
function alteraFoto(){
	var form  = $('#formFoto')['0'];
	var data = new FormData(form);
	$.ajax({
		type:"POST",
		data:data,
		contentType:false,
		processData:false,
		url:RAIZ+"candidatos/alteraFoto",
		dataType: "html",
		success:function(result){
			$('#alteraFoto').html('');	
			$('#alteraFoto').append(result);
		}
	});
}

//editor de texto
function comando(comand,parametro){
	document.execCommand(comand,null,parametro);
  }
  
  function setFilhos(filhos){
	  $.ajax({
		  type:"POST",
		  data:{filhos},
		  url:RAIZ+"/candidatos/setFilhos",
		  dataType:"html",
		  success:function (result){
			  $('#qtdFilhos').html('');
			  $('#qtdFilhos').append(result);
		  }
	  });
  }
  
  function setNecessidade(necessidade){
	  $.ajax({
		  type:"POST",
		  data:{necessidade},
		  url:RAIZ+"/candidatos/setNecessidade",
		  dataType:"html",
		  success:function (result){
			  $('#tipoNecessidade').html('');
			  $('#tipoNecessidade').append(result);
		  }
	  });
  }
  
  function atSobre(){
	  var sobre=document.getElementById('conteudo_1').innerHTML;
	  document.getElementById('sobre').value=sobre;
  }
  
  function setListMail(check){
	  var campo = document.getElementById('listMail').checked;
	  if(campo==true){
		  $('#lbl_listMail').html('Sim');
		  $('#lbl_listMail').removeClass('text-danger');
	  }else{
		  $('#lbl_listMail').addClass('text-danger');
		  $('#lbl_listMail').html('Não');
	  }
	  
  }

  function addObjetivo(idCandidato){
	  var funcao = document.getElementById('funcao').value;
	  var hierarquia = document.getElementById('hierarquia').value;
	  var tempo = document.getElementById('tempo').value;
	  var tipoTempo = document.getElementById('tipoTempo').value;
	  $.ajax({
		type:"POST",
		data:{idCandidato,funcao,hierarquia,tempo,tipoTempo},
		url:RAIZ+"/candidatos/addObjetivo",
		dataType:"html",
		success:function (result){
			$('#tblObjetivos').html('');
			$('#tblObjetivos').append(result);
		},
		beforeSend:function(){
			document.getElementById('funcao').value='';
			document.getElementById('hierarquia').value='';
			document.getElementById('tempo').value='';
			document.getElementById('tipoTempo').value='';
		}
	});
  }

  function removerObjetivo(idCandidato,idObjetivo){
	$.ajax({
		type:"POST",
		data:{idCandidato,idObjetivo},
		url:RAIZ+"/candidatos/removerObjetivo",
		dataType:"html",
		success:function (result){
			$('#tblObjetivos').html('');
			$('#tblObjetivos').append(result);
		}
	});
  }
  
  function salvaFicha(){
	  $('#form').on('submit', function(e){
		  e.preventDefault();
  
		  var form  = $('#form')['0'];
		  var data = new FormData(form);
		  $.ajax({
			  type:"POST",
			  data:data,
			  contentType:false,
			  processData:false,
			  url:RAIZ+"candidatos/salvarFicha",
			  dataType: "html",
			  success:function(result){
				  $('#body').html('');	
				  $('#body').append(result);
			  },
			  beforeSend:function(){
				  
			  }
		  })
	  });
  }

function salvaFichaProfissional(){
	$('#form').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"candidatos/salvaFichaProfissional",
			dataType: "html",
			success:function(result){
				$('#body').html('');	
				$('#body').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function addEscolaridade(idCandidato){
	var escolaridade = document.getElementById('escolaridade').value;
	var instituicao = document.getElementById('instituicao').value;
	var curso = document.getElementById('curso').value;
	var inicio = document.getElementById('inicio').value;
	var termino = document.getElementById('termino').value;
	var horario = document.getElementById('horario').value;
	$.ajax({
	  type:"POST",
	  data:{idCandidato,escolaridade,instituicao,curso,inicio,termino,horario},
	  url:RAIZ+"/candidatos/addEscolaridade",
	  dataType:"html",
	  success:function (result){
		  $('#tblEscolaridade').html('');
		  $('#tblEscolaridade').append(result);
	  },
	  beforeSend:function(){
		  document.getElementById('escolaridade').value='';
		  document.getElementById('instituicao').value='';
		  document.getElementById('curso').value='';
		  document.getElementById('inicio').value='';
		  document.getElementById('termino').value='';
		  document.getElementById('horario').value='';
	  }
  });
}

function setaOrigem(idCandidato,origem){
	var complemento = document.getElementById('complemento').value;
	$.ajax({
		type:"POST",
		data:{idCandidato,origem,complemento},
		url:RAIZ+"/candidatos/setaOrigem",
		dataType:"html",
		success:function (result){
			$('#complementoOrigem').html('');
			$('#complementoOrigem').append(result);
		}
	});
}


function delEscolaridade(idCandidato,idEscolaridade){
	$.ajax({
		type:"POST",
		data:{idCandidato,idEscolaridade},
		url:RAIZ+"/candidatos/delEscolaridade",
		dataType:"html",
		success:function (result){
			$('#tblEscolaridade').html('');
			$('#tblEscolaridade').append(result);
		}
	});
  }

  function concluirFicha(idCandidato){
	$.ajax({
		type:"POST",
		data:{idCandidato},
		url:RAIZ+"/candidatos/concluirFicha",
		dataType:"html",
		success:function (result){
			$('#body').html('');	
			$('#body').append(result);
		}
	});
  }

  function setaBusca(tipoBusca,idVaga){
	$.ajax({
		type:"POST",
		data:{tipoBusca,idVaga},
		url:RAIZ+"/candidatos/setaBusca",
		dataType:"html",
		success:function (result){
			$('#telaBusca').html('');	
			$('#telaBusca').append(result);
		}
	});
  }

  function novaBuscaCandidato(){
	var form  = $('#formBuscaCandidato')['0'];
	var data = new FormData(form);
	$.ajax({
		type:"POST",
		data:data,
		contentType:false,
		processData:false,
		url:RAIZ+"candidatos/novaBusca",
		dataType: "html",
		success:function(result){
			$('#resultadoBuscaCandidato').html('');	
			$('#resultadoBuscaCandidato').append(result);
		},
		beforeSend:function(){
		}
	});
  }

  function paginaFiltroCandidato(pagina){
	  document.getElementById('pagina').value=pagina;
	  novaBuscaCandidato();
  }


  function buscarCandidato(){
	$('#formBuscaCandidato').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formBuscaCandidato')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"candidatos/resultadoBusca",
			dataType: "html",
			success:function(result){
				$('#telaBusca').html('');	
				$('#telaBusca').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
  }

//TELA CLIENTES
function cadastrarCliente(){
  $('#form').on('submit', function(e){
		e.preventDefault();

		var form  = $('#form')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/cadastrarCliente",
			dataType: "html",
			success:function(result){
				$('#body').html('');	
				$('#body').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function alteraLogotipo(){
	var form  = $('#formLogo')['0'];
	var data = new FormData(form);
	$.ajax({
		type:"POST",
		data:data,
		contentType:false,
		processData:false,
		url:RAIZ+"clientes/alteraLogotipo",
		dataType: "html",
		success:function(result){
			$('#alteraLogotipo').html('');	
			$('#alteraLogotipo').append(result);
		}
	});
}

function configurarCliente(idCliente,aba){
    $.ajax({
		type:"POST",
		data:{idCliente,aba},
		url:RAIZ+"clientes/configurarCliente",
		dataType: "html",
		success:function(result){
			$('#body_tela').html('');	
			$('#body_tela').append(result);
		},
	});
}

function addTelefoneCliente(idCliente){
	var ddd = document.getElementById('ddd').value;
	var numero = document.getElementById('numero').value;
	var ramal = document.getElementById('ramal').value;
	var tipo = document.getElementById('tipo').value;	
	if(document.getElementById('principal').checked == true){
		var principal = 1;
	}else{
		var principal = 0;
	}
	var contato = document.getElementById('contato').value;
	
	$.ajax({
		type:"POST",
		data:{idCliente,ddd,numero,ramal,tipo,principal,contato},
		url:RAIZ+"clientes/addTelefoneCliente",
		dataType: "html",
		success:function(result){
			$('#telefones').html('');	
			$('#telefones').append(result);
		},
		beforeSend:function(){
			document.getElementById('ddd').value="";
			document.getElementById('numero').value="";
			document.getElementById('ramal').value="";
			document.getElementById('tipo').value="";
			document.getElementById('principal').checked=false;
			document.getElementById('contato').value="";
		}
	});
} 


function removerTelefone(idCliente,idTelefone){
	$.ajax({
		type:"POST",
		data:{idCliente,idTelefone},
		url:RAIZ+"clientes/removerTelefone",
		dataType: "html",
		success:function(result){
			$('#telefones').html('');	
			$('#telefones').append(result);
		}
	});
}

function addBeneficioCliente(idCliente,idBeneficio){
	$.ajax({
		type:"POST",
		data:{idCliente,idBeneficio},
		url:RAIZ+"clientes/addBeneficioCliente",
		dataType: "html",
		success:function(result){
			$('#beneficiosCliente').html('');	
			$('#beneficiosCliente').append(result);
		}
	});
}

function delBeneficioCliente(idCliente,idBeneficio){
	$.ajax({
		type:"POST",
		data:{idCliente,idBeneficio},
		url:RAIZ+"clientes/delBeneficioCliente",
		dataType: "html",
		success:function(result){
			$('#beneficiosCliente').html('');	
			$('#beneficiosCliente').append(result);
		}
	});
}

function gravaValorBeneficio(valor,idCliente,idBeneficio){
	$.ajax({
		type:"POST",
		data:{idCliente,idBeneficio,valor},
		url:RAIZ+"clientes/gravaValorBeneficio",
		dataType: "html",
		success:function(result){
			$('#beneficiosCliente').html('');	
			$('#beneficiosCliente').append(result);
		}
	});
}


function addFormaContratacaoCli(idCliente,idForma){
	$.ajax({
		type:"POST",
		data:{idCliente,idForma},
		url:RAIZ+"clientes/addFormaContratacaoCli",
		dataType: "html",
		success:function(result){
			$('#formasCliente').html('');	
			$('#formasCliente').append(result);
		}
	});
}

function delFormaContratacaoCli(idCliente,idForma){
	$.ajax({
		type:"POST",
		data:{idCliente,idForma},
		url:RAIZ+"clientes/delFormaContratacaoCli",
		dataType: "html",
		success:function(result){
			$('#formasCliente').html('');	
			$('#formasCliente').append(result);
		}
	});
}

function gravaDadosCliente(){
	$('#formCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/gravaDadosCliente",
			dataType: "html",
			success:function(result){
				$('#body').html('');	
				$('#body').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}


function addEndereco(){
	$('#formEndereco').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formEndereco')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/addEndereco",
			dataType: "html",
			success:function(result){
				$('#enderecos').html('');	
				$('#enderecos').append(result);
			},
			beforeSend:function(){
				document.getElementById('cep').value="";
				document.getElementById('logradouro').value="";
				document.getElementById('numero').value="";
				document.getElementById('bairro').value="";
				document.getElementById('cidade').value="";
				document.getElementById('estado').value="";
				document.getElementById('onibus').value="";
				document.getElementById('referencia').value="";
				document.getElementById('principal').checked=false;
				document.getElementById('faturamento').checked=false;
			}
		})
	});
} 

function delEndereco(idCliente,idEndereco){
	$.ajax({
		type:"POST",
		data:{idCliente,idEndereco},
		url:RAIZ+"clientes/delEndereco",
		dataType: "html",
		success:function(result){
			$('#enderecos').html('');	
			$('#enderecos').append(result);
		}
	});
}

function novoContato(idCliente){
	$.ajax({
		type:"POST",
		data:{idCliente},
		url:RAIZ+"clientes/novoContato",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addTelefonesContato(idContato){
	$.ajax({
		type:"POST",
		data:{idContato},
		url:RAIZ+"clientes/addTelefonesContato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
		}
	})
}

function gravaTelefoneContato(){
	$('#formTelefoneContato').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formTelefoneContato')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/gravaTelefoneContato",
			dataType: "html",
			success:function(result){
				$('#modal_content_add').html('');	
				$('#modal_content_add').append(result);
			},
			beforeSend:function(){
				document.getElementById('ddd').value="";
				document.getElementById('numero').value="";
				document.getElementById('ramal').value="";
				document.getElementById('tipo').value="";
			}
		})
	});
}
function removerTelefoneContato(idContato,idTelefone){
	$.ajax({
		type:"POST",
		data:{idContato,idTelefone},
		url:RAIZ+"clientes/removerTelefoneContato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);
		}
	})
}


function addPresentesContato(idContato){
	$.ajax({
		type:"POST",
		data:{idContato},
		url:RAIZ+"clientes/addPresentesContato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog_add').removeClass('modal-sm');
			$('.modal-dialog_add').removeClass('modal-lg');
			$('.modal-dialog_add').removeClass('modal-xl');

			$('#modal_add').modal({
				backdrop: 'static'
			})
			$('#modal_add').modal('show');
		}
	})
}


function gravaPresenteContato(){
	$('#formPresenteContato').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formPresenteContato')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/gravaPresenteContato",
			dataType: "html",
			success:function(result){
				$('#modal_content_add').html('');	
				$('#modal_content_add').append(result);
			},
			beforeSend:function(){
				document.getElementById('presente').value="";
				document.getElementById('dataEntrega').value="";
				document.getElementById('observacoes').value="";
			}
		})
	});
}
function removerPresenteContato(idContato,idPresente){
	$.ajax({
		type:"POST",
		data:{idContato,idPresente},
		url:RAIZ+"clientes/removerPresenteContato",
		dataType: "html",
		success:function(result){
			$('#modal_content_add').html('');	
			$('#modal_content_add').append(result);
		}
	})
}

function salvarContato(){
	$('#formContato').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formContato')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/salvarContato",
			dataType: "html",
			success:function(result){
				$('#contatos').html('');	
				$('#contatos').append(result);
			},
			beforeSend:function(){
				$('#modal').modal('hide');
			}
		})
	});
}

function delContato(idCliente,idContato){
	$.ajax({
		type:"POST",
		data:{idContato,idCliente},
		url:RAIZ+"clientes/delContato",
		dataType: "html",
		success:function(result){
			$('#contatos').html('');	
			$('#contatos').append(result);
		}
	})
}

function editaContato(idCliente,idContato){
	$.ajax({
		type:"POST",
		data:{idCliente,idContato},
		url:RAIZ+"clientes/editaContato",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function enviaArquivoCliente(){
	$('#formArquivo').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formArquivo')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/enviaArquivoCliente",
			dataType: "html",
			success:function(result){
				$('#arquivos').html('');	
				$('#arquivos').append(result);
			},
			beforeSend:function(){
				document.getElementById('arquivo').value;
				document.getElementById('nome').value;
			}
		})
	});
}

function delArquivo(idCliente,idArquivo){
	$.ajax({
		type:"POST",
		data:{idArquivo,idCliente},
		url:RAIZ+"clientes/delArquivo",
		dataType: "html",
		success:function(result){
			$('#arquivos').html('');	
			$('#arquivos').append(result);
		}
	})
}

function inclusaoServicoCliente(valor,idCliente,idServico){
	if(valor==true){
		var acao='incluiServicoCliente';
	}else{
		var acao='removeServicoCliente';
	}
	$.ajax({
		type:"POST",
		data:{idCliente,idServico},
		url:RAIZ+"clientes/"+acao,
		dataType: "html",
		success:function(result){
			/*$('#arquivos').html('');	
			$('#arquivos').append(result);*/
		}
	})
}

function salvaFaturamentoCliente(){
	$('#formFaturamento').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formFaturamento')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/salvaFaturamentoCliente",
			dataType: "html",
			success:function(result){
				$('#salvarFaturamento').html('');	
				$('#salvarFaturamento').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function incluirTaxa(tipoTaxa,idCliente){
	$.ajax({
		type:"POST",
		data:{tipoTaxa,idCliente},
		url:RAIZ+"clientes/incluirTaxa",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function salvaTaxa(){
	$('#formTaxa').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formTaxa')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"clientes/salvaTaxa",
			dataType: "html",
			success:function(result){
				$('#taxas').html('');	
				$('#taxas').append(result);
			},
			beforeSend:function(){
				$('#modal').modal('hide');
			}
		})
	});
}

function removeTaxaCliente(idCliente,idTaxa){
	$.ajax({
		type:"POST",
		data:{idCliente,idTaxa},
		url:RAIZ+"clientes/removeTaxaCliente",
		dataType: "html",
		success:function(result){
			$('#taxas').html('');	
			$('#taxas').append(result);
		}
	})
}

function gravaObsTaxaCliente(observacoes,idCliente){
	$.ajax({
		type:"POST",
		data:{idCliente,observacoes},
		url:RAIZ+"clientes/gravaObsTaxaCliente",
		dataType: "html",
		success:function(result){
		}
	})
}





//TELA DE CONFIGURACOES
//AGENCIA
function configurar_funcoesVaga(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/conf_funcoesAgencia",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);

			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop:'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addFuncaoVaga(){
	$('#formFuncaoVaga').on('submit', function(e){
		e.preventDefault();

		var form = $('#formFuncaoVaga')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addFuncaoVaga",
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function delFuncaoVaga(idFuncao){
	$.ajax({
		type:"POST",
		data:{idFuncao},
		url:RAIZ+"configuracoes/delFuncaoVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})

}

function editarFuncaoVaga(idFuncao){
	$.ajax({
		type:"POST",
		data:{idFuncao},
		url:RAIZ+"configuracoes/editarFuncaoVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}

function salvarFuncaoVaga(){
	$('#formFuncaoVaga').on('submit', function(e){
		e.preventDefault();

		var form = $('#formFuncaoVaga')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaFuncaoVaga",
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function configurar_especialidadesVaga(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/conf_especialidadesVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);

			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop:'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addEspecialidadeVaga(){
	$('#formEspecialidadeVaga').on('submit',function(e){
		e.preventDefault();
		              
		var form = $('#formEspecialidadeVaga')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addEspecialidadeVaga",
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function editarEspecialidadeVaga(idEspecialidade){
	$.ajax({
		type:"POST",
		data:{idEspecialidade},
		url:RAIZ+"configuracoes/editarEspecialidadeVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}



function delEspecialidadeVaga(idEspecialidade){
	$.ajax({
		type:"POST",
		data:{idEspecialidade},
		url:RAIZ+"configuracoes/delEspecialidadeVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}


function salvarEspecialidadeVaga(){
	$('#formEspecialidadeVaga').on('submit', function(e){
		e.preventDefault();

		var form = $('#formEspecialidadeVaga')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaEspecialidadeVaga",
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}



//VAGAS
//Status
function configurar_statusVagas(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_statusVagas",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addStatusVaga(){
	$('#formStatusVaga').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formStatusVaga')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addStatusVaga",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delStatusVaga(idStatus){
	$.ajax({
		type:"POST",
		data:{idStatus},
		url:RAIZ+"configuracoes/delStatusVaga",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function editarStatusVaga(idStatus){
	$.ajax({
		type:"POST",
		data:{idStatus},
		url:RAIZ+"configuracoes/editarStatusVaga",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function salvaStatusVaga(){
	$('#formStatusVaga').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formStatusVaga')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaStatusVaga",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

//Beneficios
function configurar_beneficiosVagas(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/configurar_beneficiosVagas",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}


function addBeneficioVaga(){
	$('#formBeneficioVaga').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formBeneficioVaga')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addBeneficioVaga",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function editarBeneficioVaga(idBeneficio){
	$.ajax({
		type:"POST",
		data:{idBeneficio},
		url:RAIZ+"configuracoes/editarBeneficioVaga",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);
		}
	})
}

function delBeneficioVaga(idBeneficio){
	$.ajax({
		type:"POST",
		data:{idBeneficio},
		url:RAIZ+"configuracoes/delBeneficioVaga",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);
		}
	})
}

function salvaBeneficioVaga(){
	$('#formBeneficioVaga').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formBeneficioVaga')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaBeneficioVaga",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function configurar_formasContratacaoVagas(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/conf_formasContratacaoVagas",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');l
		}
	})
}

function addFormaContratacaoVaga(){
	$('#formFormaContratacaoVaga').on('submit', function(e){
		e.preventDefault();

		var form = $('#formFormaContratacaoVaga')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addFormaContratacaoVaga",
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function editarFormaContratacaoVaga(idForma){
	
	$.ajax({
		type:"POST",
		data:{idForma},
		url:RAIZ+"configuracoes/editarFormaContratacaoVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}

function delFormaContratacaoVaga(idForma){
	$.ajax({
		type:"POST",
		data:{idForma},
		url:RAIZ+"configuracoes/delFormaContratacaoVaga",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}
        
function salvarFormaContratacaoVaga(){
	$('#formFormaContratacaoVaga').on('submit',function(e){
		e.preventDefault();

		var form = $('#formFormaContratacaoVaga')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+'configuracoes/salvaFormaContratacaoVaga',
			dataType:"html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}


//USUARIOS

function configurar_perfis(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_perfis",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addPerfilUsuario(){
	$('#formPerfilUsuario').on('submit', function(e){
		e.preventDefault();

		var form = $('#formPerfilUsuario')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addPerfilUsuario",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function delPerfilUsuario(idPerfil){
	$.ajax({
		type:"POST",
		data:{idPerfil},
		url:RAIZ+"configuracoes/delPerfilUsuario",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}

function editarPerfilUsuario(idPerfil){
	$.ajax({
		type:"POST",
		data:{idPerfil},
		url:RAIZ+"configuracoes/editarPerfilUsuario",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}


function salvaPerfilUsuario(){
	$('#formPerfilUsuario').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formPerfilUsuario')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaPerfilUsuario",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}


function configurar_celulas(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_celulas",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
			
			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addCelulaUsuario(){
	$('#formCelulaUsuario').on('submit', function(e){
		e.preventDefault();

		var form = $('#formCelulaUsuario')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addCelulaUsuario",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function delCelulaUsuario(idCelula){
	$.ajax({
		type:"POST",
		data:{idCelula},
		url:RAIZ+"configuracoes/delCelulaUsuario",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}

function editarCelulaUsuario(idCelula){
	$.ajax({
		type:"POST",
		data:{idCelula},
		url:RAIZ+"configuracoes/editarCelulaUsuario",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);
		}
	})
}


function salvaCelulaUsuario(){
	$('#formCelulaUsuario').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formCelulaUsuario')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaCelulaUsuario",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

//CANDIDATOS


//CLIENTES
function configurar_statusClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_statusClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addStatusCliente(){
	$('#formStatusCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formStatusCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addStatusCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delStatusCliente(idStatus){
	$.ajax({
		type:"POST",
		data:{idStatus},
		url:RAIZ+"configuracoes/delStatusCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}


function configurar_OrigensClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_origensClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addOrigemCliente(){
	$('#formOrigemCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formOrigemCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addOrigemCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delOrigemCliente(idOrigem){
	$.ajax({
		type:"POST",
		data:{idOrigem},
		url:RAIZ+"configuracoes/delOrigemCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}



function configurar_ServicosClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_servicosClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addServicoCliente(){
	$('#formServicoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formServicoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addServicoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delServicoCliente(idServico){
	$.ajax({
		type:"POST",
		data:{idServico},
		url:RAIZ+"configuracoes/delServicoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}



function configurar_HistoricosClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_historicosClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addHistoricoCliente(){
	$('#formHistoricoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formHistoricoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addHistoricoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delHistoricoCliente(idHistorico){
	$.ajax({
		type:"POST",
		data:{idHistorico},
		url:RAIZ+"configuracoes/delHistoricoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}




function configurar_ZonasClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/editar_zonasClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function addFaixaCep(elemento){
	var d = new Date();
	var id = d.getTime();

	document.getElementById(elemento).innerHTML="<div class='row' id='"+id+"'><div class='col'><label for='cepInicio'>Faixa de Cep Inicial</label><input type='text' name='cepInicio[]' id='cepInicio' required class='form-control'/></div><div class='col'><label for='cepFinal'>Faixa de Cep Final</label><input type='text' name='cepFinal[]' id='cepFinal' required class='form-control'/></div><div class='col-1 text-right'><div class='btn btn-outline-light' style='margin-top:30px' title='Remover esta faixa de Cep' onClick='removerFaixaCep("+id+")'><i class='fas fa-trash text-danger'></i></div></div></div></div></div> <div id='faixaCep_"+id+"'><div class='row'><div class='col'><div class='btn btn-outline-info btn-sm btn-block' style='margin-top:5px' onClick=addFaixaCep('faixaCep_"+id+"')> Adicionar Faixa de Cep</div></div></div></div>";
}

function removerFaixaCep(id){
	document.getElementById(id).innerHTML="";
}

function addZonaCliente(){
	$('#formZonaCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formZonaCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addZonaCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function editarZona(idZona){
	$.ajax({
		type:"POST",
		data:{idZona},
		url:RAIZ+"configuracoes/editarZona",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function salvaZonaCliente(){
	$('#formZonaCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formZonaCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaZonaCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}

function delZonaCliente(idZona){
	$.ajax({
		type:"POST",
		data:{idZona},
		url:RAIZ+"configuracoes/delZonaCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}


function configurar_RamosClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/configurar_ramosClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}


function addRamoCliente(){
	$('#formRamoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formRamoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addRamoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}


function delRamoCliente(idRamo){
	$.ajax({
		type:"POST",
		data:{idRamo},
		url:RAIZ+"configuracoes/delRamoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function editarRamoCliente(idRamo){
	$.ajax({
		type:"POST",
		data:{idRamo},
		url:RAIZ+"configuracoes/editarRamoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function salvaRamoCliente(){
	$('#formRamoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formRamoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaRamoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}



function configurar_GruposClientes(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"configuracoes/configurar_gruposClientes",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}


function addGrupoCliente(){
	$('#formGrupoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formGrupoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/addGrupoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}


function delGrupoCliente(idGrupo){
	$.ajax({
		type:"POST",
		data:{idGrupo},
		url:RAIZ+"configuracoes/delGrupoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function editarGrupoCliente(idGrupo){
	$.ajax({
		type:"POST",
		data:{idGrupo},
		url:RAIZ+"configuracoes/editarGrupoCliente",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

		}
	})
}

function salvaGrupoCliente(){
	$('#formGrupoCliente').on('submit', function(e){
		e.preventDefault();

		var form  = $('#formGrupoCliente')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"configuracoes/salvaGrupoCliente",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');	
				$('#modal_content').append(result);
			},
			beforeSend:function(){
				
			}
		})
	});
}





//TELA DE USUARIOS
function novoUsuario(){
	$.ajax({
		type:"POST",
		data:{},
		url:RAIZ+"usuarios/novoUsuario",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop: 'static'
			})
			$('#modal').modal('show');
		}
	})
}

function cadastraUsuario(){
	$('#formNovoUsuario').on('submit', function(e){
		e.preventDefault();

		var form = $('#formNovoUsuario')['0'];
		var data = new FormData(form);
		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"usuarios/cadastraUsuario",
			dataType: "html",
			success:function(result){
				$('#modal_content').html('');
				$('#modal_content').append(result);
			}
		})
	})
}

function abrirUsuario(idUsuario){
	$.ajax({
		type:"POST",
		data:{idUsuario},
		url:RAIZ+"usuarios/abrirUsuario",
		dataType:"html",
		success:function(result){
			$('#modal_content').html('');
			$('#modal_content').append(result);

			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');
			
			$('.modal-dialog-default').addClass('modal-lg');
			$('#modal').modal({
				backdrop:'static'
			})
			$('#modal').modal('show');
		}
	})
}

function salvaAlteracoesUsuario(){
	$('#formEditaUsuario').on('submit', function(e){
		e.preventDefault();

		var form = $('#formEditaUsuario')['0'];
		var data = new FormData(form);

		$.ajax({
			type:"POST",
			data:data,
			contentType:false,
			processData:false,
			url:RAIZ+"usuarios/salvaAlteracoesUsuario",
			dataType:"html",
			success:function(result){
				$('#salvaUsuario').html('');
				$('#salvaUsuario').append(result);
			}
		})
	})
}

function resetarSenhaUsuario(idUser){
	$.ajax({
		type:"POST",
		data:{idUser},
		url:RAIZ+"usuarios/resetSenha",
		dataType:"html",
		success:function(result){
			$('#modal_content_add').html('');
			$('#modal_content_add').append(result);

			$('.modal_dialog_add').removeClass('modal-sm');
			$('.modal_dialog_add').removeClass('modal-lg');
			$('.modal_dialog_add').removeClass('modal-xl');

			$('#modal_add').modal({
				backdrop:'static'
			});
			$('#modal_add').modal('show');
		}

	})
}


/* VALIDACOES */
//adiciona mascara ao CPF
function MascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
        event.returnValue = false;
    }       
    return formataCampo(cpf, '000.000.000-00', event);
 }

 function MascaraCNPJ(cnpj){
	if(mascaraInteiro(cnpj)==false){
			event.returnValue = false;
	}       
	return formataCampo(cnpj, '00.000.000/0000-00', event);
}
 
 function ValidarCPF(campo) {
    var CPF = campo.value; // Recebe o valor digitado no campo
    exp = /\.|\-/g
    CPF = CPF.toString().replace( exp, "" ); 
    
    // Aqui começa a checagem do CPF
    var POSICAO, I, SOMA, DV, DV_INFORMADO;
    var DIGITO = new Array(10);
    DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
    
    // Desemembra o número do CPF na array DIGITO
    for (I=0; I<=8; I++) {
      DIGITO[I] = CPF.substr( I, 1);
    }
    
    // Calcula o valor do 10º dígito da verificação
    POSICAO = 10;
    SOMA = 0;
       for (I=0; I<=8; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO - 1;
       }
    DIGITO[9] = SOMA % 11;
       if (DIGITO[9] < 2) {
            DIGITO[9] = 0;
    }
       else{
           DIGITO[9] = 11 - DIGITO[9];
    }
    
    // Calcula o valor do 11º dígito da verificação
    POSICAO = 11;
    SOMA = 0;
       for (I=0; I<=9; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO - 1;
       }
    DIGITO[10] = SOMA % 11;
       if (DIGITO[10] < 2) {
            DIGITO[10] = 0;
       }
       else {
            DIGITO[10] = 11 - DIGITO[10];
       }
    
    // Verifica se os valores dos dígitos verificadores conferem
    DV = DIGITO[9] * 10 + DIGITO[10];
        if(CPF==""){
            $('#cpf').removeClass('border-success');
            $('#cpf').addClass('border-danger');
        }else{
            if (DV != DV_INFORMADO) {
                document.getElementById('alertaCPF').style.display="inline";
                $('#cpf').addClass('border-danger');
           
                campo.value = '';
                campo.focus();
                return false;
            } else{
                document.getElementById('alertaCPF').style.display="none";
                $('#cpf').removeClass('border-danger');
                $('#cpf').addClass('border-success');
            }
        }
	}
	
	//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
	var cnpj = ObjCnpj.value;
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;
	
	exp = /\.|\-|\//g
	cnpj = cnpj.toString().replace( exp, "" ); 
	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
			
	for(i = 0; i<valida.length; i++){
			dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
			dig2 += cnpj.charAt(i)*valida[i];       
	}
	dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
	
	if(((dig1*10)+dig2) != digito){  
		document.getElementById('alertaCNPJ').style.display="inline";
		$('#cnpj').addClass('border-danger');   
		campo.value = '';
		campo.focus();
		return false;
	 }
	 if(((dig1*10)+dig2) == digito){
		document.getElementById('alertaCNPJ').style.display="none";
                $('#cnpj').removeClass('border-danger');
                $('#cnpj').addClass('border-success');
	  }  
}

    //SENHA
 
    function ValidarSenha(campo) {
       var senha = document.getElementById('senha').value;
       var confirmacao = campo.value; 
      
       if(senha!=confirmacao){
          document.getElementById('alertaSenha').style.display="inline";
          campo.value = '';
          return false;
       } else{
          document.getElementById('alertaSenha').style.display="none";
       }
       
    }

    //CEP
    function MascaraCEP(cep){
        if(mascaraInteiro(cep)==false){
            event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
     }

    //TELEFONE
    function MascaraDDDeTEL(tel){
        if(mascaraInteiro(tel)==false){
            event.returnValue = false;
        }       
        var qtd = tel.value;
        if(qtd.length>=14){
            return formataCampo(tel, '(00) 00000-0000', event);
        }else{
            return formataCampo(tel, '(00) 0000-0000', event);
        }
	 }

	 function MascaraDDD(tel){
        if(mascaraInteiro(tel)==false){
            event.returnValue = false;
        }       
        var qtd = tel.value;
        return formataCampo(tel, '00', event);
    
     }
	 
	 function MascaraTEL(tel){
        if(mascaraInteiro(tel)==false){
            event.returnValue = false;
        }       
        var qtd = tel.value;
        if(qtd.length>=9){
            return formataCampo(tel, '00000-0000', event);
        }else{
            return formataCampo(tel, '0000-0000', event);
        }
	 }

	function MascaraDecimal(valor){
        if(mascaraInteiro(valor)==false){
            event.returnValue = false;
        }       
		var qtd = valor.value;
		var campo='';
		var a=qtd.length-2;
		
		for (let i = 0; i < a; i++) {
			
			campo=campo+'0';
		}
		campo=campo+'.00';
		//alert('Campo: '+campo);
		return formataCampo(valor, campo, event);
        
	 }
	 
	 function mascaraValor(elemento){
		var valor = document.getElementById(elemento).value;
		valor = valor.replace(",", ".");
		document.getElementById(elemento).value=valor;
	 }


	function MascaraNota(nota){
        if(mascaraInteiro(nota)==false){
            event.returnValue = false;
        }       
        return formataCampo(nota, '00.00', event);
     }

    /*function mascaraValor(valor){
        
        $('#'+valor).maskMoney();
          
    }*/
 
    //valida numero inteiro com mascara
 function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
 }
 
 
 //formata de forma generica os campos
 function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 
    
    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)|\:| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" ); 
 
    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 
    
    if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")|| (Mascara.charAt(i) == ":")
                                                            || (Mascara.charAt(i) == "/")) 
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                    if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                              TamanhoMascara++;
                    }else { 
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                            posicaoCampo++; 
                      }              
              }      
            campo.value = NovoValorCampo;
              return true; 
    }else { 
            return true; 
    }
 }
 //fim das formatacoes de campo