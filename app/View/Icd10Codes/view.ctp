<div class="icd10Codes view">
<h2><?php echo __('Icd10 Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostic Code'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['diagnostic_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostic Level'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['diagnostic_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostic Desc'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['diagnostic_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created When'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['created_when']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated When'); ?></dt>
		<dd>
			<?php echo h($icd10Code['Icd10Code']['updated_when']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Icd10 Code'), array('action' => 'edit', $icd10Code['Icd10Code']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Icd10 Code'), array('action' => 'delete', $icd10Code['Icd10Code']['id']), null, __('Are you sure you want to delete # %s?', $icd10Code['Icd10Code']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Icd10 Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icd10 Code'), array('action' => 'add')); ?> </li>
	</ul>
</div>
