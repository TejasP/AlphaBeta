<!-- File: // View/Claims/c_step2.ctp -->
<h2 class="pagehead">Claim Application</h2>

<?php include('/c_progress.ctp'); ?>

<?php echo $this->Form->create('Claim', array(
	'inputDefaults' => array(
		'div' => false,
		'label' => false,
		'class' => 'form-control'
	),
	'class' => 'myform form-inline'
)); ?>

<div class="row">
	<h3 class="sectionhead">DETAILS OF INSURANCE HISTORY</h3>
</div>
<div class="row">
	<div class="col col50">
		<?php echo $this->Form->label('checkbox1', 'Currently covered by any other Mediclaim / Health Insurance'); ?>
		<?php echo $this->Form->input('InsuranceHistory.covered_by_another_mediclaim', array('type'=>'checkbox', 'value' => 'Y', 'hiddenField' => false)); ?>
		<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
		<?php echo $this->Form->input('InsuranceHistory.covered_by_another_mediclaim', array('type'=>'checkbox', 'value' => 'N', 'hiddenField' => false)); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
	</div>
	<div class="col col49">
		<?php echo $this->Form->label('InsuranceHistory.date_of_commencement', 'Date of commencement of first Insurance without break'); ?>
		<?php echo $this->Form->input('InsuranceHistory.date_of_commencement', array('type' => 'text', 'size' => 10)); ?>
	</div>
</div>
<div class="row">
	<div class="col col50">
		<?php echo $this->Form->label('InsuranceHistory.company_name', 'If yes, company name'); ?>
		<?php echo $this->Form->input('InsuranceHistory.company_name', array('type' => 'text'), array('size' => 30)); ?>
	</div>
	<div class="col col49">
		<?php echo $this->Form->label('InsuranceHistory.policy_id', 'Policy No.'); ?>
		<?php echo $this->Form->input('InsuranceHistory.policy_id', array('type' => 'text'), array('size' => 30)); ?>
	</div>
</div>
<div class="row">
	<?php echo $this->Form->label('InsuranceHistory.sum_insured', 'Sum Insured (Rs.)'); ?>
	<?php echo $this->Form->input('InsuranceHistory.sum_insured', array('size' => 20)); ?>
	<?php echo $this->Form->label('hosp_in_last_4yrs', 'Have you been hospitalized in the last four years since inception of the contract?'); ?>
	<?php echo $this->Form->input('InsuranceHistory.hosp_in_last_4yrs', array('type' => 'checkbox')); ?>
	<?php echo $this->Form->label('hosp_in_last_4yrs', 'Yes'); ?>
	<?php echo $this->Form->input('InsuranceHistory.hosp_in_last_4yrs', array('type' => 'checkbox')); ?>
	<?php echo $this->Form->label('hosp_in_last_4yrs', 'No'); ?>
	<?php echo $this->Form->label('hospitalized_date', 'Date'); ?>
	<?php echo $this->Form->input('InsuranceHistory.hospitalized_date', array('type' => 'text'), array('size' => 12)); ?>
</div>
<div class="row">
	<div class="col col50">
		<?php echo $this->Form->label('diaginosis_datail', 'Diagnosis'); ?>
		<?php echo $this->Form->input('InsuranceHistory.diaginosis_datail', array('size' => 65)); ?>
	</div>
	<div class="col col49">
		<?php echo $this->Form->label('prev_covered', 'Previously covered by any other Mediclaim / Health insurance'); ?>
		<?php echo $this->Form->input('InsuranceHistory.prev_covered_mediclaim', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('prev_covered', 'Yes'); ?>
		<?php echo $this->Form->input('InsuranceHistory.prev_covered_mediclaim', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('prev_covered', 'No'); ?>
	</div>
</div>
<div class="row">
	<?php echo $this->Form->label('InsuranceHistory.prev_covered_company', 'If yes, company name'); ?>
	<?php echo $this->Form->input('InsuranceHistory.prev_covered_company', array('size' => 75)); ?>
</div>

<!-- <?php echo $this->Html->link('Previous step',
	array('action' => 'msf_step', $params['currentStep'] -1),
	array('class' => 'button')
); ?> -->

<div class="row">
	<?php echo $this->Html->link(
			$this->Html->image('previous_step.png', array('alt' => 'eMediplus', 'border' => '0')),
			array('action' => 'c_step', $params['currentStep'] -1),
			array('target' => '', 'escape' => false)
		);
	?>

<?php echo $this->Form->submit('next_step.png');  ?>

<!--	<?php echo $this->Form->image('next step', array('src' => '/alphabeta/img/next_step.png'));  ?> -->
</div>

<!-- <?php echo $this->Form->submit('New Step') ?> -->

<?php echo $this->Form->end(); ?>