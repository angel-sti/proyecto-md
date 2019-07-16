<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bienvenido - Concert Manager</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/semantic.css" type="text/css" />
	<script src="<?php echo base_url();?>/js/semantic.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/js/jquery.js" type="text/javascript"></script>

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
			Bienvenido a Concert Manager
		</h3>
		
	  	<form class="ui large login form error" method="post" action="<?php echo site_url("login/access")?>">
				<div class="field">
					<div class="ui input">
						<input type="text" name="email" placeholder="Correo electrónico" autofocus>
					</div>
				</div>
				<div class="field">
					<div class="ui input">
						<input type="password" name="password" placeholder="Contraseña">
					</div>
				</div>
				<div class="field">
					<button type="submit" class="ui button primary fluid submit">Iniciar sesión</button>					
					<div class="ui error message"></div>
				</div>
				<div class="field">
					<a href="<?php echo site_url("registro") ?>">Registrarse</a>
				</div>
			</form>
		
	</div>
	
</div>