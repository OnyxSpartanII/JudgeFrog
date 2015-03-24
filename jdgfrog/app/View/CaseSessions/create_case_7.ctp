<?php

	/*
	*	Page: Organized Crime Group Information
	*/
	$this->layout = 'admin_panel_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>

<?php //add defendant name, number, case name ?>
<?php echo $this->Form->input('OCName1', array('label' => 'Organized Crime Group 1 Name')); ?>
<?php echo $this->Form->input('OCType1', array('label' => 'Organized Crime Group 1 Type')); ?>
<?php echo $this->Form->input('OCRace1', array('label' => 'Organized Crime Group 1 Predominant Race')); ?>
<?php echo $this->Form->input('OCScope1', array('label' => 'Organized Crime Group 1 Scope')); ?>
<?php echo $this->Form->input('OCName2', array('label' => 'Organized Crime Group 2 Name')); ?>
<?php echo $this->Form->input('OCType2', array('label' => 'Organized Crime Group 2 Type')); ?>
<?php echo $this->Form->input('OCRace2', array('label' => 'Organized Crime Group 2 Predominant Race')); ?>
<?php echo $this->Form->input('OCScope2', array('label' => 'Organized Crime Group 2 Scope')); ?>
<?php echo $this->Form->end('Next'); ?>