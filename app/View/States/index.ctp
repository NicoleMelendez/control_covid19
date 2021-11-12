<div class="states index">
	<h2><?php echo __('Estados'); ?></h2>
	<!--boton agregar-->
		<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'States', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
		<br><br>
	<!--tabla-->
	<div class="card">
		<table class="striped responsive-table centered grey lighten-2 z-depth-2" >
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
					<th><?php echo $this->Paginator->sort('title_state','Titulo Estado'); ?></th>
					<th class="actions"><?php echo __('Acciones'); ?></th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($states as $state): ?>
				<tr>
					<td><?php echo h($state['State']['id']); ?></td>
					<td><?php echo h($state['State']['title_state']); ?></td>
					<td class="actions">
						<!--<?php echo $this->Html->link(__('👁️'), array('action' => 'view', $state['State']['id'])); ?>--><!--ver-->
						<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $state['State']['id'])); ?><!--editar-->
						<?php echo $this->Form->postLink('✖️', ['controller' => 'states', 'action' => 'delete', $state['State']['id']], array('confirm' => __('¿Estás seguro de que quieres eliminar a %s?', $state['State']['title_state']))); ?><!--eliminar-->
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
	
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	
		<!--fin tabla-->
</div> 