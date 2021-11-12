<div class="patients form">


<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">create</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Editar paciente'); ?></h3>
            <p>DATOS DEL PACIENTE</p>   
        </div>

		<!--form-->
		<?php echo $this->Form->create('Patient', array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>

		<?php echo $this->Form->input('id'); ?><!--id-->
					<div class="input-field col s12 m6">	
					<?php echo $this->Form->input('name', array('label'=> 'Nombre')); ?>
					</div>
					<div class="input-field col s12 m6">	
					<?php echo $this->Form->input('age', array('label'=> 'Edad')); ?>
					</div>
					<div class="input-field col s12 m6">
						<?php echo $this->Form->input('origin', array('label'=> 'Origen','type' => 'select','options' => array('Local' => 'Local', 'Importado' => 'Importado'),)); ?>
					</div>
					<div class="input-field col s12 m6">
						<?php echo $this->Form->input('gender', array('label'=> 'Género','type' => 'select','options' => array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'),)); ?>
					</div>
					
					<div class="input-field col s12 m6">
						<?php echo $this->Form->input('department_id', array('label'=> 'ID del departamento'));?>
					</div>
					<div class="input-field col s12 m6">
						<?php echo $this->Form->input('state_id', array('label'=> 'Estado')); ?>
					</div>

					<div class="input-field col s12 m6">
              			<br>
               			 <button data-target="modal1" class="btn modal-trigger btn-flat waves-effect waves-teal grey lighten-1 ">Cambiar fecha</button>
                		<br>
            		</div>

            		

           			<div id="modal1" class="modal modal-fixed-footer">
                		<div class="modal-content container s10 center">
						<?php echo $this->Form->input('registration_date', array('label'=> 'Fecha de registro')); ?>
						</div>
						<div class="modal-footer">
							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
						</div>
					</div>


					<!--botones accion-->
					<div class="col s12">
				  	<?php echo $this->Html->link('cancelar', ['controller' => 'patients', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
               		<?php echo $this->Form->postButton('guardar', ['controller' => 'patients', 'action' => 'edit'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            		</div>
           			<!--fin botones accion-->
	

</div>