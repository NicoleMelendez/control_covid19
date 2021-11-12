<div class="Users view">
<h2><?php echo __('Usuarios'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['name_user']); ?>
		</dd>
		<dt><?php echo __('Contraseña'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
		</dd>
		<dt><?php echo __('Dui'); ?></dt>
		<dd>
			<?php echo h($user['User']['dui']); ?>
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
		</dd>
		<dt><?php echo __('Tipo de usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['TypeUser']['title_type'], array('controller' => 'type_users', 'action' => 'view', $user['TypeUser']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Usuario'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Tipo de Usuarios'), array('controller' => 'type_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo de Usuarios'), array('controller' => 'type_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
