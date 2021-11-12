<div class="states view">
<h2><?php echo __('Estado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Título de Estado'); ?></dt>
		<dd>
			<?php echo h($state['State']['title_state']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estado'), array('action' => 'edit', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Estado'), array('action' => 'delete', $state['State']['id']), array(), __('¿Estás seguro de que quieres eliminar ID # %s?', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Estados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Pacientes'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Paciente'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Patients'); ?></h3>
	<?php if (!empty($state['Patient'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Origen'); ?></th>
		<th><?php echo __('Genero'); ?></th>
		<th><?php echo __('Fecha de Registro'); ?></th>
		<th><?php echo __('Id del Departamento'); ?></th>
		<th><?php echo __('Id del estado'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($state['Patient'] as $patient): ?>
		<tr>
			<td><?php echo $patient['id']; ?></td>
			<td><?php echo $patient['name']; ?></td>
			<td><?php echo $patient['last_name']; ?></td>
			<td><?php echo $patient['origin']; ?></td>
			<td><?php echo $patient['gender']; ?></td>
			<td><?php echo $patient['registration_date']; ?></td>
			<td><?php echo $patient['department_id']; ?></td>
			<td><?php echo $patient['state_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Vista'), array('controller' => 'patients', 'action' => 'view', $patient['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'patients', 'action' => 'edit', $patient['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'patients', 'action' => 'delete', $patient['id']), array(), __('¿Estás seguro de que quieres eliminar ID # %s?', $patient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Paciente'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
