<div class="providers view">
<h2><?php echo __('Provider'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Type'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Id'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Name'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Pan'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_pan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Addr'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_addr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Pin'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['provider_pin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Provider'), array('action' => 'edit', $provider['Provider']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Provider'), array('action' => 'delete', $provider['Provider']['id']), null, __('Are you sure you want to delete # %s?', $provider['Provider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provider'), array('action' => 'add')); ?> </li>
	</ul>
</div>
