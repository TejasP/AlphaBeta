<div class="claims form">
<?php echo $this->Form->create('Claim'); ?>
	<fieldset>
		<legend><?php echo __('Edit Claim'); ?></legend>
	<?php
		echo $this->Form->input('case_id');
		echo $this->Form->input('clm_intimate_datetime');
		echo $this->Form->input('case_type');
		echo $this->Form->input('status');
		echo $this->Form->input('policy_id');
		echo $this->Form->input('tpa_id');
		echo $this->Form->input('hospital_id');
		echo $this->Form->input('diagnostic_code');
		echo $this->Form->input('procedure_code');
		echo $this->Form->input('datetime_of_adm');
		echo $this->Form->input('datetime_of_disc');
		echo $this->Form->input('tot_amt_claimed');
		echo $this->Form->input('room_nursing_chrgs');
		echo $this->Form->input('surgery_chrgs');
		echo $this->Form->input('consultation_chrgs');
		echo $this->Form->input('investigate_chrgs');
		echo $this->Form->input('medicine_chrgs');
		echo $this->Form->input('misc_chrgs');
		echo $this->Form->input('pre_hosp_expenses');
		echo $this->Form->input('post_hosp_expenses');
		echo $this->Form->input('tot_claim_paid');
		echo $this->Form->input('reason_for_reject');
		echo $this->Form->input('remarks_of_tpa');
		echo $this->Form->input('diagn_code_level2');
		echo $this->Form->input('diagn_code_level3');
		echo $this->Form->input('proc_code_level2');
		echo $this->Form->input('proc_code_level3');
		echo $this->Form->input('medi_hist_level1');
		echo $this->Form->input('proc_desc_level1');
		echo $this->Form->input('proc_desc_level2');
		echo $this->Form->input('proc_desc_level3');
		echo $this->Form->input('medi_hist_level2');
		echo $this->Form->input('medi_hist_level3');
		echo $this->Form->input('reason_red_claim');
		echo $this->Form->input('type_claim_paym');
		echo $this->Form->input('hosp_is_network');
		echo $this->Form->input('oth_non_hosp_exp');
		echo $this->Form->input('datetime_of_payment');
		echo $this->Form->input('paym_reference');
		echo $this->Form->input('type_of_payment');
		echo $this->Form->input('created_by');
		echo $this->Form->input('created_when');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('updated_when');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Claim.case_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Claim.case_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Claims'), array('action' => 'index')); ?></li>
	</ul>
</div>
