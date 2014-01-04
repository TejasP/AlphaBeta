<div class="preAuths view">
<h2><?php echo __('Pre Auth'); ?></h2>
	<dl>
		<dt><?php echo __('Case Id'); ?></dt>
		<dd>
			<?php echo h($preAuth['PreAuth']['case_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pre Auth'), array('action' => 'edit', $preAuth['PreAuth']['case_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pre Auth'), array('action' => 'delete', $preAuth['PreAuth']['case_id']), null, __('Are you sure you want to delete # %s?', $preAuth['PreAuth']['case_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pre Auths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pre Auth'), array('action' => 'add')); ?> </li>
	</ul>
</div>
