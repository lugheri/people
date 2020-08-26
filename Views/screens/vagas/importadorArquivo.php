<div class="modal-content">
    <div class="modal-header">
        <p class="h5 modal-title"><i class="fas fa-upload"></i> Importar Arquivo</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form id='formUpload' method="POST" enctype="multipart/form-data">
        <input type='hidden' name='idVaga' id='idVaga' required value='<?= $idVaga?>'/>
        <div class="modal-body">
            <div class='row'>
		    	<div class='col'>
		    		<label for='arquivo'>Arquivo</label>
		    		<input type='file' name='arquivo' id='arquivo' required class='form-control'/>
		    	</div>
		    	<div class='col'>
		    		<label for='nome'>Nome</label>
		    		<input type='text' id='nome' name='nome' class='form-control'/>
		    	</div>
        	</div>		
	    	<div class='row'>
	    		<div class='col'>
	    			<label for='descricao'>Descrição</label>
	    			<textarea id='descricao' name='descricao' class='form-control'></textarea>
	    		</div>
	    	</div>	
	    </div>
	    <div class="modal-footer">
            <div class="btn btn-secondary" data-dismiss="modal">
                Cancelar
            </div>
	    	<button type="submit" class='btn btn-info' onClick="enviarArquivo_Vaga()">
	    		<i class='fas fa-paper-plane'></i> Enviar arquivo
	       	</button>	        
        </div>
    </form>
</div>