<div class="reimbursements form">
<?php echo $this->Form->create('Reimbursement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reimbursement'); ?></legend>
	<?php
		echo $this->Form->input('case_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reimbursement.case_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Reimbursement.case_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reimbursements'), array('action' => 'index')); ?></li>
	</ul>
</div>
