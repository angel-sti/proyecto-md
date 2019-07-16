<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro - Concert Manager</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/semantic.css" type="text/css" />
	<script src="<?php echo base_url();?>/js/semantic.js" type="text/javascript"></script>

	<style>
	body{
		background-color: #fff !important;
	}
	
	body > .grid{
		height: 100%;
	}

	a{
		color: #999;
	}
	
	.column{
		max-width: 400px;
	}
</style>

<div class="ui middle aligned center aligned grid">

	<div class="column">
	
		<h3 class="top attached header">
			Formulario de Registro - Concert Manager
		</h3>
		
	  	<div class="ui attached piled segment">

			<form class="ui login form error" method="post" action="<?php echo site_url("registro/registrar")?>">
				<div class="field">
					<div class="ui input">
						<input type="text" name="nombre" placeholder="Nombre" autofocus>
					</div>
				</div>
				<div class="field">
					<div class="ui input">
						<input type="text" name="email" placeholder="Correo electrónico">
					</div>
				</div>
				<div class="field">
					<div class="ui input">
						<input type="password" name="pass" placeholder="Contraseña">
					</div>
				</div>
				<div class="field">
					<button type="submit" class="ui button fluid submit">Registrarse</button>					
					<div class="ui error message"></div>
				</div>
			</form>
		
		</div>
		
	</div>
	
</div>