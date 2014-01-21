<!-- File: // View/Claims/c_step1.ctp -->
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
		<h3 class="sectionhead">DETAILS OF PRIMARY INSURED</h3>
	</div>
	<div class="row">
		<div class="col col15">
			<?php echo $this->Form->label('policy_id', 'Policy No.'); ?>
		</div>
		<div class="last3col">
			<?php echo $this->Form->input('Claim.policy_id',array('type'=>'select','options'=>$policylist)); ?> 
		</div>
	</div>
	<div>
		<font color="blue">need to retrieve the policy details from policy table and display here.</font>
	</div>
<!--	<div class="row">	
		<div class="col col15">
			<?php echo $this->Form->label('tpa_id_no', 'Company / TPA ID No.'); ?>
		</div>
		<div class="last3col">
			<?php echo $this->Form->input('tpa_id_no', array('size' => 35)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col col15">
			<?php echo $this->Form->label('holderfname', 'Name'); ?>
		</div>
		<div class="last3col">	
			<?php echo $this->Form->input('holderfname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holdermname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holderlname', array('size' => 35)); ?>
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
-->

<?php echo $this->Form->image('next step', array('src' => '/alphabeta/img/next_step.png'));  ?>

<?php echo $this->Form->end(); ?>