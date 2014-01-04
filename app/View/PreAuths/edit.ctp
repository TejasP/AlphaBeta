<div class="preAuths form">
<?php echo $this->Form->create('PreAuth'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pre Auth'); ?></legend>
	<?php
		echo $this->Form->input('case_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PreAuth.case_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PreAuth.case_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pre Auths'), array('action' => 'index')); ?></li>
	</ul>
</div>
