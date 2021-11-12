<div class="forecasts form">
	<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">playlist_add</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Nuevo pronóstico'); ?></h3>
            <p>DATOS DEL PRONÓSTICO</p>   
        </div>

		<?php echo $this->Form->create('Forecast',array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>

			<div class="input-field col s12 m6">
				<?php echo $this->Form->input('forecast_state_id', array('label'=> 'Estado de pronóstico')); ?>
            </div>
			<div class="input-field col s12 m6">
				<?php echo $this->Form->input('patient_id', array('label'=> 'Paciente')); ?>
            </div>
			<!--botones accion-->
            <div class="col s12">
				<?php echo $this->Html->link('cancelar', ['controller' => 'forecasts', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
                <?php echo $this->Form->postButton('guardar', ['controller' => 'forecasts', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            </div>
            <!--fin botones accion-->

		<?php echo $this->Form->end(__('')); ?>
	
	</div>
</div>
