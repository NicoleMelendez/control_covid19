<div class="users index">

	<h2><?php echo __('Usuarios'); ?></h2>
<!--boton agregar-->
<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'users', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
<br><br>
<!--fin boton agregar-->

	<!--tabla-->
	<div class="card">
		<table class="striped responsive-table centered grey lighten-2 z-depth-2" >
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name','Apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('dui','DUI'); ?></th>
			<th><?php echo $this->Paginator->sort('phone','Teléfono'); ?></th>
			<th><?php echo $this->Paginator->sort('id','Tipo de usuario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['id']); ?></td>
			<td><?php echo h($user['User']['username']); ?></td>
			<td><?php echo h($user['User']['name']); ?></td>
			<td><?php echo h($user['User']['last_name']); ?></td>
			<td><?php echo h($user['User']['dui']); ?></td>
			<td><?php echo h($user['User']['phone']); ?></td>
			<td>
				<?php echo h($user['TypeUser']['title_type']); ?>
			</td>
			<td class="actions">
				<!--<?php echo $this->Html->link(__('👁️'), array('action' => 'view', $user['User']['id'])); ?>--><!--ver-->
				<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $user['User']['id'])); ?><!--editar-->
				<?php echo $this->Form->postLink('✖️', ['controller' => 'users', 'action' => 'delete', $user['User']['id']], array('confirm' => __('¿Estás seguro de que quieres eliminar a %s?', $user['User']['username']))); ?><!--eliminar-->
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>	
		<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	<!--fin tabla-->
</div>