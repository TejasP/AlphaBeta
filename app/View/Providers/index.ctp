<div class="providers index">
	<h2><?php echo __('Providers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_type'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_id'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_name'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_pan'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_addr'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_pin'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($providers as $provider): ?>
	<tr>
		<td><?php echo h($provider['Provider']['id']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_type']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_id']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_name']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_pan']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_addr']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['provider_pin']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($provider['Provider']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $provider['Provider']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $provider['Provider']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $provider['Provider']['id']), null, __('Are you sure you want to delete # %s?', $provider['Provider']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Provider'), array('action' => 'add')); ?></li>
	</ul>
</div>
