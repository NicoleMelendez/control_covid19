<div class="patients index">
	<h2><?php echo __('Pacientes'); ?></h2>


		<!--boton agregar-->
	<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'patients', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
	<br><br>
	<!--fin boton agregar-->


	<table 	class="striped responsive-table centered grey lighten-2 z-depth-2">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort( 'id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('origin' ,'Origen'); ?></th>
			<th><?php echo $this->Paginator->sort('gender' ,'Género'); ?></th>
			<th><?php echo $this->Paginator->sort('registration_date', 'Fecha de Registro'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id','Departamento'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id', 'Estado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>


	</thead>
	<tbody>
	<?php foreach ($patients as $patient): ?>


	<tr>
		<td><?php echo h($patient['Patient']['id']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['name']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['origin']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['gender']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['registration_date']); ?>&nbsp;</td>
		<td>
			<!--<?php echo $this->Html->link($patient['Department']['name_department'], array('controller' => 'departments', 'action' => 'view', $patient['Department']['id'])); ?> -->
			<?php echo h($patient['Department']['name_department']); ?>
		</td>
		<td>
			<!--<?php echo $this->Html->link($patient['State']['title_state'], array('controller' => 'states', 'action' => 'view', $patient['State']['id'])); ?>-->
			<?php echo h($patient['State']['title_state']); ?>
		</td>
		<td class="actions">
			<!--<?php echo $this->Html->link(__('Vista'), array('action' => 'view', $patient['Patient']['id'])); ?>-->
			<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $patient['Patient']['id'])); ?><!--editar-->
			<?php echo $this->Form->postLink('✖️', ['controller' => 'users', 'action' => 'delete', $patient['Patient']['id']], array('confirm' => __('¿Estás seguro de que quieres eliminar a %s?', $patient['Patient']['name']))); ?><!--eliminar-->
			
		</td>
	</tr>

	<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('class'=>'btn-flat waves-effect waves-teal grey lighten-3'), null, array('class' => 'prev disabled btn-flat waves-effect waves-teal grey lighten-3'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array('class'=>'btn-flat waves-effect waves-teal grey lighten-3'), null, array('class' => 'next disabled btn-flat waves-effect waves-teal grey lighten-3'));
	?>
	</div>
	<!-- Fin de la tabla -->
</div>