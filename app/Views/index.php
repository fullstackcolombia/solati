<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?= csrf_meta() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>FSC</title>
  </head>
  <body>
    <div class="container">
		<h1>Test Solati</h1>
		<p>User <b>pruebas</b></p>
		<p>Clave <b>prueba123</b></p>
		<p>URL <a href="javascript:void(0);"><?= site_url('dao') ?></a></p>
		<hr>
		<div class="row">
			<div class="col-sm-6">
				<main class="form-signin">
				  <form method="post" action="<?php echo site_url('info'); ?>">
					<?= csrf_field() ?>
					<h1 class="h3 mb-3 fw-normal">Probar DAO</h1>
					<div class="form-floating">
					  <input name="username" type="text" class="form-control" id="floatingInput" value="pruebas">
					  <label for="floatingInput">Usuario</label>
					</div>
					<div class="form-floating">
					  <input name="password" type="password" class="form-control" id="floatingPassword" value="prueba123">
					  <label for="floatingPassword">Clave</label>
					</div>
					<button class="w-100 btn btn-lg btn-primary btn_send" type="button">Enviar</button>
				  </form>
				</main>
			</div>
			<div class="col-sm-6">
				<p class="result"></p>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		if($('.btn_send').length){
			$('.btn_send').on('click',function(e){
				e.preventDefault();
				$.post($('form').prop('action'), {
					csrf_token_name: $("meta[name='X-CSRF-TOKEN']").attr("content"),
					username: $('input[name="username"]').val(),
					password: $('input[name="password"]').val()
				}, function (data) {
					$('.result').html(data);
				}, "html");
			});
		}
	});
	</script>
  </body>
</html>