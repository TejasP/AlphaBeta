<div class="claimsHistories view">
<h2><?php echo __('Claims History'); ?></h2>
	<dl>
		<dt><?php echo __('Case Id'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['case_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($claimsHistory['ClaimsHistory']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Claims History'), array('action' => 'edit', $claimsHistory['ClaimsHistory']['case_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Claims History'), array('action' => 'delete', $claimsHistory['ClaimsHistory']['case_id']), null, __('Are you sure you want to delete # %s?', $claimsHistory['ClaimsHistory']['case_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Claims Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Claims History'), array('action' => 'add')); ?> </li>
	</ul>
</div>
