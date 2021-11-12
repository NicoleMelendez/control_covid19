<div class="users form">

   <div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">playlist_add</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Nuevo usuario'); ?></h3>
            <p>DATOS DEL USUARIO</p>   
        </div>

		<!--form-->
      <?php echo $this->Form->create('User', array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('username', array('label'=> 'Usuario')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('password', array('label'=> 'Contraseña')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('name', array('label'=> 'Nombre')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('last_name', array('label'=> 'Apellido')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('dui', array('label'=> 'DUI')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('phone', array('label'=> 'Telefono')); ?>
            </div>
            <div class="input-field col s12 m6">
				   <?php echo $this->Form->input('type_user_id', array('label'=> 'Tipo de usuario')); ?>
            </div>
            <!--botones accion-->
            <div class="col s12">
				   <?php echo $this->Html->link('cancelar', ['controller' => 'users', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); ?>
               <?php echo $this->Form->postButton('guardar', ['controller' => 'users', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            </div>
            <!--fin botones accion-->

		<?php echo $this->Form->end(__('')); ?>
		<!--fin form-->

   </div>

</div>