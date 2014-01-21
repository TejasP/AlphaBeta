<!-- File: // View/Claims/c_step6.ctp -->
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
	<h3 class="sectionhead">DETAILS OF BILLS ENCLOSED</h3>
</div>

<div class="row">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">Sl No.</td>
		<td class="claim_bill_details_billno allborder fieldlabel">Bill No.</td>
		<td class="claim_bill_details_billdate allborder fieldlabel">Date</td>
		<td class="claim_bill_details_issuedby allborder fieldlabel">Issue by</td>
		<td class="claim_bill_details_towards allborder fieldlabel">Towards</td>
		<td class="claim_bill_details_amount allborder fieldlabel">Amount (Rs)</td>
	</tr>
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">1</td>
		<td class="claim_bill_details_billno allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_billdate allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_issuedby allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_towards allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_amount allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
	</tr>
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">2</td>
		<td class="claim_bill_details_billno allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_billdate allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_issuedby allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_towards allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_amount allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
	</tr>
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">3</td>
		<td class="claim_bill_details_billno allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_billdate allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_issuedby allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_towards allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_amount allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
	</tr>
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">4</td>
		<td class="claim_bill_details_billno allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_billdate allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_issuedby allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_towards allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_amount allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
	</tr>
	<tr>
		<td class="claim_bill_details_srno allborder fieldlabel">5</td>
		<td class="claim_bill_details_billno allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_billdate allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
		<td class="claim_bill_details_issuedby allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_towards allborder"><?php echo $this->Form->input('companyname', array('size' => 30)); ?></td>
		<td class="claim_bill_details_amount allborder"><?php echo $this->Form->input('companyname', array('size' => 15)); ?></td>
	</tr>
	</table>
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