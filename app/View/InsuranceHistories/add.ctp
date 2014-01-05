<div class="insuranceHistories form">
<?php echo $this->Form->create('InsuranceHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Insurance History'); ?></legend>
	<?php
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
	</ul>
</div>
