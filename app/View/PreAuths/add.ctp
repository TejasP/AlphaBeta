<div class="preAuths form">
<?php echo $this->Form->create('PreAuth'); ?>
	<fieldset>
		<legend><?php echo __('Add Pre Auth'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pre Auths'), array('action' => 'index')); ?></li>
	</ul>
</div>
