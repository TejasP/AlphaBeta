<div class="insuranceHistories form">
<?php echo $this->Form->create('InsuranceHistory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Insurance History'); ?></legend>
	<?php
		echo $this->Form->input('policy_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InsuranceHistory.policy_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InsuranceHistory.policy_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Insurance Histories'), array('action' => 'index')); ?></li>
	</ul>
</div>
