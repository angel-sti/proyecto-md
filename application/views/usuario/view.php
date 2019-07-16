<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $user->nombre ?> - Concert Manager</title>
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
		max-width: 800px;
	}
</style>
</head>
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
			Perfil Usuario
		</h3>
		
	  	<div class="ui attached piled segment">

	  		<table class="ui table">
	  			<tr>
	  				<td>Nombre: </td>
	  				<td><?php echo $user->nombre ?></td>
	  			</tr>
	  			<tr>
	  				<td>Email: </td>
	  				<td><?php echo $user->email ?></td>
	  			</tr>
	  			<tr>
	  				<td>Banda asociada: </td>
	  				<?php

	  					if ($user->asoc_banda == NULL){


	  			    ?>

	  			    <td>
	  			    	<?php if ($owner){ ?>
	  			    	<a href="<?php echo site_url("banda/crear") ?>">Crear Banda</a>
	  			    	<?php } ?>
	  			   	</td>
	  			    <?php


	  					} else {

	  				?>
	  				<td>
	  					<?php echo $banda_model->getNombre($user->asoc_banda) ?>
	  					(<a href="<?php echo site_url("banda/view/{$user->asoc_banda}") ?>">Ver</a>/<a href="<?php echo site_url("banda/administrar/{$user->asoc_banda}") ?>">Administrar</a>)
	  				</td>
	  				<?php


	  					}

	  				?>	  				  				
	  			</tr>
	  			<tr>
	  				<td>Local asociado: </td>
	  				<?php

	  					if ($user->asoc_local == NULL){


	  			    ?>

	  			    <td>
	  			    	<?php if ($owner){ ?>
	  			    	<a href="<?php echo site_url("local/crear") ?>">Crear Local</a></td>
	  			    	<?php } ?>
	  			    <?php


	  					} else {

	  				?>
	  				<td>
	  					<?php echo $local_model->getNombre($user->asoc_local) ?>
	  					(<a href="<?php echo site_url("local/view/{$user->asoc_local}") ?>">Ver</a>/<a href="<?php echo site_url("local/administrar/{$user->asoc_local}") ?>">Administrar</a>)
	  				</td>
	  				<?php


	  					}

	  				?>	  				  				
	  			</tr>
	  			<tr>
	  				<td>Fecha de registro:</td>
	  				<td><?php echo date('d/m/Y', $user->fecha_registro) ?></td>
	  			</tr>
	  		</table>		
		
		</div>
		
	</div>
	
</div>