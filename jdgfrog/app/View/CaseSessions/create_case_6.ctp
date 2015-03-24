<?php

	/*
	*	Page: Sentence Details Information
	*/
	$this->layout = 'admin_panel_create_msf_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>

<?php //add defendant name, number, case name ?>
<?php echo $this->Form->input('DateTerm', array('label' => 'Termination Date of Case')); ?>
<?php echo $this->Form->input('SentDate', array('label' => 'Date of Sentencing')); ?>
<?php echo $this->Form->input('TotalSentence', array('label' => 'Total Number of Months Sentenced')); ?>
<?php echo $this->Form->input('Restitution', array('label' => 'Amount Required to Pay For Restitution')); ?>
<?php echo $this->Form->input('AssetForfeit', array('label' => 'Assets Forfeited?', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Appeal', array('label' => 'Appeal Pending?', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('SupRelease', array('label' => 'Number of Months Under Supervised Release')); ?>
<?php echo $this->Form->input('Probation', array('label' => 'Total Number of Months Under Probation')); ?>

<?php echo $this->Form->end('Next'); ?>