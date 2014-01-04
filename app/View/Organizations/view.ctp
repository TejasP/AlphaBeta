<div class="organizations view">
<h2><?php echo __('Organization'); ?></h2>
	<dl>
		<dt><?php echo __('Orig Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['orig_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orig Name'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['orig_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key Person'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['key_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pin Code'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['pin_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['orig_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['orig_id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['orig_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
	</ul>
</div>
