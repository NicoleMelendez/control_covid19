<div class="recommendations index">
	<h2><?php echo __('Recomendaciones'); ?></h2>

	<!--boton agregar-->
	<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'recommendations', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
	<br>
	<br>
	<!--fin boton agregar-->

	<div class="card">
		<table class="striped responsive-table centered grey lighten-2 z-depth-2">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
				<th><?php echo $this->Paginator->sort('advice', 'Consejo'); ?></th>
				<th><?php echo $this->Paginator->sort('sanction', 'Sanción'); ?></th>
				<th><?php echo $this->Paginator->sort('communique', 'Comunicado'); ?></th>
				<th><?php echo $this->Paginator->sort('title_alert', 'Alerta'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($recommendations as $recommendation): ?>
		<tr>
			<td><?php echo h($recommendation['Recommendation']['id']); ?></td>
			<td><?php echo h($recommendation['Recommendation']['advice']); ?></td>
			<td><?php echo h($recommendation['Recommendation']['sanction']); ?></td>
			<td><?php echo h($recommendation['Recommendation']['communique']); ?></td>
			<td>
				<?php echo h($recommendation['Alert']['title_alert']); ?>
				<!--<?php echo $this->Html->link($recommendation['Alert']['title_alert'], array($recommendation['Alert']['id'])); ?>-->
			</td>
			<td class="actions">
				<!--<?php echo $this->Html->link(__('Vista'), array('action' => 'view', $recommendation['Recommendation']['id'])); ?>-->
				<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $recommendation['Recommendation']['id'])); ?>
				<?php echo $this->Form->postLink(__('✖️'), array('action' => 'delete', $recommendation['Recommendation']['id']), array('confirm' => __('¿Está seguro que desea eliminar a la recomendación "%s"?', $recommendation['Recommendation']['advice']))); ?>
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
	</div>
</div>

