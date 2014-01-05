<div class="roles view">
<h2><?php echo __('Role'); ?></h2>
	<dl>
		<dt><?php echo __('Role Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['role_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Type'); ?></dt>
		<dd>
			<?php echo h($role['Role']['role_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Description'); ?></dt>
		<dd>
			<?php echo h($role['Role']['role_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($role['Role']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($role['Role']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($role['Role']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($role['Role']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['role_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['role_id']), null, __('Are you sure you want to delete # %s?', $role['Role']['role_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
	</ul>
</div>
