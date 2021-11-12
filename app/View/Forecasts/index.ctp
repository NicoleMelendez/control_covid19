<div class="forecasts index">
	<h2><?php echo __('Pronósticos'); ?></h2>

	<!--boton agregar-->
	<?php echo $this->Form->postButton('<i class="right material-icons">add</i>agregar', ['controller' => 'forecasts', 'action' => 'add'], array('class'=>'right btn-flat waves-effect waves-teal grey lighten-1')); ?>
	<br><br>
	<!--fin boton agregar-->

	<!--tabla-->
	<table class="striped responsive-table centered grey lighten-2 z-depth-2" >
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('title_forecast','Estado de pronósticos'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Paciente'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($forecasts as $forecast): ?>
			<tr>
				<td><?php echo h($forecast['Forecast']['id']); ?>&nbsp;</td>
				<td>
					<?php echo h($forecast['ForecastState']['title_forecast']); ?>
				</td>
				<td>
					<?php echo h($forecast['Patient']['name']); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('🖊️'), array('action' => 'edit', $forecast['Forecast']['id'])); ?>
					<?php echo $this->Form->postLink(__('✖️'), array('action' => 'delete', $forecast['Forecast']['id']), array('confirm' => __('¿Estás seguro de que quieres eliminar al paciente %s?', $forecast['Patient']['name']))); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

