<div class='container col s12 m7'>
	<!-- Formularios para acceder -->
	<div class="card blue-grey darken-4 deep-purple-text text-darken-4">
        <div class="card-content">
            <h3 class='white-text center'>Control COVID-19</h3>
        </div>
        <div class="card-tabs">
			<ul class='tabs center-align tabs-transparent blue-grey darken-2'>
				<li class='tab'><a class='active' href='#inicio_sesion'>INICIAR SESIÓN</a></li>
			</ul>
		</div>
		<div class="card-content grey lighten-4">
			<div class='container'>
				<!-- Formulario para iniciar sesión -->
				<div id='inicio_sesion'>
                    <div class='center-align users form'>
                            
                        <?php echo $this->Form->create('User'); ?>
                        <div class="col s12 m12">
                            <?php echo $this->Form->input('username', array('label' => false, 'class' => '', 'placeholder' => 'Usuario')); ?>
                        </div>
                        <div class="col s12 m12">
                            <?php echo $this->Form->input('password', array('label' => false, 'class' => '', 'placeholder' => 'Contraseña')); ?>
                        </div>
                        <div class='row center-align'>
                            <br>
                            <?php echo $this->Form->end(array('label' => 'acceder', 'class' =>'btn blue-grey darken-2')); ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>