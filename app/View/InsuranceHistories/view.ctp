<div class="insuranceHistories view">
<h2><?php echo __('Insurance History'); ?></h2>
	<dl>
		<dt><?php echo __('Case Id'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['case_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Covered By Another Mediclaim'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['covered_by_another_mediclaim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Commencement'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['date_of_commencement']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($insuranceHistory['Policy']['id'], array('controller' => 'policies', 'action' => 'view', $insuranceHistory['Policy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sum Insured'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['sum_insured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hosp In Last 4yrs'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['hosp_in_last_4yrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospitalized Date'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['hospitalized_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diaginosis Datail'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['diaginosis_datail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prev Covered Mediclaim'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['prev_covered_mediclaim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prev Covered Company'); ?></dt>
		<dd>
			<?php echo h($insuranceHistory['InsuranceHistory']['prev_covered_company']); ?>
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
		<li><?php echo $this->Html->link(__('Edit Insurance History'), array('action' => 'edit', $insuranceHistory['InsuranceHistory']['case_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Insurance History'), array('action' => 'delete', $insuranceHistory['InsuranceHistory']['case_id']), null, __('Are you sure you want to delete # %s?', $insuranceHistory['InsuranceHistory']['case_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Insurance Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Insurance History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies'), array('controller' => 'policies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policy'), array('controller' => 'policies', 'action' => 'add')); ?> </li>
	</ul>
</div>
