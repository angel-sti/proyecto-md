<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $user->nombre ?> - Concert Manager</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/semantic.css" type="text/css" />
	<script src="<?php echo base_url();?>/js/jquery.js" type="text/javascript"></script>
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
		max-width: 800px;
	}
</style>
<div class="ui secondary menu">
	<div class="right menu">		
		<a class="item" href="<?php echo site_url('banda/all') ?>">
			Explorar Bandas
		</a>
		<a class="item" href="<?php echo site_url('local/all') ?>">
			Explorar Locales
		</a>
		<a class="item" href="<?php echo site_url("usuario/view/{$this->session->data_usuario->id}") ?>">
			Perfil
		</a>
		<a class="item red" href="<?php echo site_url("login/logout") ?>">
			<i class="times icon"></i>
			Cerrar sesión
		</a>
	</div>
</div>

<div class="ui middle aligned center aligned grid">

	<div class="column">
	
		<h3 class="top attached header">
			Crear Banda
		</h3>
		
	  	<div class="ui attached piled segment">

	  		<form class="ui form error" method="post" action="<?php echo site_url("banda/submit");?>">
				<div class="field">
					<div class="ui input">
						<input type="text" name="nombre" placeholder="Nombre de la Banda" autofocus>
					</div>
				</div>
				<div class="field">					
					<select multiple="" class="ui dropdown" name="generos[]">
						<option value="">Seleccione géneros</option>
						<?php foreach ($generos as $item) { ?>
						<option value="<?php echo $item->id ?>"><?php echo $item->nombre ?></option>
						<?php } ?>
					</select>
				</div>				
				<div class="field">
					<select class="ui dropdown" name="pais">
						<option value="">Seleccione pais</option>
						<?php foreach ($paises as $item) { ?>
						<option value="<?php echo $item->id ?>"><?php echo $item->nombre ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="field">
					<select class="ui dropdown" name="region">
						<option value="">Seleccione región</option>
						<?php foreach ($this->pais_model->getRegionesFrom(1) as $item) { ?>
						<option value="<?php echo $item->id ?>"><?php echo $item->nombre ?></option>
						<?php } ?>
					</select>
				</div>			
				<div class="field">
					<button type="submit" class="ui button primary submit">Crear</button>					
					<div class="ui error message"></div>
				</div>
			</form>		
		
		</div>
		
	</div>
	
</div>

<script type="text/javascript">
						$('select.dropdown').dropdown();
					</script>