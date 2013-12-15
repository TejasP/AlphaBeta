<!-- File: /app/View/Claims/add.ctp -->
<h2 class="pagehead">Claim Application</h2>

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
		<div class="col">
			<?php echo $this->Form->label('policynumber', 'Policy No.'); ?>
		</div>
		<div class="last3col">
			<?php echo $this->Form->input('policynumber', array('size' => 35)); ?>
		</div>
	</div>
	<div class="row">	
		<div class="col">
			<?php echo $this->Form->label('tpa_id_no', 'Company / TPA ID No.'); ?>
		</div>
		<div class="last3col">
			<?php echo $this->Form->input('tpa_id_no', array('size' => 35)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->label('holderfname', 'Name'); ?>
		</div>
		<div class="last3col">	
			<?php echo $this->Form->input('holderfname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holdermname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holderlname', array('size' => 35)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->label('address', 'Address'); ?>
		</div>
		<div class="last3col">	
			<?php echo $this->Form->input('address1', array('size' => 113)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
		</div>
		<div class="last3col">	
			<?php echo $this->Form->input('address2', array('size' => 113)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
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
		<div class="col">
		</div>
		<div class="last3col">	
			<?php echo $this->Form->label('phone', 'Phone'); ?>
			<?php echo $this->Form->input('phone', array('size' => 30)); ?>
			<?php echo $this->Form->label('email', 'Email ID'); ?>
			<?php echo $this->Form->input('email', array('size' => 40)); ?>
		</div>
	</div>

	<div class="row">&nbsp;
	</div>
	
	<div class="row">
		<h3 class="sectionhead">DETAILS OF INSURANCE HISTORY</h3>
	</div>
	<div class="row">
		<div class="col50">
			<?php echo $this->Form->label('checkbox1', 'a) Currently covered by any other Mediclaim / Health Insurance'); ?>
		</div>
		<div class="last49">
			<?php echo $this->Form->label('date1', 'b) Date of commencement of first Insurance without break'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col50">
			<?php echo $this->Form->label('companyname', 'c) If yes, company name'); ?>
		</div>
		<div class="last49">
			<?php echo $this->Form->label('policyno', 'Policy No.'); ?>
		</div>
	</div>
	<div class="row">
		<?php echo $this->Form->label('companyname', 'Sum Insured (Rs.)'); ?>
		<?php echo $this->Form->label('policyno', 'd) Have you been hospitalized in the last four years since inception of the contract?'); ?>
	</div>
	<div class="row">
		<?php echo $this->Form->label('companyname', 'Diagnosis'); ?>
		<?php echo $this->Form->label('policyno', 'e) Previously covered by any other Mediclaim / Health insurance'); ?>
	</div>
	<div class="row">
		<?php echo $this->Form->label('companyname', 'f) If yes, company name'); ?>
	</div>

	<div class="row">&nbsp;
	</div>

	<div class="row">
		<h3 class="sectionhead">DETAILS OF INSURED PERSON HOSPITALIZED</h3>
	</div>
	<div class="row">
		<div class="col">
			<?php echo $this->Form->label('holderfname', 'Name'); ?>
		</div>
		<div class="last3col">	
			<?php echo $this->Form->input('holderfname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holdermname', array('size' => 35)); ?>
			<?php echo $this->Form->input('holderlname', array('size' => 35)); ?>
		</div>
	</div>

	<div class="row">&nbsp;
	</div>

	<div class="row">
		<h3 class="sectionhead">DETAILS OF CLAIM</h3>
	</div>

	<div class="row">&nbsp;
	</div>

	<div class="row">
		<h3 class="sectionhead">DETAILS OF BILLS ENCLOSED</h3>
	</div>

	<div class="row">&nbsp;
	</div>

	<div class="row">
		<h3 class="sectionhead">DETAILS OF PRIMARY INSURED'S BANK ACCOUNT</h3>
	</div>

	<div class="row">&nbsp;
	</div>

	<div class="row">
		<h3 class="sectionhead">DECLARATION BY THE INSURED</h3>
	</div>
	
	<div class="row">
	I hereby declare that the information furnished in this claim form is true & correct to the best of my knowledge and belief. If I have made any false or untrue statement,
	suppression or concealment of any material fact with respect to questions asked in relation to this claim, my right to claim reimbursement shall be forfeited. I also consent &
	authorize TPA / insurance company, to seek necessary medical information / documents from any hospital / Medical Practitioner who has attended on the person against whom
	this claim is made. I hereby declare that I have included all the bills / receipts for the purpose of this claim & that I will not be making any supplementary claim except the pre /
	post-hospitalization claim, if any.
	</div>
<?php echo $this->Form->end('Save Claim'); ?>
