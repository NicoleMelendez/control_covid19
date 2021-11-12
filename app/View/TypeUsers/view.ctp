<div class="typeUsers view">
<h2><?php echo __('Tipo de usuarios'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($typeUser['TypeUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo de usuario'); ?></dt>
		<dd>
			<?php echo h($typeUser['TypeUser']['title_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar tipo de usuario'), array('action' => 'edit', $typeUser['TypeUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar tipo de usuario'), array('action' => 'delete', $typeUser['TypeUser']['id']), array(), __('Are you sure you want to delete # %s?', $typeUser['TypeUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista tipo de usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo tipo de usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
