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
		<div class="col col15">
			<?php echo $this->Form->label('policynumber', 'Policy No.'); ?>
		</div>
		<div class="last3col">
			<?php echo $this->Form->input('policynumber', array('size' => 35)); ?>
		</div>
	</div>
	<div class="row">	
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

	<div class="row">&nbsp;
	</div>
	
	<div class="row">
		<h3 class="sectionhead">DETAILS OF INSURANCE HISTORY</h3>
	</div>
	<div class="row">
		<div class="col col50">
			<?php echo $this->Form->label('checkbox1', 'Currently covered by any other Mediclaim / Health Insurance'); ?>
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
			<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredno', 'No'); ?>
		</div>
		<div class="col col49">
			<?php echo $this->Form->label('date1', 'Date of commencement of first Insurance without break'); ?>
			<?php echo $this->Form->input('commencedate', array('size' => 10)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col col50">
			<?php echo $this->Form->label('companyname', 'If yes, company name'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 30)); ?>
		</div>
		<div class="col col49">
			<?php echo $this->Form->label('policyno', 'Policy No.'); ?>
			<?php echo $this->Form->input('policyno', array('size' => 30)); ?>
		</div>
	</div>
	<div class="row">
		<?php echo $this->Form->label('companyname', 'Sum Insured (Rs.)'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 20)); ?>
		<?php echo $this->Form->label('policyno', 'Have you been hospitalized in the last four years since inception of the contract?'); ?>
		<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
		<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
		<?php echo $this->Form->label('coveredno', 'No'); ?>
		<?php echo $this->Form->label('date', 'Date'); ?>
		<?php echo $this->Form->input('date', array('size' => 12)); ?>
	</div>
	<div class="row">
		<div class="col col50">
			<?php echo $this->Form->label('companyname', 'Diagnosis'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 65)); ?>
		</div>
		<div class="col col49">
			<?php echo $this->Form->label('policyno', 'Previously covered by any other Mediclaim / Health insurance'); ?>
			<?php echo $this->Form->input('coveredyes', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredyes', 'Yes'); ?>
			<?php echo $this->Form->input('coveredno', array('type' => 'checkbox')); ?>
			<?php echo $this->Form->label('coveredno', 'No'); ?>
		</div>
	</div>
	<div class="row">
		<?php echo $this->Form->label('companyname', 'If yes, company name'); ?>
		<?php echo $this->Form->input('companyname', array('size' => 75)); ?>
	</div>

	<div class="row">&nbsp;
	</div>

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
	
	<div class="row">&nbsp;
	</div>

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
			<?php echo $this->Form->label('holderfname', 'Date of Admission'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 10)); ?>
			
			<?php echo $this->Form->label('holderfname', 'Time'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
			<?php echo $this->Form->input('companyname', array('size' => 2)); ?>
		</div>
		<div class="spaces15"></div>
		<div class="col">	
			<?php echo $this->Form->label('holderfname', 'Date of Discharge'); ?>
			<?php echo $this->Form->input('companyname', array('size' => 10)); ?>
			
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

	<div class="row">&nbsp;
	</div>
	
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
	
	<div class="row">&nbsp;
	</div>

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
	
	
<?php echo $this->Form->end('Save Claim'); ?>
