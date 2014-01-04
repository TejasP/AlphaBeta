<div class="claims view">
<h2><?php echo __('Claim'); ?></h2>
	<dl>
		<dt><?php echo __('Case Id'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['case_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clm Intimate Datetime'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['clm_intimate_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Case Type'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['case_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy Id'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['policy_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpa Id'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['tpa_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospital Id'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['hospital_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostic Code'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['diagnostic_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Procedure Code'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['procedure_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime Of Adm'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['datetime_of_adm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime Of Disc'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['datetime_of_disc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tot Amt Claimed'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['tot_amt_claimed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Nursing Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['room_nursing_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surgery Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['surgery_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consultation Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['consultation_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Investigate Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['investigate_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medicine Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['medicine_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Misc Chrgs'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['misc_chrgs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pre Hosp Expenses'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['pre_hosp_expenses']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Hosp Expenses'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['post_hosp_expenses']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tot Claim Paid'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['tot_claim_paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason For Reject'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['reason_for_reject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks Of Tpa'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['remarks_of_tpa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagn Code Level2'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['diagn_code_level2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagn Code Level3'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['diagn_code_level3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proc Code Level2'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['proc_code_level2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proc Code Level3'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['proc_code_level3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medi Hist Level1'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['medi_hist_level1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proc Desc Level1'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['proc_desc_level1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proc Desc Level2'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['proc_desc_level2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proc Desc Level3'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['proc_desc_level3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medi Hist Level2'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['medi_hist_level2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medi Hist Level3'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['medi_hist_level3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason Red Claim'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['reason_red_claim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Claim Paym'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['type_claim_paym']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hosp Is Network'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['hosp_is_network']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oth Non Hosp Exp'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['oth_non_hosp_exp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime Of Payment'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['datetime_of_payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paym Reference'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['paym_reference']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Of Payment'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['type_of_payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($claim['Claim']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Claim'), array('action' => 'edit', $claim['Claim']['case_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Claim'), array('action' => 'delete', $claim['Claim']['case_id']), null, __('Are you sure you want to delete # %s?', $claim['Claim']['case_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Claims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Claim'), array('action' => 'add')); ?> </li>
	</ul>
</div>
