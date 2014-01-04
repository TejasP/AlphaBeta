<div class="claims index">
	<h2><?php echo __('Claims'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('case_id'); ?></th>
			<th><?php echo $this->Paginator->sort('clm_intimate_datetime'); ?></th>
			<th><?php echo $this->Paginator->sort('case_type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('policy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tpa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hospital_id'); ?></th>
			<th><?php echo $this->Paginator->sort('diagnostic_code'); ?></th>
			<th><?php echo $this->Paginator->sort('procedure_code'); ?></th>
			<th><?php echo $this->Paginator->sort('datetime_of_adm'); ?></th>
			<th><?php echo $this->Paginator->sort('datetime_of_disc'); ?></th>
			<th><?php echo $this->Paginator->sort('tot_amt_claimed'); ?></th>
			<th><?php echo $this->Paginator->sort('room_nursing_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('surgery_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('consultation_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('investigate_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('medicine_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('misc_chrgs'); ?></th>
			<th><?php echo $this->Paginator->sort('pre_hosp_expenses'); ?></th>
			<th><?php echo $this->Paginator->sort('post_hosp_expenses'); ?></th>
			<th><?php echo $this->Paginator->sort('tot_claim_paid'); ?></th>
			<th><?php echo $this->Paginator->sort('reason_for_reject'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks_of_tpa'); ?></th>
			<th><?php echo $this->Paginator->sort('diagn_code_level2'); ?></th>
			<th><?php echo $this->Paginator->sort('diagn_code_level3'); ?></th>
			<th><?php echo $this->Paginator->sort('proc_code_level2'); ?></th>
			<th><?php echo $this->Paginator->sort('proc_code_level3'); ?></th>
			<th><?php echo $this->Paginator->sort('medi_hist_level1'); ?></th>
			<th><?php echo $this->Paginator->sort('proc_desc_level1'); ?></th>
			<th><?php echo $this->Paginator->sort('proc_desc_level2'); ?></th>
			<th><?php echo $this->Paginator->sort('proc_desc_level3'); ?></th>
			<th><?php echo $this->Paginator->sort('medi_hist_level2'); ?></th>
			<th><?php echo $this->Paginator->sort('medi_hist_level3'); ?></th>
			<th><?php echo $this->Paginator->sort('reason_red_claim'); ?></th>
			<th><?php echo $this->Paginator->sort('type_claim_paym'); ?></th>
			<th><?php echo $this->Paginator->sort('hosp_is_network'); ?></th>
			<th><?php echo $this->Paginator->sort('oth_non_hosp_exp'); ?></th>
			<th><?php echo $this->Paginator->sort('datetime_of_payment'); ?></th>
			<th><?php echo $this->Paginator->sort('paym_reference'); ?></th>
			<th><?php echo $this->Paginator->sort('type_of_payment'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created_when'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_when'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($claims as $claim): ?>
	<tr>
		<td><?php echo h($claim['Claim']['case_id']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['clm_intimate_datetime']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['case_type']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['status']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['policy_id']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['tpa_id']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['hospital_id']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['diagnostic_code']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['procedure_code']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['datetime_of_adm']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['datetime_of_disc']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['tot_amt_claimed']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['room_nursing_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['surgery_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['consultation_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['investigate_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['medicine_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['misc_chrgs']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['pre_hosp_expenses']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['post_hosp_expenses']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['tot_claim_paid']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['reason_for_reject']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['remarks_of_tpa']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['diagn_code_level2']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['diagn_code_level3']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['proc_code_level2']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['proc_code_level3']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['medi_hist_level1']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['proc_desc_level1']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['proc_desc_level2']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['proc_desc_level3']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['medi_hist_level2']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['medi_hist_level3']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['reason_red_claim']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['type_claim_paym']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['hosp_is_network']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['oth_non_hosp_exp']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['datetime_of_payment']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['paym_reference']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['type_of_payment']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['created_when']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($claim['Claim']['updated_when']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $claim['Claim']['case_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $claim['Claim']['case_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $claim['Claim']['case_id']), null, __('Are you sure you want to delete # %s?', $claim['Claim']['case_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Claim'), array('action' => 'add')); ?></li>
	</ul>
</div>
