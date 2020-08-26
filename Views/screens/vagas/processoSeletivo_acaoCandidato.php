<div class="row">
    <div class="col">
        <p class="h6 text-muted"><i class="fas fa-user-tie"></i> Candidato: <b><?= $this->nomeCandidato($idCandidato)?></b></p>
    </div>
</div>
<div class="row">    
    <div class="col">
        <?php 
        //FASE Recebido
        if($fase=="Recebido"){?>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-alt"></i> Currículo
            </div>
            <a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':Edicao')?>" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-tie"></i> Candidato
            </a>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="mudaFase('<?= $idVaga?>','<?= $idCandidato?>','Selecionado')">
                <i class="fas fa-flag"></i> Selecionar
            </div>
            <div class="btn btn-outline-info btn-sm" onClick="encaminharCandidato('<?= $idVaga?>','<?= $idCandidato?>','Encaminhado')" style="margin-bottom:5px">
                <i class="fas fa-share"></i> Encaminhar
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-search"></i> Filtrar
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-edit"></i> Observação
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-plus-circle"></i> Etapa Adicional
            </div>
            
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-microphone-alt"></i> Entrevista Virtual
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-paper-plane"></i> Enviar Email
            </div>
            
            <?php
        }
        //FASE SELECIONADO
        if($fase=="Selecionado"){?>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-alt"></i> Currículo
            </div>
            <a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':Edicao')?>" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-tie"></i> Candidato
            </a>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="chamarCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-mobile-alt"></i> Chamar
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-gift"></i> Brinde
            </div>
            <div class="btn btn-outline-success btn-sm" style="margin-bottom:5px" onClick="mudaFase('<?= $idVaga?>','<?= $idCandidato?>','Apto')">
                <i class="fas fa-flag"></i> Apto
            </div>
            <div class="btn btn-outline-info btn-sm" onClick="encaminharCandidato('<?= $idVaga?>','<?= $idCandidato?>','Encaminhado')" style="margin-bottom:5px">
                <i class="fas fa-share"></i> Encaminhar
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-edit"></i> Observação
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-plus-circle"></i> Etapa Adicional
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-search"></i> Busca
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-microphone-alt"></i> Entrevista Virtual
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-paper-plane"></i> Enviar Email
            </div>
            <a href="<?= LINK?>candidatos/novoCandidato/" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-plus"></i> Incluir Candidato
            </a>
            <?php
        }
        //FASE APTOS
        if($fase=="Apto"){?>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-alt"></i> Currículo
            </div>
            <a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':Edicao')?>" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-tie"></i> Candidato
            </a>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="chamarCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-mobile-alt"></i> Chamar
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="mudaFase('<?= $idVaga?>','<?= $idCandidato?>','Selecionado')">
                <i class="fas fa-flag"></i> Selecionar
            </div>
            <div class="btn btn-outline-info btn-sm" onClick="encaminharCandidato('<?= $idVaga?>','<?= $idCandidato?>','Encaminhado')" style="margin-bottom:5px">
                <i class="fas fa-share"></i> Encaminhar
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-plus-circle"></i> Etapa Adicional
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="recusaCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-slash"></i> Recusado
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-paper-plane"></i> Enviar Email
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-edit"></i> Observação
            </div>
           
           
            <?php
        }
        //FASE ENCAMINHADO
        if($fase=="Encaminhado"){?>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-alt"></i> Currículo
            </div>
            <a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':Edicao')?>" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-tie"></i> Candidato
            </a>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="mudaFase('<?= $idVaga?>','<?= $idCandidato?>','Selecionado')">
                <i class="fas fa-flag"></i> Selecionar
            </div>
            <div class="btn btn-outline-success btn-sm" style="margin-bottom:5px" onClick="mudaFase('<?= $idVaga?>','<?= $idCandidato?>','Aprovado')">
                <i class="fas fa-flag"></i> Aprovar
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="recusaCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-slash"></i> Recusado
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-plus-circle"></i> Etapa Adicional
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file"></i> Carta
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-paper-plane"></i> Enviar Email
            </div>
            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-edit"></i> Observação
            </div>
            <?php
        }
        //FASE APROVADOS
        if($fase=="Aprovado"){?>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-alt"></i> Currículo
            </div>
            <a href="<?= LINK?>candidatos/fichaCandidato/<?= base64_encode($idCandidato.':Edicao')?>" target="blank" class="btn btn-outline-info btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-tie"></i> Candidato
            </a>
            <div class="btn btn-outline-info btn-sm" onClick="encaminharCandidato('<?= $idVaga?>','<?= $idCandidato?>','Encaminhado')" style="margin-bottom:5px">
                <i class="fas fa-share"></i> Encaminhar
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="recusaCandidato('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-slash"></i> Recusado
            </div>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-export"></i> Exportacao
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-file-signature"></i> Contrato
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-paper-plane"></i> Enviar Email
            </div>
            <div class="btn btn-outline-secondary btn-sm" style="margin-bottom:5px">
                <i class="fas fa-user-minus"></i> Demitir
            </div>

            <div class="btn btn-outline-info btn-sm" style="margin-bottom:5px" onClick="addObservacoes('<?= $idVaga?>','<?= $idCandidato?>','<?= $fase?>')">
                <i class="fas fa-edit"></i> Observação
            </div>
            <?php
        }
        //FASE RECUSADOS
        if($fase=="Recusado"){?>
            <div class="btn btn-outline-danger btn-sm" style="margin-bottom:5px" onClick="excluirCandidatoProcesso('<?= $idVaga?>','<?= $idCandidato?>','<?=$fase?>','confirmacao')">
                <i class="fas fa-user-times"></i> Excluir
            </div>
            <?php
        }?>
    </div>
</div>
