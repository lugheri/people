function editarLogo(idCliente){
    
    $.ajax({
		type:"POST",
		data:{idCliente},
		url:RAIZ+"editorPagina/editarLogo",
		dataType: "html",
		success:function(result){
			$('#modal_content').html('');	
			$('#modal_content').append(result);

			//removendo outras possiveis classes de tamanho
			$('.modal-dialog-default').removeClass('modal-sm');
			$('.modal-dialog-default').removeClass('modal-lg');
			$('.modal-dialog-default').removeClass('modal-xl');

			$('#modal').modal('show');
        },
	});
}