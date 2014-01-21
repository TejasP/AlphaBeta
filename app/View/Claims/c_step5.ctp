<!-- File: // View/Claims/c_step5.ctp -->
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
	<h3 class="sectionhead">DETAILS OF CLAIM</h3>
</div>

<div style="width:73%; display:inline-block;">
	<div class="row">
		<div class="col">
			<?php echo $this->Form->label('coveredno', 'Details of the treatment expenses claimed'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Pre-hospitalization Expenses'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Hospitalization Expenses'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Post-hospitalization Expenses'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Health-Check up Cost'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Ambulance Charges'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Others (code)'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
		</div>
		<div class="col col20">
		</div>
		<div class="spaces"></div>
		<div class="col col25" align="right">
			<?php echo $this->Form->label('coveredno', 'Total'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Pre-hospitalization period'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Days'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 5)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Post-hospitalization period'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Days'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 5)); ?>
		</div>
	</div>
	
	<div class="row">
		<?php echo $this->Form->label('coveredno', 'Claim for Domiciliary Hospitalization'); ?>

		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
		
		<?php echo $this->Form->label('coveredno', '(If yes, provide details in annexure)'); ?>
	</div>

	<div class="row">
		<?php echo $this->Form->label('coveredno', 'Details of Lump sum / cash benefit claimed'); ?>
	</div>
	
	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Hospital Daily Cash'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 5)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Surgical Cash'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Critical Illness Benefit'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 5)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Convalescence'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Pre/Post hospitalization Lump sum benefit'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 5)); ?>	
		</div>
		<div class="spaces"></div>
		<div class="col col25">
			<?php echo $this->Form->label('coveredno', 'Others'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col col25">
		</div>
		<div class="col col20">
		</div>
		<div class="spaces"></div>
		<div class="col col25" align="right">
			<?php echo $this->Form->label('coveredno', 'Total'); ?>
		</div>
		<div class="col col20">
			<?php echo $this->Form->label('coveredno', 'Rs.'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 15)); ?>
		</div>
	</div>
</div>

<div style="display:inline-block; border-left: 1px solid #CCCCCC; padding-left: 5px;">
	<div class="row">
		<div class="col">
			<?php echo $this->Form->label('coveredno', 'Claim Documents Submitted- Check List'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Claim Form Duly signed'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Copy of the claim intimation, if any'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Hospital Main Bill'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Hospital Break-up Bill'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Hospital Bill Payment Receipts'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Hospital Discharge Summary'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Pharmacy Bill'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Operation Theatre Notes'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'ECG'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Doctors request for investigation'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Investigation Reports<br>(Including CT/ MRI / USG / HPE)'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Doctors Prescriptions'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Other'); ?>
		</div>
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