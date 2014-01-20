<div class="postrequirements form">
<?php echo $this->Form->create('Postrequirement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Postrequirement'); ?></legend>
	<?php
		echo $this->Form->input('ItemId');
		echo $this->Form->input('ItemDescription');
		echo $this->Form->input('Quantity');
		echo $this->Form->input('UsersId');
		echo $this->Form->input('RequiredBy');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Postrequirement.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Postrequirement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postrequirements'), array('action' => 'index')); ?></li>
	</ul>
</div>
