<div class="patients view">
<h2><?php echo __('Paciente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origen'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genero'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de Registro'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['registration_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patient['Department']['name_department'], array('controller' => 'departments', 'action' => 'view', $patient['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patient['State']['title_state'], array('controller' => 'states', 'action' => 'view', $patient['State']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Paciente'), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eiminar Paciente'), array('action' => 'delete', $patient['Patient']['id']), array(), __('¿Estás seguro de que quieres eliminar ID # %s?', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Pacientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Paciente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de departamento'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo departamento'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista estados'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo estado'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Casos'), array('controller' => 'cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Caso'), array('controller' => 'cases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de pronósticos'), array('controller' => 'forecasts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo pronóstico'), array('controller' => 'forecasts', 'action' => 'add')); ?> </li>
	</ul>
</div>
		<div class="related">
		<h3><?php echo __('Pronósticos relacionados'); ?></h3>
	<?php if (!empty($patient['Forecast'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $patient['Forecast']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Estado del pronóstico'); ?></dt>
		<dd>
	<?php echo $patient['Forecast']['forecast_state_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Paciente'); ?></dt>
		<dd>
	<?php echo $patient['Forecast']['patient_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Editar pronóstico'), array('controller' => 'forecasts', 'action' => 'edit', $patient['Forecast']['id'])); ?></li>
			</ul>
		</div>
	</div>
	