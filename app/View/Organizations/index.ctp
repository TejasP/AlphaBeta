<div class="organizations index">
	<h2><?php echo __('Organizations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('orig_id'); ?></th>
			<th><?php echo $this->Paginator->sort('orig_name'); ?></th>
			<th><?php echo $this->Paginator->sort('key_person'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('pin_code'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizations as $organization): ?>
	<tr>
		<td><?php echo h($organization['Organization']['orig_id']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['orig_name']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['key_person']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['email']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['address']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['pin_code']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['orig_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['orig_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organization['Organization']['orig_id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['orig_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?></li>
	</ul>
</div>
