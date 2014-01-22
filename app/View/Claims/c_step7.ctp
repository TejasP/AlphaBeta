<!-- File: // View/Claims/c_step7.ctp -->
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
	<h3 class="sectionhead">DETAILS OF PRIMARY INSURED'S BANK ACCOUNT</h3>
</div>

<div class="row">
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'PAN'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 25)); ?>
	</div>
	<div class="spaces15"></div>
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Account Number'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 25)); ?>
	</div>
</div>

<div class="row">
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Bank name and branch'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 75)); ?>
	</div>
</div>

<div class="row">
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Cheque/ DD Payable details'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 70)); ?>
	</div>
	<div class="spaces"></div>
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'IFSC Code'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 20)); ?>
	</div>
</div>

<div class="row">&nbsp;
</div>

<div class="row">
	<h3 class="sectionhead">DECLARATION BY THE INSURED</h3>
</div>

<div class="row">
	<div class="col fieldlabel">
		I hereby declare that the information furnished in this claim form is true & correct to the best of my knowledge and belief. If I have made any false or untrue statement,
		suppression or concealment of any material fact with respect to questions asked in relation to this claim, my right to claim reimbursement shall be forfeited. I also consent &
		authorize TPA / insurance company, to seek necessary medical information / documents from any hospital / Medical Practitioner who has attended on the person against whom
		this claim is made. I hereby declare that I have included all the bills / receipts for the purpose of this claim & that I will not be making any supplementary claim except the pre /
		post-hospitalization claim, if any.
	</div>
</div>

<div class="row">
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Date'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 10)); ?>
	</div>
	<div class="spaces"></div>
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Place'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 20)); ?>
	</div>
</div>
<div class="row">
	<div class="col">
		<?php echo $this->Form->label('coveredno', 'Signature of the Insured'); ?>
		<?php echo $this->Form->textarea('companyname', array('size' => 30)); ?>
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

<?php echo $this->Form->submit('save_claim.png');  ?>

<!-- <?php echo $this->Form->image('Save Claim', array('src' => '/alphabeta/img/save_claim.png'));  ?> -->

<?php echo $this->Form->end(); ?>