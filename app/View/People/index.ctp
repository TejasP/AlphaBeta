<div class="people index">
	<h2><?php echo __('People'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('orig_id'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('full_name'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($people as $person): ?>
	<tr>
		<td><?php echo h($person['Person']['person_id']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['orig_id']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['role_id']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['full_name']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['email']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['person_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['person_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['person_id']), null, __('Are you sure you want to delete # %s?', $person['Person']['person_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?></li>
	</ul>
</div>
