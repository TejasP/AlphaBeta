<div class="policies form">
<?php echo $this->Form->create('Policy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Policy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('policy_id');
		echo $this->Form->input('person_id');
		echo $this->Form->input('tpa_id');
		echo $this->Form->input('policy_start_datetime');
		echo $this->Form->input('policy_end_datetime');
		echo $this->Form->input('premium_amt');
		echo $this->Form->input('sum_insured');
		echo $this->Form->input('bonus_sum_insured');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Policy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Policy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Policies'), array('action' => 'index')); ?></li>
	</ul>
</div>
