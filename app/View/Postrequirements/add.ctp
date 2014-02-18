<div class="postrequirements form">
<?php echo $this->Form->create('Postrequirement'); ?>
	<fieldset>
		<legend><?php echo __('Add Requirements'); ?></legend>
	<?php
		echo $this->Form->input('ItemDescription');
		echo $this->Form->input('Quantity');
		echo $this->Form->input('RequiredBy');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>