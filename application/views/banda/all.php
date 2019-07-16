<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Explorar Bandas - Concert Manager</title>
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
			Listado de Bandas
		</h3>
		
	  	<div class="ui attached piled segment">

	  		<table class="ui table">
	  			<thead>
	  				<th>Nombre</th>
	  				<th>Pais</th>
	  				<th>Región</th>
	  				<th>Estado</th>
	  				<th></th>
	  			</thead>
	  			<tbody>
	  			<?php
	  				foreach ($bandas as $banda) {
	  			?>
	  			<tr>
	  				<td><?php echo $banda->nombre ?></td>
	  				<td><?php echo $banda_model->getPaisAsString($banda->id) ?></td>
	  				<td><?php echo $banda_model->getRegionAsString($banda->id) ?></td>
	  				<td><?php echo $banda->estado == 1 ? 'Activa' : 'No activa' ?></td>
	  				<td><a href="<?php echo site_url("banda/view/{$banda->id}") ?>">Ver</a></td>
	  			</tr>
	  			<?php
	  				}
	  			?>
	  			</tbody>
	  		</table>
		
		</div>
		
	</div>
	
</div>

<script type="text/javascript">
						$('select.dropdown').dropdown();
					</script>