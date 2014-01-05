<div class="policies index">
	<h2><?php echo __('Policies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('policy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tpa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('policy_start_datetime'); ?></th>
			<th><?php echo $this->Paginator->sort('policy_end_datetime'); ?></th>
			<th><?php echo $this->Paginator->sort('premium_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('sum_insured'); ?></th>
			<th><?php echo $this->Paginator->sort('bonus_sum_insured'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($policies as $policy): ?>
	<tr>
		<td><?php echo h($policy['Policy']['id']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['policy_id']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['person_id']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['tpa_id']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['policy_start_datetime']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['policy_end_datetime']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['premium_amt']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['sum_insured']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['bonus_sum_insured']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($policy['Policy']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $policy['Policy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $policy['Policy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $policy['Policy']['id']), null, __('Are you sure you want to delete # %s?', $policy['Policy']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Policy'), array('action' => 'add')); ?></li>
	</ul>
</div>
