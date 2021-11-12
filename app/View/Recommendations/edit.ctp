<div class="recommendations form">

	<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
		<i class="large material-icons grey-text right">create</i>
		<div style="margin:15px 0;">
	        <h3><?php echo __('Editar recomendación'); ?></h3>
	        <p>DATOS DE LA RECOMENDACIÓN</p>   
	    </div>

	<?php echo $this->Form->create('Recommendation', array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>

			<?php echo $this->Form->input('id'); ?><!--id-->
			
            <div class="input-field col s12 m12">
				   <?php echo $this->Form->input('advice', array('label'=> 'Consejo')); ?>
            </div>
            <div class="input-field col s12 m12">
				   <?php echo $this->Form->input('sanction', array('label'=> 'Sanción')); ?>
            </div>
            <div class="input-field col s12 m12">
				   <?php echo $this->Form->input('communique', array('label'=> 'Comunicado')); ?>
            </div>
            <div class="input-field col s12 m12">
				   <?php echo $this->Form->input('alert_id', array('label'=> 'Alerta id')); ?>
            </div>

            <!--botones accion-->
            <div class="col s12">
				   <?php echo $this->Html->link('cancelar', ['controller' => 'recommendations', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
               <?php echo $this->Form->postButton('guardar', ['controller' => 'recommendations', 'action' => 'edit'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            </div>
            <!--fin botones accion-->

	<?php echo $this->Form->end(__('')); ?>
	</div>

</div>