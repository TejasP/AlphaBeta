<div class="reimbursements form">
<?php echo $this->Form->create('Reimbursement'); ?>
	<fieldset>
		<legend><?php echo __('Add Reimbursement'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reimbursements'), array('action' => 'index')); ?></li>
	</ul>
</div>
