<div class="insuranceHistories view">
<h2><?php echo __('Insurance History'); ?></h2>
	<dl>
		<dt><?php echo __('Policy Id'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['policy_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Insurance History'), array('action' => 'edit', $insuranceHistory['InsuranceHistory']['policy_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Insurance History'), array('action' => 'delete', $insuranceHistory['InsuranceHistory']['policy_id']), null, __('Are you sure you want to delete # %s?', $insuranceHistory['InsuranceHistory']['policy_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Insurance Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insurance History'), array('action' => 'add')); ?> </li>
	</ul>
</div>
