<div class="recommendations view">
<h2><?php echo __('Recomendaciones'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recommendation['Recommendation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consejo'); ?></dt>
		<dd>
			<?php echo h($recommendation['Recommendation']['advice']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sancio'); ?></dt>
		<dd>
			<?php echo h($recommendation['Recommendation']['sanction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comunicado'); ?></dt>
		<dd>
			<?php echo h($recommendation['Recommendation']['communique']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alerta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recommendation['Alert']['title_alert'], array('controller' => 'alerts', 'action' => 'view', $recommendation['Alert']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Recomendacion'), array('action' => 'edit', $recommendation['Recommendation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Recomendacion'), array('action' => 'delete', $recommendation['Recommendation']['id']), array(), __('¿Estás seguro de que quieres eliminar ID # %s?', $recommendation['Recommendation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista de Recomendaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Recomendacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Alertas'), array('controller' => 'alerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Alertas'), array('controller' => 'alerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
