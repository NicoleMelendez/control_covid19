<?php
	$cakeDescription = __d('cake_dev', 'COVID-19');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	
	<!--validar interface-->
	<?php 
		if($_SERVER['REQUEST_URI'] == '/control_covid19/publics' 
		|| $_SERVER['REQUEST_URI'] == '/control_covid19/publics/index'
		|| $_SERVER['REQUEST_URI'] == '/control_covid19/')
		{
			//include menu
			echo $this->element('menu_public');  
		}
		else
		{
			//include menu
			echo $this->element('menu');
		}
	?>
	
	
	<?php
		/* 
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/

		echo $this->Html->meta('icon');
		echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js');
		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js');
		echo $this->Html->script('https://www.gstatic.com/charts/loader.js');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<!--validar interface-->
	<?php 
		if($_SERVER['REQUEST_URI'] == '/control_covid19/publics' 
		|| $_SERVER['REQUEST_URI'] == '/control_covid19/publics/index'
		|| $_SERVER['REQUEST_URI'] == '/control_covid19/')
		{?>
			
		<!--contenido-->
		<div class='row'>
			<div class='col l9 s12'>
				<div id="container">
					<div id="content">
						<?php echo $this->Session->flash(); ?>

						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		</div>
		<!--fin contenido-->
		<!--footer-->
		<footer class="page-footer blue-grey darken-4">
			<div class="container">
				<div class="row center">
				<br><h4>#QuédateEnCasa</h4><br>
				</div>
			</div>
			<div class='footer-copyright blue-grey darken-2'>
				<div class='container'>
					<span class='grey-text text-lighten-4 left'><?php print('Copyright <span>©'.date(' Y ').'Control COVID-19</span>') ?></span>
				</div>
			</div>
		</footer>
		<!--end footer-->
			
	<?php }
		else
		{?>

		<!--contenido-->
		<div class='row'>
			<div class='col l9 s12 push-l3'>
				<div id="container">
					<div id="content">
						<?php echo $this->Session->flash(); ?>

						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		</div>
		<!--fin contenido-->
			
	<?php }
	?>
	


	<?php echo $this->element('sql_dump'); ?>
	<!--Inicializacion de los javascripts-->
	<script>
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();
			});
    </script>
</body>
</html>
