<div class="reimbursements view">
<h2><?php echo __('Reimbursement'); ?></h2>
	<dl>
		<dt><?php echo __('Case Id'); ?></dt>
		<dd>
			<?php echo h($reimbursement['Reimbursement']['case_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reimbursement'), array('action' => 'edit', $reimbursement['Reimbursement']['case_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reimbursement'), array('action' => 'delete', $reimbursement['Reimbursement']['case_id']), null, __('Are you sure you want to delete # %s?', $reimbursement['Reimbursement']['case_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reimbursements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reimbursement'), array('action' => 'add')); ?> </li>
	</ul>
</div>
