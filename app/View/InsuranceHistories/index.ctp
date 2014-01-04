<div class="insuranceHistories index">
	<h2><?php echo __('Insurance Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('policy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($insuranceHistories as $insuranceHistory): ?>
	<tr>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['policy_id']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $insuranceHistory['InsuranceHistory']['policy_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $insuranceHistory['InsuranceHistory']['policy_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $insuranceHistory['InsuranceHistory']['policy_id']), null, __('Are you sure you want to delete # %s?', $insuranceHistory['InsuranceHistory']['policy_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Insurance History'), array('action' => 'add')); ?></li>
	</ul>
</div>
