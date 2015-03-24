<?php

	/*
	*	Page: 
	*/
	$this->layout = 'admin_panel_layout';

?>
<?php// debug($case); ?>

<?php echo $this->Form->create('CaseEdit', 		array(
												'action' => 'edit')); ?>
<?php echo $this->Form->input('CaseNam', 		array(
											'label' => 'Case Name', 		
											'default' => $case['0']['DataInProgress']['CaseNam'])); ?>
<?php echo $this->Form->input('CaseNum', 		array(
											'label' => 'Case Number', 		
											'default' => $case['0']['DataInProgress']['CaseNum'])); ?>
<?php echo $this->Form->input('NumDef', 		array(
											'label'=> 'Number of Defendants', 		
											'default' => $case['0']['DataInProgress']['NumDef'])); ?>
<?php echo $this->Form->input('JudgeName', 		array(
											'label'=> 'Judge Name', 		
											'default' => $case['0']['DataInProgress']['JudgeName'])); ?>
<?php echo $this->Form->input('JudgeRace', 		array(
											'label' => 'Judge Race', 		
											'default' => $case['0']['DataInProgress']['JudgeRace'])); ?>
<?php echo $this->Form->input('JudgeGen', 		array(
											'label' => 'Judge Gen',
											'default' => $case['0']['DataInProgress']['JudgeGen'])); ?>
<?php echo $this->Form->input('JudgeTenure', 		array(
											'label' => 'Judge Tenure', 		
											'default' => $case['0']['DataInProgress']['JudgeTenure'])); ?>
<?php echo $this->Form->input('JudgeApptBy', 		array(
											'label' => 'Judge Appointed By', 		
											'default' => $case['0']['DataInProgress']['JudgeApptBy'])); ?>
<?php echo $this->Form->input('FedDistrictLoc', 		array(
											'label' => 'Federal District Location', 		
											'default' => $case['0']['DataInProgress']['FedDistrictLoc'])); ?>
<?php echo $this->Form->input('FedDistrictNum', 		array(
											'label'=> 'FedDistrictNum', 		
											'default' => $case['0']['DataInProgress']['FedDistrictNum'], 		
											'type' => 'text')); ?>
<?php echo $this->Form->input('State', 		array(
											'label' => 'State', 		
											'default' => $case['0']['DataInProgress']['State'])); ?>
<?php echo $this->Form->input('CaseSummary', 		array(
											'label' => 'Case Summary', 		
											'default' => $case['0']['DataInProgress']['CaseSummary'], 		
											'type' => 'textarea')); ?>

Defendants:
-----------------------------------------

<?php 
	foreach ($case as $case) { 
		$i = 0; ?>
		
<?php 	echo 'Defendant '.++$i; ?>
<?php	echo $this->Form->input('DefLast'.$i, 	array('default' => $case['DataInProgress']['DefLast'], 'label' => 'Defendant Last Name')); ?>
<?php	echo $this->Form->input('DefFirst'.$i, 	array('default' => $case['DataInProgress']['DefFirst'])); ?>
<?php	// customize for male/female with if statement
		echo $this->Form->input('DefGender', 	array('default' => $case['DataInProgress']['DefGender'])); ?>
<?php	echo $this->Form->input('DefBirthdate', array('default' => $case['DataInProgress']['DefBirthdate'])); ?>
<?php	echo $this->Form->input('DefArrestAge', array('default' => $case['DataInProgress']['DefArrestAge'])); ?>
<?php 	//echo $this->Form->input(); ?>

<?php } ?>

<?php echo $this->Form->end('Submit'); ?>