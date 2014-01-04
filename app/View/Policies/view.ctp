<div class="policies view">
<h2><?php echo __('Policy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy Id'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['policy_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person Id'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['person_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpa Id'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['tpa_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy Start Datetime'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['policy_start_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy End Datetime'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['policy_end_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Premium Amt'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['premium_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sum Insured'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['sum_insured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bonus Sum Insured'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['bonus_sum_insured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($policy['Policy']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policy'), array('action' => 'edit', $policy['Policy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Policy'), array('action' => 'delete', $policy['Policy']['id']), null, __('Are you sure you want to delete # %s?', $policy['Policy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policy'), array('action' => 'add')); ?> </li>
	</ul>
</div>
