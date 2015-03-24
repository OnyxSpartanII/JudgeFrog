<?php

	/*
	*	Page: Case Information
	*/
	$this->layout = 'admin_panel_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>

<?php echo $this->Form->input('CaseNam', array('label' => 'Case Name', 'placeholder' => 'Case Name')); ?>

<?php echo $this->Form->input('CaseNum', array('placeholder' => 'Case Number')); ?>

<?php echo $this->Form->input('NumDef', array('label'=> 'Number of Defendants', 'placeholder' => 'Number of Defendants')); ?>

<?php echo $this->Form->input('JudgeName', array('label'=> 'Judge Name', 'placeholder' => 'Judge')); ?>
<?php echo $this->Form->input('JudgeRace', array('label' => 'Judge Race')); ?>
<?php echo $this->Form->input('JudgeGen', array('label' => 'JudgeGen')); ?>
<?php echo $this->Form->input('JudgeTenure', array('label' => 'JudgeTenure')); ?>
<?php echo $this->Form->input('JudgeApptBy', array('label' => 'JudgeApptBy')); ?>
<?php echo $this->Form->input('FedDistrictNum', array('label'=> 'FedDistrictNum', 'placeholder' => 'Federal District #', 'type' => 'text')); ?>
<?php echo $this->Form->input('FedDistrictLoc', array('label' => 'FedDistrictLoc', 'placeholder' => 'Federal District Location')); ?>
<?php echo $this->Form->input('State', array('placeholder' => 'e.g, TX')); ?>
<?php echo $this->Form->input('CaseSummary'); ?>

<?php 	/*echo $this->Form->button('Next step', 
				array('url' => '/dashboard/create_case/'.$params['currentStep'] + 1, 'type' => 'submit'), 
				array('class' => 'button')); */?>

<?php //echo $this->Html->link('Next step', array('action' => 'createCase', $params['currentStep'] +1), array('class' => 'button')); ?>

<?php echo $this->Form->end('Next step'); ?>