<?php

	/*
	*	Page: 
	*/
	$this->layout = 'admin_panel_layout';

?>
<?php// debug($case); ?>

<?php echo $this->Form->create('DataInProgress', 		array(
													'url' => array(
															'controller' => 'CaseEdits',
															'action' => 'edit'
															)
													)
								); ?>
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
<?php echo $this->Form->input('JudgeTenure', 	array(
													'label' => 'Judge Tenure', 		
													'default' => $case['0']['DataInProgress']['JudgeTenure'])); ?>
<?php echo $this->Form->input('JudgeApptBy', 	array(
													'label' => 'Judge Appointed By', 		
													'default' => $case['0']['DataInProgress']['JudgeApptBy'])); ?>
<?php echo $this->Form->input('FedDistrictLoc', array(
													'label' => 'Federal District Location', 		
													'default' => $case['0']['DataInProgress']['FedDistrictLoc'])); ?>
<?php echo $this->Form->input('FedDistrictNum', array(
													'label'=> 'FedDistrictNum', 		
													'default' => $case['0']['DataInProgress']['FedDistrictNum'], 		
													'type' => 'text')); ?>
<?php echo $this->Form->input('State', 	array(
											'label' => 'State', 		
											'default' => $case['0']['DataInProgress']['State'])); ?>
<?php echo $this->Form->input('CaseSummary', 	array(
													'label' => 'Case Summary', 		
													'default' => $case['0']['DataInProgress']['CaseSummary'], 		
													'type' => 'textarea')); ?>

Defendants:
-----------------------------------------

<?php $i = 0;
	foreach ($case as $case) { 
		 ?>
		
<?php 	echo 'Defendant '.++$i; ?>
<?php	echo $case['DataInProgress']['DefLast'];
		echo ', ';
		echo $case['DataInProgress']['DefFirst']; ?>
<?php 	echo $this->Html->link('Edit This Defendant', 
							'/admin/cases/edit/defendant/'.$case['DataInProgress']['DefLast'].'|'.$case['DataInProgress']['DefFirst'].'|'.$case['DataInProgress']['CaseNum'], 
							array(
								'controller' => 'CaseEdits', 'action' => 'editDefendant')); ?>
<?php 	//echo $this->Form->input(); ?>

<?php } ?>
<?php echo $this->Form->submit('Submit', array('confirm' => 'Submit this case for review?')); ?>
<?php echo $this->Form->end(); ?>