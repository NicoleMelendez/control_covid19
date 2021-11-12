<div class="states form">
	<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">playlist_add</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Nuevo estado'); ?></h3>
            <p>DATOS DEL ESTADO</p>   
        </div>
        <!--form-->
		<?php echo $this->Form->create('State'); ?>
		
			<div class="input-field col s12 m6">
			<?php
				echo $this->Form->input('title_state', array('label'=> 'Título estado'));
			?>
			</div>

		 	<!--botones accion-->
			 <div class="col s12">
				   <?php echo $this->Html->link('cancelar', ['controller' => 'states', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
	               <?php echo $this->Form->postButton('guardar', ['controller' => 'states', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
	            </div>
             <!--fin botones accion-->
		<?php echo $this->Form->end(__('')); ?>
		<!--fin form-->
	</div>
</div>
