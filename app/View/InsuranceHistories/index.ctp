<div class="insuranceHistories index">
	<h2><?php echo __('Insurance Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('case_id'); ?></th>
			<th><?php echo $this->Paginator->sort('covered_by_another_mediclaim'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_commencement'); ?></th>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('policy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sum_insured'); ?></th>
			<th><?php echo $this->Paginator->sort('hosp_in_last_4yrs'); ?></th>
			<th><?php echo $this->Paginator->sort('hospitalized_date'); ?></th>
			<th><?php echo $this->Paginator->sort('diaginosis_datail'); ?></th>
			<th><?php echo $this->Paginator->sort('prev_covered_mediclaim'); ?></th>
			<th><?php echo $this->Paginator->sort('prev_covered_company'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($insuranceHistories as $insuranceHistory): ?>
	<tr>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['case_id']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['covered_by_another_mediclaim']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['date_of_commencement']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['company_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($insuranceHistory['Policy']['id'], array('controller' => 'policies', 'action' => 'view', $insuranceHistory['Policy']['id'])); ?>
		</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['sum_insured']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['hosp_in_last_4yrs']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['hospitalized_date']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['diaginosis_datail']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['prev_covered_mediclaim']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['prev_covered_company']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($insuranceHistory['InsuranceHistory']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $insuranceHistory['InsuranceHistory']['case_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $insuranceHistory['InsuranceHistory']['case_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $insuranceHistory['InsuranceHistory']['case_id']), null, __('Are you sure you want to delete # %s?', $insuranceHistory['InsuranceHistory']['case_id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Policies'), array('controller' => 'policies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policy'), array('controller' => 'policies', 'action' => 'add')); ?> </li>
	</ul>
</div>
