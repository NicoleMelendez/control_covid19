<div class="users form">

	<div class="card grey lighten-2 col m11 s10 offset-s1 black-text">
        <i class="large material-icons grey-text right">create</i>
        <div style="margin:15px 0;">
            <h3><?php echo __('Editar usuario'); ?></h3>
            <p>DATOS DEL USUARIO</p>   
        </div>
		<!--form-->
		<?php echo $this->Form->create('User', array('class'=>'grey lighten-2 col m11 s10 offset-s1 grey-text')); ?>
		
			<?php echo $this->Form->input('id'); ?><!--id-->

			<div class="input-field col s12 m6">
                <?php echo $this->Form->input('username', array('label'=> 'Usuario')); ?>
            </div>
        <!--<div class="input-field col s12 m6 hide">
                <?php //echo $this->Form->input('password', array('label'=> 'Contraseña')); ?>
            </div>-->
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
            <?php if($current_user['type_user_id'] == '1'):?>
            <div class="input-field col s12 m6">
                <?php echo $this->Form->input('type_user_id', array('label'=> 'Tipo de usuario')); ?>
            </div>
            <?php endif?>
            <div class="input-field col s12 m6">
				<br><button data-target="modal1" class="btn modal-trigger btn-flat waves-effect waves-teal grey lighten-1 ">Cambiar contraseña</button><br>
			</div>

			<div id="modal1" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>Cambiar contraseña</h4>
                    <p>Llene los campos</p>

                    <div class="container col s6 offset-s3">
                        <br>
                        <div class="input-field col s12">
                            <?php echo $this->Form->input('new_password', array('label'=> 'Nueva contraseña','type'=>'password')); ?>
                        </div>
                        <div class="input-field col s12">
                            <?php echo $this->Form->input('confirm_password', array('label'=> 'Confirmar contraseña','type'=>'password')); ?>
                        </div>
                    </div>
                </div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
				</div>
			</div>

			<!--botones accion-->
            <div class="col s12">
                <?php if($current_user['type_user_id'] == '1'){
                    echo $this->Html->link('cancelar', ['controller' => 'users', 'action' => 'index'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); 
                    }else{
                        echo $this->Html->link('cancelar', ['controller' => 'pages', 'action' => 'home'], array('class'=>'right btn-flat waves-effect waves-teal red lighten-1')); 
                    }
                ?>
                <?php echo $this->Form->postButton('guardar', ['controller' => 'users', 'action' => 'edit'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
            </div>
            <!--fin botones accion-->

		<?php echo $this->Form->end(); ?>
		<!--form-->

	</div>
    
</div>
