<div class="typeUsers index">
	<h2><?php echo __('Tipo de usuarios'); ?></h2>

	<!--boton agregar-->
	<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'type_users', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
	<br><br>
	<!--fin boton agregar-->

	<!--tabla-->
	<table class="striped responsive-table centered grey lighten-2 z-depth-2" >
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('title_type','Tipo de usuario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($typeUsers as $typeUser): ?>
		<tr>
			<td><?php echo h($typeUser['TypeUser']['id']); ?></td>
			<td><?php echo h($typeUser['TypeUser']['title_type']); ?></td>
			<td class="actions">
				<!--<?php echo $this->Html->link(__('Vista'), array('action' => 'view', $typeUser['TypeUser']['id'])); ?>-->
				<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $typeUser['TypeUser']['id'])); ?>
				<?php echo $this->Form->postLink(__('✖️'), array('action' => 'delete', $typeUser['TypeUser']['id']), array('confirm' => __('¿Estas seguro que quieres borrarl el tipo de usuario %s?', $typeUser['TypeUser']['title_type']))); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<!--tabla-->

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
	</div>
</div>
