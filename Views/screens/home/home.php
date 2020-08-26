<div class='container-fluid'>
	<div class='row'>
		<div class='col-4'>
			<br/>
			<h4>Bem Vindo(a) <?= $userName?></h4>
			<h5><?= $account . ' - '.$nomeCliente?></h5>
			<?php 
			
			$meses = array("01"=>"Janeiro",
			               "02"=>"Fevereiro",
			               "03"=>"Março",
			               "04"=>"Abril",
			               "05"=>"Maio",
			               "06"=>"Junho",
			               "07"=>"Julho",
			               "08"=>"Agosto",
			               "09"=>"Setembro",
			               "10"=>"Outubro",
			               "11"=>"Novembro",
			               "12"=>"Dezembro")?>
			<h6><?= "Dia ".date('d')." de ".$meses[date('m')]." de ".date('Y')?></h6>
			<hr/>
		</div>
	</div>
</div>		