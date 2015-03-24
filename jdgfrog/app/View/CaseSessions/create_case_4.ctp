<?php

	/*
	*	Page: Arrest & Charge Information
	*/
	$this->layout = 'admin_panel_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>
<?php //add defendant name, number, case name ?>
<?php echo $this->Form->input('ChargeDate', array('label' => 'Date Charged')); ?>
<?php echo $this->Form->input('ArrestDate', array('label' => 'Date Arrested')); ?>
<?php echo $this->Form->input('Detained', array('label' => 'Bail Set/Denied', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('BailType', array('label' => 'Type of Bail')); ?>
<?php echo $this->Form->input('BailAmount', array('label' => 'Bail Amount')); ?>
<?php echo $this->Form->input('FelCharged', array('label' => 'Number of Felonies Charged')); ?>
<?php echo $this->Form->input('FelSentenced', array('label' => 'Number of Felonies Sentenced')); ?>
<?php 	echo $this->Form->end('Next'); ?>

<?php echo print_r($this->params); ?>