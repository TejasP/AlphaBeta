<div class="people view">
<h2><?php echo __('Person'); ?></h2>
	<dl>
		<dt><?php echo __('Person Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['person_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orig Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['orig_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['role_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($person['Person']['full_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($person['Person']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($person['Person']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($person['Person']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($person['Person']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($person['Person']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($person['Person']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($person['Person']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['person_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['person_id']), null, __('Are you sure you want to delete # %s?', $person['Person']['person_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
	</ul>
</div>
