<?php

	/*
	*	Page: Trafficking & Victim Information
	*/
	$this->layout = 'admin_panel_create_msf_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>
<?php echo $this->Form->input('LaborTraf', array('type' => 'checkbox', 'label' => 'Labor Trafficking')); ?>
<?php echo $this->Form->input('AdultSexTraf', array('type' => 'checkbox', 'label' => 'Adult Sex Trafficking')); ?>
<?php echo $this->Form->input('MinorSexTraf', array('type' => 'checkbox', 'label' => 'Minor Sex Trafficking')); ?>
<?php echo $this->Form->input('NumVic', array('label' => 'Number of Victims')); ?>
<?php echo $this->Form->input('NumVicMinor', array('label' => 'Number of Minor Victims')); ?>
<?php echo $this->Form->input('NumVicForeign', array('label' => 'Number of Foreign Victims')); ?>
<?php echo $this->Form->input('NumVicFemale', array('label' => 'Number of Female Victims')); ?>
<?php echo $this->Form->end('Next'); ?>

<?php echo print_r($this->params); ?>