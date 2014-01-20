<div class="postrequirements view">
<h2><?php echo __('Postrequirement'); ?></h2>
	<dl>
		<dt><?php echo __('ItemId'); ?></dt>
		<dd>
			<?php echo h($postrequirement['Postrequirement']['ItemId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ItemDescription'); ?></dt>
		<dd>
			<?php echo h($postrequirement['Postrequirement']['ItemDescription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($postrequirement['Postrequirement']['Quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UsersId'); ?></dt>
		<dd>
			<?php echo h($postrequirement['Postrequirement']['UsersId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RequiredBy'); ?></dt>
		<dd>
			<?php echo h($postrequirement['Postrequirement']['RequiredBy']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postrequirement'), array('action' => 'edit', $postrequirement['Postrequirement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postrequirement'), array('action' => 'delete', $postrequirement['Postrequirement']['id']), null, __('Are you sure you want to delete # %s?', $postrequirement['Postrequirement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postrequirements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postrequirement'), array('action' => 'add')); ?> </li>
	</ul>
</div>
