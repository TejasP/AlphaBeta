<div class="icd10Codes form">
<?php echo $this->Form->create('Icd10Code'); ?>
	<fieldset>
		<legend><?php echo __('Edit Icd10 Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('diagnostic_code');
		echo $this->Form->input('diagnostic_level');
		echo $this->Form->input('diagnostic_desc');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Icd10Code.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Icd10Code.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Icd10 Codes'), array('action' => 'index')); ?></li>
	</ul>
</div>
