<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/bootstrap.min.css">

    <!-- STYLESHEET LOGIN -->
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/style-login.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,800|Lato:700" rel="stylesheet">

        <!-- Favicon -->
    <link rel="icon" href="<?= BASE_URL?>assets/img/brand.png" sizes="32x32">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/brand.png" sizes="192x192">

    <title>PEOPLE - RHadar Tecnologia | Autenticação</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">
                <div class="card box-login">
                    <div class="card-body ">

                        <div class='row text-center'>
  						    <div class='col'>
  							    <img src="<?= BASE_URL?>assets/img/logo.png" style='width: 80%' alt="PEOPLE">
  								<h4 class='logo-title'>Autenticação</h4>
  							</div>
  						</div>
  						<hr/>
  						<form method="POST">
	  						<div class='row'>
	  							<div class='col'>
	  								<input type='text' name='username' required class='form-control' placeholder="Digite seu login">
	  							</div>
	  						</div>
	  						<br/>
	  						<div class='row'>
	  							<div class='col'>
	  								<input type='password' name='pass' required class='form-control' placeholder="Digite sua senha">
	  							</div>
	  						</div>
	  						<br/>
	  						<div class='row'>
	  							<div class='col-10 offset-1'>
	  								<button type='submit' class='btn btn-primary btn-block'>
	  									Entrar
	  								</button>
	  							</div>
	  						</div>	
	  					</form>	
  						<br/>
  						<div class='row'>
  							<div class='col-8 offset-2'>
  								<a class='btn btn-outline-info btn-sm btn-block' href="<?= LINK.'login/forgotPassword'?>">
  									Esqueci a minha senha
  								</a>
  							</div>
                          
                        </div>
                    </div>
                   
                </div>
                <br/>
  			    <small class='copy'>Copyright © 2001-<?= date('Y')?> PEOPLE - Todos os direitos reservados</small>
                
                <?php if(isset($error) && !empty($error)):?>
                    <br/>
                    <div class="alert alert-danger" role="alert">
                        <strong><?= $error ?></strong>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= BASE_URL?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= BASE_URL?>assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">var RAIZ = "<?= BASE_URL ?>";</script>
    <script src="<?= BASE_URL?>assets/js/scripts.js"></script>
    <script src="<?= BASE_URL?>assets/js/masks.js"></script>
  </body>
</html>

    