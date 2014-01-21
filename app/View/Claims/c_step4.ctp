<!-- File: // View/Claims/c_step4.ctp -->
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
	<h3 class="sectionhead">DETAILS OF HOSPITALIZATION</h3>
</div>

<div class="row">
	<?php echo $this->Form->label('holderfname', 'Name ol Hospital where Admitted'); ?>
	<?php echo $this->Form->input('companyname', array('size' => 75)); ?>
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Room Category occupied'); ?>
	</div>
	<div class="col">	
		<?php echo $this->Form->label('coveredyes', 'Day care'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Single occupancy'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', '3 or more beds per room'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
	</div>
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Hospitalization due to'); ?>
	</div>
	<div class="col">	
		<?php echo $this->Form->label('coveredyes', 'Injury'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Illness'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Maternity'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
	</div>
	<div class="spaces15"></div>
	<div class="col">	
		<?php echo $this->Form->label('coveredyes', 'Date of Injury / Date Disease first detected / Date of Delivery'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 10)); ?>
	</div>	
</div>

<div class="row">
	<div class="col">
		<?php echo $this->Form->label('datetime_of_adm', 'Date of Admission'); ?>
		<?php echo $this->Form->input('datetime_of_adm', array('type' => 'text'), array('size' => 10)); ?>
		
		<?php echo $this->Form->label('holderfname', 'Time'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
	</div>
	<div class="spaces15"></div>
	<div class="col">	
		<?php echo $this->Form->label('datetime_of_disc', 'Date of Discharge'); ?>
		<?php echo $this->Form->input('datetime_of_disc', array('type' => 'text'), array('size' => 10)); ?>
		
		<?php echo $this->Form->label('holderfname', 'Time'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
	</div>	
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Injury give cause'); ?>
	</div>
	<div class="col">	
		<?php echo $this->Form->label('coveredyes', 'Self inflicted'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Road Traffic Accident'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Substance Abuse / Alcohol Consumption'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
	</div>
	<div class="spaces"></div>
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'If Medico legal'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Yes'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
	</div>
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Reported to police'); ?>
	</div>
	<div class="col">	
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
		
		<?php echo $this->Form->label('holderfname', 'MLC Report & Police FIR attached'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
	</div>
	<div class="spaces"></div>
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'System of Medicine'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 25)); ?>
	</div>
</div>

<!-- 
<?php echo $this->Html->link('Previous step',
	array('action' => 'msf_step', $params['currentStep'] -1),
	array('class' => 'button')
); ?> -->

<?php echo $this->Html->link(
		$this->Html->image('previous_step.png', array('alt' => 'eMediplus', 'border' => '0')),
		array('action' => 'c_step', $params['currentStep'] -1),
		array('target' => '', 'escape' => false)
	);
?>

<?php echo $this->Form->image('next step', array('src' => '/alphabeta/img/next_step.png'));  ?>

<!-- <?php echo $this->Form->submit('New Step') ?> -->

<?php echo $this->Form->end(); ?>