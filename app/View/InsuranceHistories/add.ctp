<div class="insuranceHistories form">
<?php echo $this->Form->create('InsuranceHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Insurance History'); ?></legend>
	<?php
		echo $this->Form->input('covered_by_another_mediclaim');
		echo $this->Form->input('date_of_commencement');
		echo $this->Form->input('company_name');
		echo $this->Form->input('policy_id');
		echo $this->Form->input('sum_insured');
		echo $this->Form->input('hosp_in_last_4yrs');
		echo $this->Form->input('hospitalized_date');
		echo $this->Form->input('diaginosis_datail');
		echo $this->Form->input('prev_covered_mediclaim');
		echo $this->Form->input('prev_covered_company');
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

		<li><?php echo $this->Html->link(__('List Insurance Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Policies'), array('controller' => 'policies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policy'), array('controller' => 'policies', 'action' => 'add')); ?> </li>
	</ul>
</div>
