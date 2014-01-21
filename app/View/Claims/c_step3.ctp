<!-- File: // View/Claims/c_step3.ctp -->
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
	<h3 class="sectionhead">DETAILS OF INSURED PERSON HOSPITALIZED</h3>
</div>
<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Name'); ?>
	</div>
	<div class="col col25">	
		<?php echo $this->Form->input('holderfname', array('size' => 35)); ?>
	</div>
	<div class="col col25">
		<?php echo $this->Form->input('holdermname', array('size' => 35)); ?>
	</div>
	<div class="col col25">
		<?php echo $this->Form->input('holderlname', array('size' => 35)); ?>
	</div>
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('holderfname', 'Gender'); ?>
	</div>
	<div class="col col25">	
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Male'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Female'); ?>
	</div>
	<div class="col col25">	
		<?php echo $this->Form->label('holderfname', 'Age'); ?>
		<?php echo $this->Form->label('holderfname', 'Years'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
		<?php echo $this->Form->label('holderfname', 'Months'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
	</div>	
	<div class="col col25">	
		<?php echo $this->Form->label('holderfname', 'Date of birth'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 10)); ?>
	</div>			
</div>

<div class="row">
	<div class="col col70">
		<?php echo $this->Form->label('holderfname', 'Relationship to Primary insured'); ?>

		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Self'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Spouse'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Child'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Father'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Mother'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Other'); ?>
	</div>
	<div class="col col25">
		<?php echo $this->Form->label('holderfname', 'Please Specify'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 20)); ?>
	</div>
</div>

<div class="row">
	<div class="col col70">
		<?php echo $this->Form->label('holderfname', 'Occupation'); ?>

		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Service'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Self Employed'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Homemaker'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Student'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Retired'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'Other'); ?>
	</div>
	<div class="col col25">
		<?php echo $this->Form->label('holderfname', 'Please Specify'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 20)); ?>
	</div>
</div>

<div class="row">
	<div class="col col15">
		<?php echo $this->Form->label('address', 'Address'); ?>
	</div>
	<div class="last3col">	
		<?php echo $this->Form->input('address1', array('size' => 113)); ?>
	</div>
</div>
<div class="row">
	<div class="col col15">
	</div>
	<div class="last3col">	
		<?php echo $this->Form->input('address2', array('size' => 113)); ?>
	</div>
</div>
<div class="row">
	<div class="col col15">
	</div>
	<div class="last3col">	
		<?php echo $this->Form->label('city', 'City'); ?>
		<?php echo $this->Form->input('city', array('size' => 30)); ?>
		<?php echo $this->Form->label('state', 'State'); ?>
		<?php echo $this->Form->input('state', array('size' => 30)); ?>
		<?php echo $this->Form->label('pincode', 'Pin Code'); ?>
		<?php echo $this->Form->input('pincode', array('size' => 25)); ?> 
	</div>
</div>
<div class="row">
	<div class="col col15">
	</div>
	<div class="last3col">	
		<?php echo $this->Form->label('phone', 'Phone'); ?>
		<?php echo $this->Form->input('phone', array('size' => 30)); ?>
		<?php echo $this->Form->label('email', 'Email ID'); ?>
		<?php echo $this->Form->input('email', array('size' => 40)); ?>
	</div>
</div>


<!-- <?php echo $this->Html->link('Previous step',
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