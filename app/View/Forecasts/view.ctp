<div class="forecasts view">
<h2><?php echo __('Pronóstico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($forecast['Forecast']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado de pronóstico'); ?></dt>
		<dd>
			<?php echo $this->Html->link($forecast['ForecastState']['title_forecast'], array('controller' => 'forecast_states', 'action' => 'view', $forecast['ForecastState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paciente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($forecast['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $forecast['Patient']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar pronóstico'), array('action' => 'edit', $forecast['Forecast']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar pronóstico'), array('action' => 'delete', $forecast['Forecast']['id']), array(), __('¿Estás seguro de que quieres eliminar ID # %s?', $forecast['Forecast']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de pronósticos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo pronóstico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar estados de pronóstico'), array('controller' => 'forecast_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo estados de pronóstico'), array('controller' => 'forecast_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Pacientes'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Paciente'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
