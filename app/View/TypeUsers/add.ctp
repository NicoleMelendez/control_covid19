
<div class="typeUsers form">

	
	<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">playlist_add</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Nuevo tipo de usuario'); ?></h3>
            <p>TIPO DE USUARIO</p>   
        </div>

		<?php echo $this->Form->create('TypeUser',array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>
			
			<div class="input-field col s12 m12">
				<?php echo $this->Form->input('title_type', array('label'=> 'Tipo de usuario')); ?>
            </div>
			<!--botones accion-->
            <div class="col s12">
				<?php echo $this->Html->link('cancelar', ['controller' => 'type_users', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
                <?php echo $this->Form->postButton('guardar', ['controller' => 'type_users', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            </div>
            <!--fin botones accion-->
			
		<?php echo $this->Form->end(__('')); ?>
	
	</div>

</div>
